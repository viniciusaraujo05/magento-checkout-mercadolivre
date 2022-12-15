<?php

namespace Webjump\WebApiTrilha\Model\Repository;

use Magento\Framework\Api\Search\SearchResultInterface;
use Magento\Framework\Api\SearchCriteria\CollectionProcessor;
use Magento\Framework\Api\SearchCriteriaInterface;
use Magento\Framework\Exception\AlreadyExistsException;
use Magento\Framework\Exception\NoSuchEntityException;
use Webjump\WebApiTrilha\Api\Data\PetInterface;
use Webjump\WebApiTrilha\Model\ResourceModel\Pet as PetResourceModel;
use Webjump\WebApiTrilha\Api\PetRepositoryInterface;
use Webjump\WebApiTrilha\Api\Data\PetInterfaceFactory;
use Webjump\WebApiTrilha\Model\ResourceModel\Pet\CollectionFactory;

class PetRepository implements PetRepositoryInterface
{
    private $collectionProcessor;
    private $collectionFactory;
    private $searchResultFactory;
    private $petFactory;
    private $petResourceModel;
    /**
     * PetRepository constructor.
     * @param CollectionProcessor $collectionProcessor
     * @param CollectionFactory $collectionFactory
     * @param PetResourceModel $petResourceModel
     * @param PetInterfaceFactory $petFactory
     */
    // @codingStandardsIgnoreStart
    public function __construct(
        CollectionProcessor $collectionProcessor,
        CollectionFactory $collectionFactory,
        PetResourceModel $petResourceModel,
        PetInterfaceFactory $petFactory
    ) {
        $this->petResourceModel = $petResourceModel;
        $this->petFactory = $petFactory;
        $this->collectionFactory = $collectionFactory;
        $this->collectionProcessor = $collectionProcessor;
    }
    // @codingStandardsIgnoreEnd

    /**
     * Save method
     *
     * @param PetInterface $model
     *
     * @return void
     * @throws AlreadyExistsException
     */
    public function save(PetInterface $model)
    {
        $this->petResourceModel->save($model);
    }

    /**
     * Delete method
     *
     * @param PetInterface $model
     *
     * @return void
     * @throws Exception
     */
    public function delete(PetInterface $model)
    {
        $this->petResourceModel->delete($model);
    }

    /**
     * GetById method
     *
     * @param int $entityId
     *
     * @return PetInterface
     * @throws NoSuchEntityException
     */
    public function getById(int $entityId): PetInterface
    {
        $model = $this->petFactory->create();
        $this->petResourceModel->load($model, $entityId);

        if (!$model->getEntityId()) {
            throw new NoSuchEntityException(__("No Such entity with ID %1", $entityId));
        }

        return $model;
    }

    /**
     * GetByPet method
     *
     * @param string $pet
     *
     * @return PetInterface
     * @throws NoSuchEntityException
     */
    public function getByPet(string $pet): PetInterface
    {
        $model = $this->petFactory->create();
        $this->petResourceModel->load($model, $pet, 'pet');

        if (!$model->getEntityId()) {
            throw new NoSuchEntityException(__("No Such entity with pet %1", $pet));
        }

        return $model;
    }

    /**
     * GetList method
     *
     * @param SearchCriteriaInterface $searchCriteria
     *
     * @return SearchResultInterface
     */
    public function getList(SearchCriteriaInterface $searchCriteria):
    SearchResultInterface
    {
        $searchResult = $this->searchResultFactory->create();
        $collection = $this->collectionFactory->create();
        $this->collectionProcessor->process($searchCriteria, $collection);
        $searchResult->setItems($collection->getItems());
        $searchResult->setTotalCount($collection->getSize());
        return $searchResult;
    }
}
