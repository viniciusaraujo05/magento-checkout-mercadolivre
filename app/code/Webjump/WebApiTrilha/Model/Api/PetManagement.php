<?php

namespace Webjump\WebApiTrilha\Model\Api;

use Webjump\WebApiTrilha\Api\HelloInterface;
use Webjump\WebApiTrilha\Api\PetRepositoryInterface;
use Exception;
use Magento\Framework\Exception\AlreadyExistsException;
use Magento\Framework\Exception\NoSuchEntityException;
use Webjump\WebApiTrilha\Api\Data\PetInterface;
use Webjump\WebApiTrilha\Api\Data\PetInterfaceFactory;

class PetManagement implements HelloInterface
{
    private $petRepository;
    /**
     * PetManagement constructor.
     *
     * @param PetRepositoryInterface $petRepository
     */
    // @codingStandardsIgnoreStart
    public function __construct(
        PetRepositoryInterface $petRepository
    ) {
        $this->petRepository = $petRepository;
    }
    // @codingStandardsIgnoreEnd

    /**
     * InsertPet method
     *
     * @param PetInterface $data
     *
     * @return PetInterface
     * @throws AlreadyExistsException
     * @throws NoSuchEntityException
     */
    public function insertPet(PetInterface $data): PetInterface
    {
        $this->petRepository->save($data);

        return $this->petRepository->getById((int) $data->getEntityId());
    }

    /**
     * DeletePet method
     *
     * @param string $entityId
     *
     * @return PetInterface
     * @throws Exception
     */
    public function deletePet(string $entityId): PetInterface
    {
        $model = $this->petRepository->getById((int) $entityId);

        $this->petRepository->delete($model);

        return $model;
    }
}
