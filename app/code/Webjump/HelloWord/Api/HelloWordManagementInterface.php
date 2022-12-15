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

namespace Webjump\HelloWord\Api;

interface HelloWordManagementInterface
{
    /**
     * PostHelloWord method
     *
     * @param \Webjump\HelloWord\Api\Data\HelloWordInterface $name
     *
     * @return \Webjump\HelloWord\Api\Data\HelloWordInterface
     */
    public function insertHelloWord(
        \Webjump\HelloWord\Api\Data\HelloWordInterface $name
    ): \Webjump\HelloWord\Api\Data\HelloWordInterface;

    /**
     * DeleteHelloWord method
     *
     * @param string $entityId
     *
     * @return \Webjump\HelloWord\Api\Data\HelloWordInterface
     */
    public function deleteHelloWord(string $entityId): \Webjump\HelloWord\Api\Data\HelloWordInterface;
}
