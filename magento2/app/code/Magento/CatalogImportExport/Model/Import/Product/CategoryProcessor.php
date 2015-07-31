<?php
/**
 * Copyright © 2015 Magento. All rights reserved.
 * See COPYING.txt for license details.
 */
namespace Magento\CatalogImportExport\Model\Import\Product;

class CategoryProcessor
{
    /**
     * Delimiter in import file between categories.
     */
    const DELIMITER_CATEGORIES = '|';

    /**
     * Delimiter in category path.
     */
    const DELIMITER_CATEGORY = '/';

    /**
     * @var \Magento\Catalog\Model\Resource\Category\CollectionFactory
     */
    protected $categoryColFactory;

    /**
     * Categories text-path to ID hash.
     *
     * @var array
     */
    protected $categories = [];

    /**
     * Categories id to object cache.
     *
     * @var array
     */
    protected $categoriesCache = [];

    /**
     * Instance of catalog category factory.
     *
     * @var \Magento\Catalog\Model\CategoryFactory
     */
    protected $categoryFactory;

    /**
     * @param \Magento\Catalog\Model\Resource\Category\CollectionFactory $categoryColFactory
     * @param \Magento\Catalog\Model\CategoryFactory $categoryFactory
     */
    public function __construct(
        \Magento\Catalog\Model\Resource\Category\CollectionFactory $categoryColFactory,
        \Magento\Catalog\Model\CategoryFactory $categoryFactory
    ) {
        $this->categoryColFactory = $categoryColFactory;
        $this->categoryFactory = $categoryFactory;
        $this->initCategories();
    }

    /**
     * @return $this
     */
    protected function initCategories()
    {
        if (empty($this->categories)) {
            $collection = $this->categoryColFactory->create();
            $collection->addAttributeToSelect('name')
                ->addAttributeToSelect('url_key')
                ->addAttributeToSelect('url_path');
            /* @var $collection \Magento\Catalog\Model\Resource\Category\Collection */
            foreach ($collection as $category) {
                $structure = explode(self::DELIMITER_CATEGORY, $category->getPath());
                $pathSize = count($structure);

                $this->categoriesCache[$category->getId()] = $category;
                if ($pathSize > 1) {
                    $path = [];
                    for ($i = 1; $i < $pathSize; $i++) {
                        $path[] = $collection->getItemById((int)$structure[$i])->getName();
                    }
                    $index = implode(self::DELIMITER_CATEGORY, $path);
                    $this->categories[$index] = $category->getId();
                }
            }
        }
        return $this;
    }

    /**
     * Creates a category.
     *
     * @param string $name
     * @param int $parentId
     *
     * @return int
     */
    protected function createCategory($name, $parentId)
    {
        /** @var \Magento\Catalog\Model\Category $category */
        $category = $this->categoryFactory->create();
        if (!($parentCategory = $this->getCategoryById($parentId))) {
            $parentCategory = $this->categoryFactory->create()->load($parentId);
        }
        $category->setPath($parentCategory->getPath());
        $category->setParentId($parentId);
        $category->setName($name);
        $category->setIsActive(true);
        $category->setIncludeInMenu(true);
        $category->setAttributeSetId($category->getDefaultAttributeSetId());
        $category->save();
        $this->categoriesCache[$category->getId()] = $category;

        return $category->getId();
    }


    /**
     * Returns ID of category by string path creating nonexistent ones.
     *
     * @param string $categoryPath
     * 
     * @return int
     */
    protected function upsertCategory($categoryPath)
    {
        if (!isset($this->categories[$categoryPath])) {
            $pathParts = explode(self::DELIMITER_CATEGORY, $categoryPath);
            $parentId = \Magento\Catalog\Model\Category::TREE_ROOT_ID;
            $path = '';

            foreach ($pathParts as $pathPart) {
                $path .= $pathPart;
                if (!isset($this->categories[$path])) {
                    $this->categories[$path] = $this->createCategory($pathPart, $parentId);
                }
                $parentId = $this->categories[$path];
                $path .= self::DELIMITER_CATEGORY;
            }
        }

        return $this->categories[$categoryPath];
    }

    /**
     * Returns IDs of categories by string path creating nonexistent ones.
     *
     * @param string $categoriesString
     *
     * @return array
     */
    public function upsertCategories($categoriesString)
    {
        $categoriesIds = [];
        $categories = explode(self::DELIMITER_CATEGORIES, $categoriesString);

        foreach ($categories as $category) {
            $categoriesIds[] = $this->upsertCategory($category);
        }

        return $categoriesIds;
    }

    /**
     * Get category by Id
     *
     * @param int $categoryId
     *
     * @return \Magento\Catalog\Model\Category|null
     */
    public function getCategoryById($categoryId)
    {
        return isset($this->categoriesCache[$categoryId]) ? $this->categoriesCache[$categoryId] : null;
    }
}