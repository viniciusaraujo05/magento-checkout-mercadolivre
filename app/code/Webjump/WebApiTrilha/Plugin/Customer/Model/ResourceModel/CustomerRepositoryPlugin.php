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

namespace Webjump\WebApiTrilha\Plugin\Customer\Model\ResourceModel;

use Magento\Customer\Api\Data\CustomerSearchResultsInterface;
use Magento\Customer\Api\CustomerRepositoryInterface;
use Magento\Customer\Api\Data\CustomerInterface;
use Magento\Customer\Api\Data\CustomerExtensionInterfaceFactory as Factory;

/**
 * Class CustomerRepositoryPlugin for add "white_zone" as extension attribute
 * @SuppressWarnings(PHPMD)
 * Suppressing PHPMD because $subject is not used
 */
class CustomerRepositoryPlugin
{
    private Factory $factory;
    private CustomerInterface $customerInterface;
    /**
     * SetWhiteZoneAttribute constructor.
     *
     * @param Factory $factory
     * @param CustomerInterface $customerInterface
     */
    // @codingStandardsIgnoreStart
    public function __construct(
        Factory $factory,
        CustomerInterface $customerInterface
    ) {
        $this->customerInterface = $customerInterface;
        $this->factory = $factory;
    }
    // @codingStandardsIgnoreEnd

    /**
     * AfterGetList method
     *
     * @param CustomerRepositoryInterface $subject
     * @param CustomerSearchResultsInterface $customerSearchResults
     *
     * @return CustomerSearchResultsInterface
     */
    public function afterGetList(
        CustomerRepositoryInterface $subject,
        CustomerSearchResultsInterface $customerSearchResults
    ): CustomerSearchResultsInterface {
        $customers = $customerSearchResults->getItems();

        foreach ($customers as &$customer) {
            $extensionAttributes = $customer->getExtensionAttributes();

            if (empty($extensionAttributes)) {
                $extensionAttributes = $this->factory->create();
            }

            $extensionAttributes->setPet('Mickey');
            $this->customerInterface->setExtensionAttributes($extensionAttributes);

        }

        return $customerSearchResults;
    }
}
