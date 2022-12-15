<?php
namespace Webjump\WebApiTrilha\Model;

use Magento\Framework\Model\AbstractExtensibleModel;
use Webjump\WebApiTrilha\Api\Data\PetInterface;
use Webjump\WebApiTrilha\Model\ResourceModel\Pet as PetResourceModel;

class Hello extends AbstractExtensibleModel implements PetInterface
{
    /**
     * Magento's costruct
     *
     * Default magento's construct
     */
    protected function _construct()
    {
        $this->_init(PetResourceModel::class);
    }

    /**
     * getName method
     *
     * @return mixed
     */
    public function getName()
    {
        return $this->_getData(self::NAME);
    }

    /**
     * setName method
     *
     * @param string $name
     *
     * @return mixed
     */
    public function setName(string $name)
    {
        return $this->setData(self::NAME, $name);
    }

    /**
     * GetDescription method
     *
     * @return mixed
     */
    public function getDescription()
    {
        return $this->_getData(self::DESCRIPTION);
    }

    /**
     * SetDescription method
     *
     * @param string $description
     *
     * @return mixed
     */
    public function setDescription(string $description)
    {
        return $this->setData(self::DESCRIPTION, $description);
    }

    /**
     * getCreatedAt method
     *
     * @return mixed
     */
    public function getCreatedAt()
    {
        return $this->_getData(self::CREATED_AT);
    }

    /**
     * setCreatedAt method
     *
     * @param string $create
     *
     * @return mixed
     */
    public function setCreatedAt(string $create)
    {
        return $this->setData(self::CREATED_AT, $create);
    }
}
