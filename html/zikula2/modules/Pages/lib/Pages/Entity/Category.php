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


/**
 * Pages entity class.
 *
 * Annotations define the entity mappings to database.
 *
 * @ORM\Entity
 * @ORM\Table(name="pages_category",
 *            uniqueConstraints={@ORM\UniqueConstraint(name="cat_unq",columns={"registryId", "categoryId", "entityId"})})
 */
class Pages_Entity_Category extends Zikula_Doctrine2_Entity_EntityCategory
{
    
    /**
     * @ORM\ManyToOne(targetEntity="Pages_Entity_Page", inversedBy="categories")
     * @ORM\JoinColumn(name="entityId", referencedColumnName="pageid")
     * @var Pages_Entity_Page
     */
    private $entity;

    /**
     * Set entity
     *
     * @return Pages_Entity_Page
     */
    public function getEntity()
    {
        return $this->entity;
    }

    /**
     * Set entity
     *
     * @param Pages_Entity_Page $entity
     */
    public function setEntity($entity)
    {
        $this->entity = $entity;
    }
    
}