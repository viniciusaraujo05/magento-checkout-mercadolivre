<?php
/**
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
 */

namespace Webjump\HelloWord\Plugin;

use Magento\Framework\App\Action\Action;
use Psr\Log\LoggerInterface;
use Magento\Framework\App\RequestInterface;
use Magento\Framework\App\ResponseInterface;
use Monolog\Logger;


class Plugin
{
    public function __construct(LoggerInterface $logger, Logger $log )
    {
        $this->log = $log;
        $this->logger = $logger;
    }

    public function beforeDispatch(Action $subject, RequestInterface $request)
    {
        $this->logger->info('beforeDispatch');
        $this->log->info('beforeDispatch');

        return ['request' => $request];
    }

    public function aroundDispatch(Action $subject, callable $proceed,RequestInterface $request)
    {
        $this->logger->info('BeforeAround');
        $this->log->info('BeforeAround');
        $result = $proceed($request);
        $this->logger->info('AfterAround');
        $this->log->info('AfterAround');

        return $result;
    }

    public function afterDispatch(Action $subject, $result, RequestInterface $request)
    {
        $this->logger->info('After');
        $this->log->info('After');

        return $result;
    }
}
