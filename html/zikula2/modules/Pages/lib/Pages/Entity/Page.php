<?php
/**
 * Copyright Pages Team 2012
 *
 * This work is contributed to the Zikula Foundation under one or more
 * Contributor Agreements and licensed to You under the following license:
 *
 * @license GNU/LGPLv3 (or at your option, any later version).
 * @package Pages
 * @link https://github.com/zikula-modules/Pages
 *
 * Please see the NOTICE file distributed with this source code for further
 * information regarding copyright and licensing.
 */

use Doctrine\ORM\Mapping as ORM;
use Gedmo\Mapping\Annotation as Gedmo;
use DoctrineExtensions\StandardFields\Mapping\Annotation as ZK;

/**
 * Events entity class.
 *
 * Annotations define the entity mappings to database.
 *
 * @ORM\Entity
 * @ORM\Table(name="pages")
 */
class Pages_Entity_Page extends Zikula_EntityAccess
{

    /**
     * The following are annotations which define the fid field.
     *
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $pageid;
    
    /**
     * The following are annotations which define the title field.
     *
     * @ORM\Column(type="text")
     */
    private $title = '';

    /**
     * The following are annotations which define the metadescription field.
     *
     * @ORM\Column(type="text")
     */
    private $metadescription = '';

    /**
     * The following are annotations which define the metakeywords field.
     *
     * @ORM\Column(type="text")
     */
    private $metakeywords = '';


    /**
     * The following are annotations which define the urltitle field.
     *
     * @ORM\Column(type="text")
     */
    private $urltitle = '';


    /**
     * The following are annotations which define the content field.
     *
     * @ORM\Column(type="text")
     */
    private $content = '';

    /**
     * The following are annotations which define the counter field.
     *
     * @ORM\Column(type="integer")
     */
    private $counter = 0;

    /**
     * The following are annotations which define the displaywrapper field.
     *
     * @ORM\Column(type="boolean")
     */
    private $displaywrapper = true;

    /**
     * The following are annotations which define the displaytitle field.
     *
     * @ORM\Column(type="boolean")
     */
    private $displaytitle = true;

    /**
     * The following are annotations which define the displaycreated field.
     *
     * @ORM\Column(type="boolean")
     */
    private $displaycreated = true;

    /**
     * The following are annotations which define the displayupdated field.
     *
     * @ORM\Column(type="boolean")
     */
    private $displayupdated = true;

    /**
     * The following are annotations which define the displaytextinfo field.
     *
     * @ORM\Column(type="boolean")
     */
    private $displaytextinfo = true;


    /**
     * The following are annotations which define the displayprint field.
     *
     * @ORM\Column(type="boolean")
     */
    private $displayprint = true;


    /**
     * The following are annotations which define the language field.
     *
     * @ORM\Column(type="string", length="30")
     */
    private $language = '';


    public function getPageid()
    {
        return $this->pageid;
    }

    /**
     * Get page title
     *
     * @return string
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * Get meta description
     *
     * @return string
     */
    public function getMetadescription()
    {
        return $this->metadescription;
    }

    /**
     * Get meta keywords
     *
     * @return string
     */
    public function getMetakeywords()
    {
        return $this->metakeywords;
    }

    /**
     * Get url title
     *
     * @return string
     */
    public function getUrltitle()
    {
        return $this->urltitle;
    }

    /**
     * Get content
     *
     * @return string
     */
    public function getContent()
    {
        return $this->content;
    }

    /**
     * Get counter
     *
     * @return int
     */
    public function getCounter()
    {
        return $this->counter;
    }

    /**
     * Get display wrapper
     *
     * @return bool
     */
    public function getDisplaywrapper()
    {
        return $this->displaywrapper;
    }

    /**
     * Get display title
     *
     * @return bool
     */
    public function getDisplaytitle()
    {
        return $this->displaytitle;
    }

    /**
     * Get display created
     *
     * @return bool
     */
    public function getDisplaycreated()
    {
        return $this->displaycreated;
    }

    /**
     * Get display updated
     *
     * @return bool
     */
    public function getdisplayupdated()
    {
        return $this->displayupdated;
    }

    /**
     * Get display text info
     *
     * @return bool
     */
    public function getdisplaytextinfo()
    {
        return $this->displaytextinfo;
    }

    /**
     * Get display print
     *
     * @return bool
     */
    public function getdisplayprint()
    {
        return $this->displayprint;
    }

    /**
     * Get page language
     *
     * @return string
     */
    public function getLanguage()
    {
        return $this->language;
    }

    /**
     * Set page id
     *
     * @param int $pageid
     */
    public function setpageid($pageid)
    {
        $this->pageid = $pageid;
    }

    /**
     * Set page title
     *
     * @param string $title
     */
    public function setTitle($title)
    {
        $this->title = $title;
    }

