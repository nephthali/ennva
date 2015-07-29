<?php

namespace Ennva\WebsiteBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Pages
 *
 * @ORM\Table(name="pages")
 * @ORM\Entity(repositoryClass="Ennva\WebsiteBundle\Entity\PagesRepository")
 */
class Pages
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
     * @ORM\Column(name="title", type="string", length=200)
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
     * @ORM\Column(name="date_delete", type="datetime")
     */
    private $dateDelete;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date_edit", type="datetime")
     */
    private $dateEdit;
    
    /**
     * @ORM\OneToMany(targetEntity="Subpages", mappedBy="pages")
     */
    protected $subpages;
    
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->subpages = new \Doctrine\Common\Collections\ArrayCollection();
    }


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
     * @return Pages
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
     * @return Pages
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
     * Set dateDelete
     *
     * @param \DateTime $dateDelete
     * @return Pages
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
     * Set dateEdit
     *
     * @param \DateTime $dateEdit
     * @return Pages
     */
    public function setDateEdit($dateEdit)
    {
        $this->dateEdit = $dateEdit;

        return $this;
    }

    /**
     * Get dateEdit
     *
     * @return \DateTime 
     */
    public function getDateEdit()
    {
        return $this->dateEdit;
    }

    /**
     * Add subpages
     *
     * @param \Ennva\WebsiteBundle\Entity\Subpages $subpages
     * @return Pages
     */
    public function addSubpage(\Ennva\WebsiteBundle\Entity\Subpages $subpages)
    {
        $this->subpages[] = $subpages;

        return $this;
    }

    /**
     * Remove subpages
     *
     * @param \Ennva\WebsiteBundle\Entity\Subpages $subpages
     */
    public function removeSubpage(\Ennva\WebsiteBundle\Entity\Subpages $subpages)
    {
        $this->subpages->removeElement($subpages);
    }

    /**
     * Get subpages
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getSubpages()
    {
        return $this->subpages;
    }
}
