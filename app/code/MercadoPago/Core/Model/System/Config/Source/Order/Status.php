<?php

namespace MercadoPago\Core\Model\System\Config\Source\Order;

/**
 * Overrides array to avoid showing certain statuses as an option
 * Class Status
 *
 * @package MercadoPago\Core\Model\System\Config\Source\Order
 */
class Status extends \Magento\Sales\Model\Config\Source\Order\Status
{
    /**
     * @var string[]
     */
    protected $_stateStatuses = null;
}
