<?php

/**
 * Zikula Application Framework
 *
 * Weblinks
 *
 * @license GNU/GPL - http://www.gnu.org/copyleft/gpl.html
 */
use Doctrine\ORM\Mapping as ORM;

/**
 * Weblinks categories entity class
 *
 * Annotations define the entity mappings to database.
 *
 * @ORM\Entity(repositoryClass="Weblinks_Entity_Repository_CategoryRepository")
 * @ORM\Table(name="links_categories")
 */
class Weblinks_Entity_Category extends Zikula_EntityAccess
{

    /**
     * id field (record id)
     *
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $cat_id;

    /**
     * parent category id
     * 
     * @ORM\Column(type="integer")
     */
    private $parent_id = 0;

    /**
     * category title
     * 
     * @ORM\Column(length=50)
     */
    private $title = '';

    /**
     * category description
     * 
     * @ORM\Column
     */
    private $cdescription = '';

    public function getCat_id()
    {
        return $this->cat_id;
    }

    public function setCat_id($cid)
    {
        $this->cat_id = $cid;
    }

    public function getParent_id()
    {
        return $this->parent_id;
    }

    public function setParent_id($pid)
    {
        $this->parent_id = $pid;
    }

    public function getTitle()
    {
        return $this->title;
    }

    public function setTitle($title)
    {
        $this->title = $title;
    }

    public function getCdescription()
    {
        return $this->cdescription;
    }

    public function setCdescription($description)
    {
        $this->cdescription = $description;
    }

}
