<?php

namespace Webjump\WebApiTrilha\Model\ResourceModel;

use Magento\Framework\Model\ResourceModel\Db\AbstractDb;
use Webjump\WebApiTrilha\Api\Data\PetInterface;

class Pet extends AbstractDb
{
    /**
     * Magento's abstract db
     *
     * Default magento's abstract db class
     */
    protected function _construct()
    {
        $this->_init(PetInterface::TABLE, PetInterface::ENTITY_ID);
    }
}