    /**
     * Set page meta description
     *
     * @param string $metadescription
     */
    public function setMetadescription($metadescription)
    {
        $this->metadescription = $metadescription;
    }

    /**
     * Set page meta keywords
     *
     * @param string $metakeywords
     */
    public function setMetakeywords($metakeywords)
    {
        $this->metakeywords = $metakeywords;
    }

    /**
     * Set page url title
     *
     * @param string $urltitle
     */
    public function setUrltitle($urltitle)
    {
        $this->urltitle = $urltitle;
    }

    /**
     * Set page content
     *
     * @param string $content
     */
    public function setContent($content)
    {
        $this->content = $content;
    }

    /**
     * Set page counter
     *
     * @param int $counter
     */
    public function setCounter($counter)
    {
        $this->counter = $counter;
    }

    /**
     * Set page display wrapper
     *
     * @param bool $displaywrapper
     */
    public function setDisplaywrapper($displaywrapper)
    {
        $this->displaywrapper = $displaywrapper;
    }

    /**
     * Set if title should be shown
     *
     * @param bool $displaytitle
     */
    public function setDisplaytitle($displaytitle)
    {
        $this->displaytitle = $displaytitle;
    }

    /**
     * Set if the creator name and the creation time should be shown.
     *
     * @param bool $displaycreated
     */
    public function setDisplaycreated($displaycreated)
    {
        $this->displaycreated = $displaycreated;
    }

    /**
     * Set if the updater name and the update time should be shown.
     *
     * @param bool $displayupdated
     */
    public function setDisplayupdated($displayupdated)
    {
        $this->displayupdated = $displayupdated;
    }

    /**
     * Set if the text info should be shown.
     *
     * @param bool $displaytextinfo
     */
    public function setDisplaytextinfo($displaytextinfo)
    {
        $this->displaytextinfo = $displaytextinfo;
    }

    /**
     * Set if print link should shown
     *
     * @param bool $displayprint
     */
    public function setDisplayprint($displayprint)
    {
        $this->displayprint = $displayprint;
    }

    /**
     * Set page language
     *
     * @param $language
     */
    public function setLanguage($language)
    {
        $this->language = $language;
    }

    /**
     * Increment page counter
     */
    public function incrementCounter()
    {
        $this->counter++;
    }


    /**
     * The following are annotations which define the id field.
     *
     * @ORM\Column(type="integer")
     * @ZK\StandardFields(type="userid", on="create")
     */
    private $cr_uid;

    /**
     * Set creator uid
     *
     * @return mixed
     */
    public function getCr_uid()
    {
        return $this->cr_uid;
    }

    /**
     * The following are annotations which define the id field.
     *
     * @var datetime
     * @ORM\Column(type="datetime")
     * @Gedmo\Timestampable(on="create")
     */
    private $cr_date;

    /**
     * Get creation time
     *
     * @return datetime
     */
    public function getCr_date()
    {
        return $this->cr_date;
    }


    /**
     * The following are annotations which define the id field.
     *
     * @ORM\Column(type="integer")
     * @ZK\StandardFields(type="userid", on="update")
     */
    private $lu_uid;

    /**
     * Get last udate uid
     *
     * @return mixed
     */
    public function getLu_uid()
    {
        return $this->lu_uid;
    }

    /**
     * The following are annotations which define the id field.
     *
     * @var datetime
     * @ORM\Column(type="datetime")
     * @Gedmo\Timestampable(on="update")
     */
    private $lu_date;

    /**
     * Get last update date
     *
     * @return datetime
     */
    public function getLu_date()
    {
        return $this->lu_date;
    }


    /**
     * @ORM\OneToMany(targetEntity="Pages_Entity_Category",
     *                mappedBy="entity", cascade={"all"},
     *                orphanRemoval=true, indexBy="categoryRegistryId")
     */
    private $categories;

    /**
     * Get page categories
     *
     * @return Doctrine\Common\Collections\ArrayCollection
     */
    public function getCategories()
    {
        return $this->categories;
    }

    /**
     * Set page categories
     *
     * @param $categories
     */
    public function setCategories($categories)
    {
        $this->categories = $categories;
    }

    /**
     * Get page categories2
     *
     * @return string
     */
    public function getCategories2()
    {
        $output = array();
        foreach ($this->categories as $category) {
            $test = $category->toArray();
            $output[] = $test['category']['name'];
        }
        return implode(', ', $output);
    }


    /**
     * The following are annotations which define the counter field.
     *
     * @ORM\Column(type="string", length=1)
     */
    private $obj_status = 'A';

    /**
     * Get object status
     *
     * @return string
     */
    public function getObj_status()
    {
        return $this->obj_status;
    }

    /**
     * Constuct
     */
    public function __construct()
    {
        $this->categories = new Doctrine\Common\Collections\ArrayCollection();
    }


}