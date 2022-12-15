<?php
namespace Webjump\WebApiTrilha\Api;

use Webjump\WebApiTrilha\Api\Data\PetInterface;

interface HelloInterface
{
    /**
     * InsertBungeGrid method
     *
     * @param PetInterface $data
     *
     * @return PetInterface
     */
    public function insertPet(PetInterface $data): PetInterface;

    /**
     * DeleteBungeGrid method
     *
     * @param string $entityId
     *
     * @return PetInterface
     */
    public function deletePet(string $entityId): PetInterface;
}
