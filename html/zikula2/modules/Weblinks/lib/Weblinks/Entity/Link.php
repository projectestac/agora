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
 * Link entity class
 *
 * Annotations define the entity mappings to database.
 *
 * @ORM\Entity(repositoryClass="Weblinks_Entity_Repository_LinkRepository")
 * @ORM\Table(name="links_links")
 */
class Weblinks_Entity_Link extends Zikula_EntityAccess
{
    /**
     * Link Item status
     */

    const INACTIVE_MODIFIED = -2;
    const INACTIVE_BROKEN = -1;
    const INACTIVE = 0;
    const ACTIVE = 1;
    const ACTIVE_BROKEN = 2;
    const ACTIVE_MODIFIED = 3;

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
     * @ORM\ManyToOne(targetEntity="Weblinks_Entity_Category")
     * @ORM\JoinColumn(name="cat_id", referencedColumnName="cat_id")
     */
    private $category;

    /**
     * item status
     * 
     * @ORM\Column(type="integer")
     */
    private $status = self::INACTIVE;

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
     * item description
     * 
     * @ORM\Column(type="text")
     */
    private $description = '';

    /**
     * timestamp for item creation
     * NOT a typo - 'date' is a reserved SQL word
     * set to current DateTime object in constructor
     * 
     * @ORM\Column(type="datetime", name="ddate")
     */
    private $date;

    /**
     * user name
     * 
     * @ORM\Column(length=100)
     */
    private $name = '';

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
     * sid field (modify submitter id)
     *
     * @ORM\Column(type="integer", nullable=true)
     */
    private $sid = null;
    
    /**
     * person who submitted item
     * 
     * @ORM\Column(length=60)
     */
    private $modifysubmitter = '';
    
    /**
     * Content submitted as replacement data
     * stored as serialized array
     * 
     * @ORM\Column(type="array", nullable=true, name="modcontent") 
     */
    private $modifiedContent = null;
    
    /**
     * Constructor 
     */
    public function __construct()
    {
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

    public function getCat_id()
    {
        return $this->category->getCat_id();
    }
    
    public function getCategory()
    {
        return $this->category;
    }

    public function setCategory(Weblinks_Entity_Category $category)
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

    public function setDate(DateTime $date)
    {
        $this->date = $date;
    }
    
    public function getName()
    {
        return $this->name;
    }

    public function setName($name)
    {
        $this->name = $name;
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

    public function getSid()
    {
        return $this->sid;
    }

    public function setSid($sid)
    {
        $this->sid = $sid;
    }

    public function getModifiedContent()
    {
        return $this->modifiedContent;
    }

    public function setModifiedContent(array $modifiedContent)
    {
        $this->modifiedContent = $modifiedContent;
    }
    
    public function getModifysubmitter()
    {
        return $this->modifysubmitter;
    }

    public function setModifysubmitter($modifysubmitter)
    {
        $this->modifysubmitter = $modifysubmitter;
    }

    public function merge(array $array)
    {
        foreach ($array as $key => $value) {
            if ($key <> "cat_id") {
                $method = "set" . ucfirst($key);
                $this->$method($value);
            }
        }
    }

}
