<?php
/**
 * Copyright © 2015 Magento. All rights reserved.
 * See COPYING.txt for license details.
 */

namespace Magento\Ui\Test\Block\Adminhtml;

use Magento\Mtf\Client\Locator;
use Magento\Backend\Test\Block\Widget\Grid;
use Magento\Mtf\Client\Element\SimpleElement;

/**
 * Backend Data Grid with advanced functionality for managing entities.
 */
class DataGrid extends Grid
{
    /**
     * Locator value for "Edit" link inside action column.
     *
     * @var string
     */
    protected $editLink = '.action-menu-item[href*="edit"]';

    /**
     * Locator value for container of applied Filters.
     *
     * @var string
     */
    protected $appliedFiltersList = '[data-role="filter-list"]';

    /**
     * Locator value for "Filter" button.
     *
     * @var string
     */
    protected $filterButton = '[data-action="grid-filter-expand"]';

    /**
     * An element locator which allows to select entities in grid.
     *
     * @var string
     */
    protected $selectItem = 'tbody tr [data-action="select-row"]';

    /**
     * Mass action toggle list.
     *
     * @var string
     */
    protected $massActionToggleList = '//span[contains(@class, "action-menu-item") and .= "%s"]';

    /**
     * Mass action toggle button.
     *
     * @var string
     */
    protected $massActionToggleButton = '.action-multiselect-toggle';

    /**
     * Mass action button.
     *
     * @var string
     */
    protected $massActionButton = '.action-select';

    /**
     * Locator fo action button.
     *
     * @var string
     */
    protected $actionButton = '.modal-inner-wrap .action-secondary';

    /**
     * Clear all applied Filters.
     *
     * @return void
     */
    public function resetFilter()
    {
        $chipsHolder = $this->_rootElement->find($this->appliedFiltersList);
        if ($chipsHolder->isVisible()) {
            parent::resetFilter();
        }
    }

    /**
     * Wait filter to load on page.
     *
     * @return void
     */
    protected function waitFilterToLoad()
    {
        $this->getTemplateBlock()->waitForElementNotVisible($this->loader);
        $browser = $this->_rootElement;
        $selector = $this->filterButton . ', ' . $this->resetButton;
        $browser->waitUntil(
            function () use ($browser, $selector) {
                $filter = $browser->find($selector);
                return $filter->isVisible() == true ? true : null;
            }
        );
    }

    /**
     * Open "Filter" block.
     *
     * @return void
     */
    protected function openFilterBlock()
    {
        $this->waitFilterToLoad();

        $toggleFilterButton = $this->_rootElement->find($this->filterButton);
        $searchButton = $this->_rootElement->find($this->searchButton);
        if ($toggleFilterButton->isVisible() && !$searchButton->isVisible()) {
            $toggleFilterButton->click();
            $browser = $this->_rootElement;
            $browser->waitUntil(
                function () use ($searchButton) {
                    return $searchButton->isVisible() ? true : null;
                }
            );
        }
    }

    /**
     * Click on "Edit" link.
     *
     * @param SimpleElement $rowItem
     * @return void
     */
    protected function clickEditLink(SimpleElement $rowItem)
    {
        $rowItem->find($this->editLink)->click();
    }

    /**
     * Search item using Data Grid Filter.
     *
     * @param array $filter
     * @return void
     */
    public function search(array $filter)
    {
        $this->openFilterBlock();
        parent::search($filter);
        $this->waitForElementNotVisible($this->searchButton);
        $this->waitLoader();
    }

    /**
     * Search item and open it.
     *
     * @param array $filter
     * @throws \Exception
     */
    public function searchAndOpen(array $filter)
    {
        $this->search($filter);
        $rowItem = $this->getRow($filter);
        if ($rowItem->isVisible()) {
            $this->clickEditLink($rowItem);
        } else {
            throw new \Exception('Searched item was not found.');
        }
    }

    /**
     * Perform selected massaction over checked items.
     *
     * @param array $items
     * @param array|string $action [array -> key = value from first select; value => value from subselect]
     * @param bool $acceptAlert [optional]
     * @param string $massActionSelection [optional]
     * @return void
     */
    public function massaction(array $items, $action, $acceptAlert = false, $massActionSelection = '')
    {
        if ($this->_rootElement->find($this->noRecords)->isVisible()) {
            return;
        }
        if (!is_array($action)) {
            $action = [$action => '-'];
        }
        foreach ($items as $item) {
            $this->searchAndSelect($item);
        }
        if ($massActionSelection) {
            $this->_rootElement->find($this->massActionToggleButton)->click();
            $this->_rootElement
                ->find(sprintf($this->massActionToggleList, $massActionSelection), Locator::SELECTOR_XPATH)
                ->click();
        }
        $actionType = key($action);
        $this->_rootElement->find($this->massActionButton)->click();
        $this->_rootElement
            ->find(sprintf($this->massActionToggleList, $actionType), Locator::SELECTOR_XPATH)
            ->click();
        if ($acceptAlert) {
            $this->browser->find($this->actionButton)->click();
        }
    }
}
