<?php
/**
 * Copyright © Magento, Inc. All rights reserved.
 *
 * @author      Webjump Core Team <dev@webjump.com.br>
 * @copyright   2022 Webjump (http://www.webjump.com.br)
 * @license     http://www.webjump.com.br Copyright
 * @link        http://www.webjump.com.br
 */

declare(strict_types=1);

namespace Webjump\WebApiTrilha\Setup\Patch\Data;

use Magento\Customer\Model\Customer;
use Magento\Customer\Setup\CustomerSetupFactory;
use Magento\Framework\Setup\ModuleDataSetupInterface;
use Magento\Framework\Setup\Patch\DataPatchInterface;

class AddPetCustomer implements DataPatchInterface
{
    public const NEW_CUSTOMER_BUNGE = 'new_customer_bunge';

    /** @var ModuleDataSetupInterface */
    private $moduleDataSetup;

    /** @var CustomerSetupFactory */
    private $customerSetupFactory;

    /**
     * AddCustomerSegmentAttribute constructor.
     *
     * @param ModuleDataSetupInterface $moduleDataSetup
     * @param CustomerSetupFactory $customerSetupFactory
     */
    public function __construct(
        ModuleDataSetupInterface $moduleDataSetup,
        CustomerSetupFactory     $customerSetupFactory
    ) {
        $this->moduleDataSetup = $moduleDataSetup;
        $this->customerSetupFactory = $customerSetupFactory;
    }

    /**
     * @inheritdoc
     * @throws \Exception
     */
    public function apply()
    {
        $customerSetup = $this->customerSetupFactory->create(['setup' => $this->moduleDataSetup]);
        $customerEntity = $customerSetup->getEavConfig()->getEntityType(Customer::ENTITY);
        $attributeSetId = $customerEntity->getDefaultAttributeSetId();
        $attributeGroup = $customerSetup->getDefaultAttributeGroupId(
            $customerEntity->getEntityTypeId(),
            $attributeSetId
        );

        $customerSetup->removeAttribute(
            Customer::ENTITY,
            self::NEW_CUSTOMER_BUNGE
        );

        $customerSetup->addAttribute(Customer::ENTITY, self::NEW_CUSTOMER_BUNGE, [
            'type' => 'varchar',
            'label' => __('Aparecer Pet'),
            'input' => 'boolean',
            'required' => false,
            'visible' => true,
            'user_defined' => true,
            'position' => 1100,
            'system' => 0,
        ]);

        $attribute = $customerSetup
            ->getEavConfig()
            ->getAttribute(Customer::ENTITY, self::NEW_CUSTOMER_BUNGE)
            ->addData([
                'attribute_set_id' => $attributeSetId,
                'attribute_group_id' => $attributeGroup,
                'used_in_forms' => [
                    'adminhtml_checkout',
                    'adminhtml_customer',
                    'customer_account_edit',
                    'customer_account_create',
                ],
            ]);

        $attribute->save();
    }

    /**
     * @inheritdoc
     */
    public static function getDependencies()
    {
        return [];
    }

    /**
     * @inheritdoc
     */
    public function getAliases()
    {
        return [];
    }
}
