<?php

namespace Webjump\WebApiTrilha\Model\Resolver;

use Magento\Framework\GraphQl\Exception\GraphQlInputException;
use Magento\Framework\GraphQl\Config\Element\Field;
use Magento\Framework\GraphQl\Schema\Type\ResolveInfo;
use Magento\Framework\GraphQl\Query\ResolverInterface;
use Webjump\WebApiTrilha\Api\PetRepositoryInterface;

class InsertPet implements ResolverInterface
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


    /**
     * @inheritdoc
     */
    public function resolve(
        Field $field,
        $context,
        ResolveInfo $info,
        array $value = null,
        array $args = null
    ) {
        return [
            'result' =>  "dados incluidos com sucesso"
        ];
    }
}
