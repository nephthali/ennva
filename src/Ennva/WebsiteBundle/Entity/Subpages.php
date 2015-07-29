<?php

namespace Ennva\WebsiteBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Subpages
 *
 * @ORM\Table(name="subpages")
 * @ORM\Entity(repositoryClass="Ennva\WebsiteBundle\Entity\SubpagesRepository")
 */
class Subpages
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="title", type="string", length=255)
     */
    private $title;

    /**
     * @var string
     *
     * @ORM\Column(name="description", type="text")
     */
    private $description;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date_create", type="datetime")
     */
    private $dateCreate;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date_delete", type="datetime")
     */
    private $dateDelete;
    
    /**
     * @ORM\ManyToOne(targetEntity="Pages", inversedBy="subpages")
     * @ORM\JoinColumn(name="page_id", referencedColumnName="id")
     */
    protected $pages;


    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set title
     *
     * @param string $title
     * @return Subpages
     */
    public function setTitle($title)
    {
        $this->title = $title;

        return $this;
    }

    /**
     * Get title
     *
     * @return string 
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * Set description
     *
     * @param string $description
     * @return Subpages
     */
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Get description
     *
     * @return string 
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Set dateCreate
     *
     * @param \DateTime $dateCreate
     * @return Subpages
     */
    public function setDateCreate($dateCreate)
    {
        $this->dateCreate = $dateCreate;

        return $this;
    }

    /**
     * Get dateCreate
     *
     * @return \DateTime 
     */
    public function getDateCreate()
    {
        return $this->dateCreate;
    }

    /**
     * Set dateDelete
     *
     * @param \DateTime $dateDelete
     * @return Subpages
     */
    public function setDateDelete($dateDelete)
    {
        $this->dateDelete = $dateDelete;

        return $this;
    }

    /**
     * Get dateDelete
     *
     * @return \DateTime 
     */
    public function getDateDelete()
    {
        return $this->dateDelete;
    }

    /**
     * Set pages
     *
     * @param \Ennva\WebsiteBundle\Entity\Pages $pages
     * @return Subpages
     */
    public function setPages(\Ennva\WebsiteBundle\Entity\Pages $pages = null)
    {
        $this->pages = $pages;

        return $this;
    }

    /**
     * Get pages
     *
     * @return \Ennva\WebsiteBundle\Entity\Pages 
     */
    public function getPages()
    {
        return $this->pages;
    }
}
