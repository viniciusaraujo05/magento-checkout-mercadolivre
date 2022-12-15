<?php

namespace Webjump\WebApiTrilha\Model\ResourceModel\Pet;

use Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection;
use Webjump\WebApiTrilha\Api\Data\PetInterface;
use Webjump\WebApiTrilha\Model\Hello;
use Webjump\WebApiTrilha\Model\ResourceModel\Pet as PetResourceModel;

class Collection extends AbstractCollection
{
    /** @var string */
    protected $_eventPrefix = PetInterface::TABLE;

    /** @var string */
    protected $_eventObject = PetInterface::TABLE;

    /** @var integer */
    protected $_idFieldName = PetInterface::ENTITY_ID;

    /**
     * Default magento's construct
     *
     * Magento's construct collection
     */
    protected function _construct()
    {
        $this->_init(Hello::class, PetResourceModel::class);
    }
}
