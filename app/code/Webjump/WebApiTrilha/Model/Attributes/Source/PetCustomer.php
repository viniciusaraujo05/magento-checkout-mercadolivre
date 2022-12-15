<?php
/**
 * @author      Webjump Develop Team <dev@webjump.com.br>
 * @copyright   2022 Webjump (http://www.webjump.com.br)
 * @license     http://www.webjump.com.br Copyright
 * @link        http://www.webjump.com.br
 */

declare(strict_types=1);

namespace Webjump\WebApiTrilha\Model\Attributes\Source;

use Magento\Eav\Model\Entity\Attribute\Source\AbstractSource;

/**
 * Class ApprovalStatus
 *
 * Class approval status data patch
 */
class PetCustomer extends AbstractSource
{
    /**
     * Get All Options
     *
     * @return array|null
     */
    public function getAllOptions(): ?array
    {
        if (null === $this->_options) {
            $this->_options = [
                ['label' => __('Cachorro'), 'value' => 'cachorro'],
                ['label' => __('Baleia'), 'value' => 'baleia'],
                ['label' => __('Gato'), 'value' => 'gato'],
                ['label' => __('Dinossauro'), 'value' => 'dinossauro']
            ];
        }
        return $this->_options;
    }
}
