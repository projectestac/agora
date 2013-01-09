<?php

/**
 * Downloads
 *
 * @license GNU/LGPLv3 (or at your option, any later version).
 */
use Doctrine\ORM\Mapping as ORM;

/**
 * Download entity class
 *
 * Annotations define the entity mappings to database.
 *
 * @ORM\Entity(repositoryClass="Downloads_Entity_Repository_DownloadRepository")
 * @ORM\Table(name="downloads_downloads")
 */
class Downloads_Entity_Download extends Zikula_EntityAccess
{
    /**
     * Download Item status
     */

    const STATUS_ALL = -1;
    const STATUS_INACTIVE = 0;
    const STATUS_ACTIVE = 1;

    /**
     * id field (record id)
     *
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $lid;

    /**
     * item category
     * @ORM\ManyToOne(targetEntity="Downloads_Entity_Categories")
     * @ORM\JoinColumn(name="cid", referencedColumnName="cid")
     */
    private $category;

    /**
     * item status
     * 
     * @ORM\Column(type="integer")
     */
    private $status = self::STATUS_INACTIVE;

    /**
     * timestamp for item update
     * NOT a typo - 'update' is a reserved SQL word
     * set to current DateTime object in constructor
     * 
     * @ORM\Column(type="datetime", name="uupdate")
     */
    private $update;

    /**
     * item title
     * 
     * @ORM\Column(length=100)
     */
    private $title = '';

    /**
     * item url
     * 
     * @ORM\Column
     */
    private $url = '';

    /**
     * item filename
     * 
     * @ORM\Column
     */
    private $filename;

    /**
     * item description
     * 
     * @ORM\Column(nullable=true)
     */
    private $description;

    /**
     * timestamp for item creation
     * NOT a typo - 'date' is a reserved SQL word
     * set to current DateTime object in constructor
     * 
     * @ORM\Column(type="datetime", name="ddate")
     */
    private $date;

    /**
     * item email contact
     * 
     * @ORM\Column(length=100)
     */
    private $email = '';

    /**
     * item hitcount
     * 
     * @ORM\Column(type="integer")
     */
    private $hits = 0;

    /**
     * person who submitted item
     * 
     * @ORM\Column(length=60)
     */
    private $submitter = '';

    /**
     * item files size in Kb
     * note warning about floats & locales
     * @see http://docs.doctrine-project.org/projects/doctrine-orm/en/latest/reference/basic-mapping.html
     * 
     * @ORM\Column(type="float")
     */
    private $filesize = 0;

    /**
     * item version
     * 
     * @ORM\Column(length=5)
     */
    private $version = '';

    /**
     * item contact homepage
     * 
     * @ORM\Column(length=200) 
     */
    private $homepage = '';

    /**
     * modid
     * 
     * @ORM\Column(type="integer") 
     */
    private $modid = 0;

    /**
     * object id
     * 
     * @ORM\Column(length=5)
     */
    private $objectid = '';

    /**
     * Constructor 
     */
    public function __construct()
    {
        $this->update = new DateTime();
        $this->date = new DateTime();
    }

    public function getLid()
    {
        return $this->lid;
    }

    public function setLid($lid)
    {
        $this->lid = $lid;
    }

    public function getCid()
    {
        return $this->category->getCid();
    }
    
    public function getCategory()
    {
        return $this->category;
    }

    public function setCategory($category)
    {
        $this->category = $category;
    }

    public function getStatus()
    {
        return $this->status;
    }

    public function setStatus($status)
    {
        $this->status = $status;
    }

    public function getUpdate()
    {
        return $this->update;
    }

    public function setUpdate($update)
    {
        $this->update = $update;
    }

    public function getTitle()
    {
        return $this->title;
    }

    public function setTitle($title)
    {
        $this->title = $title;
    }

    public function getUrl()
    {
        return $this->url;
    }

    public function setUrl($url)
    {
        $this->url = $url;
    }

    public function getFilename()
    {
        return $this->filename;
    }

    public function setFilename($filename)
    {
        $this->filename = $filename;
    }

    public function getDescription()
    {
        return $this->description;
    }

    public function setDescription($description)
    {
        $this->description = $description;
    }

    public function getDate()
    {
        return $this->date;
    }

    public function setDate($date)
    {
        $this->date = $date;
    }

    public function getEmail()
    {
        return $this->email;
    }

    public function setEmail($email)
    {
        $this->email = $email;
    }

    public function getHits()
    {
        return $this->hits;
    }

    public function setHits($hits)
    {
        $this->hits = $hits;
    }

    public function getSubmitter()
    {
        return $this->submitter;
    }

    public function setSubmitter($submitter)
    {
        $this->submitter = $submitter;
    }

    public function getFilesize()
    {
        return $this->filesize;
    }

    public function setFilesize($filesize)
    {
        $this->filesize = $filesize;
    }

    public function getVersion()
    {
        return $this->version;
    }

    public function setVersion($version)
    {
        $this->version = $version;
    }

    public function getHomepage()
    {
        return $this->homepage;
    }

    public function setHomepage($homepage)
    {
        $this->homepage = $homepage;
    }

    public function getModid()
    {
        return $this->modid;
    }

    public function setModid($modid)
    {
        $this->modid = $modid;
    }

    public function getObjectid()
    {
        return $this->objectid;
    }

    public function setObjectid($objectid)
    {
        $this->objectid = $objectid;
    }

}
