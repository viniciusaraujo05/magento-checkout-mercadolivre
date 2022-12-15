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

namespace Webjump\HelloWord\Api\Data;

interface HelloWordInterface
{

    public const NAME = 'name';

    /**
     * GetName method
     *
     * @return string
     */
    public function getName(): string;

    /**
     * SetName method
     *
     * @param string $name
     *
     * @return \Webjump\HelloWord\Api\Data\HelloWordInterface
     */
    public function setName(string $name): \Webjump\HelloWord\Api\Data\HelloWordInterface;
}
