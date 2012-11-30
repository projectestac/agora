<?php

/**
 * Downloads
 *
 * @license GNU/LGPLv3 (or at your option, any later version).
 */
use Doctrine\ORM\Mapping as ORM;

/**
 * Download categories entity class
 *
 * Annotations define the entity mappings to database.
 *
 * @ORM\Entity(repositoryClass="Downloads_Entity_Repository_CategoriesRepository")
 * @ORM\Table(name="downloads_categories")
 */
class Downloads_Entity_Categories extends Zikula_EntityAccess
{

    /**
     * id field (record id)
     *
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $cid;

    /**
     * parent category id
     * 
     * @ORM\Column(type="integer")
     */
    private $pid;

    /**
     * category title
     * 
     * @ORM\Column(length=100, nullable=true)
     * this probably shouldn't be nullable, but maintaining BC
     */
    private $title = '';

    /**
     * category description
     * 
     * @ORM\Column
     */
    private $description = '';

    function __construct()
    {
        
    }

    public function getCid()
    {
        return $this->cid;
    }

    public function setCid($cid)
    {
        $this->cid = $cid;
    }

    public function getPid()
    {
        return $this->pid;
    }

    public function setPid($pid)
    {
        $this->pid = $pid;
    }

    public function getTitle()
    {
        return $this->title;
    }

    public function setTitle($title)
    {
        $this->title = $title;
    }

    public function getDescription()
    {
        return $this->description;
    }

    public function setDescription($description)
    {
        $this->description = $description;
    }

}
