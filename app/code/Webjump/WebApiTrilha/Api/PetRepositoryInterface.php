<?php

namespace Webjump\WebApiTrilha\Api;

use Exception;
use Magento\Framework\Api\Search\SearchResultInterface;
use Magento\Framework\Api\SearchCriteriaInterface;
use Magento\Framework\Exception\AlreadyExistsException;
use Magento\Framework\Exception\NoSuchEntityException;
use Webjump\WebApiTrilha\Api\Data\PetInterface;

interface PetRepositoryInterface
{
    /**
     * Save method
     *
     * @param PetInterface $model
     * @return void
     * @throws AlreadyExistsException
     */
    public function save(PetInterface $model);

    /**
     * Delete method
     *
     * @param PetInterface $model
     * @return void
     * @throws Exception
     */
    public function delete(PetInterface $model);

    /**
     * Get method
     *
     * @param int $entityId
     * @return PetInterface
     * @throws NoSuchEntityException
     */
    public function getById(int $entityId): PetInterface;


    /**
     * GetList method
     *
     * @param SearchCriteriaInterface $searchCriteria
     * @return SearchResultInterface
     */
    public function getList(SearchCriteriaInterface $searchCriteria):
    SearchResultInterface;
}
