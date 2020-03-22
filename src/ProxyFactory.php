<?php

namespace FileGetContentsProxy;

use FileGetContentsProxy\Proxy\DirectProxy;
use FileGetContentsProxy\Proxy\MemoryCacheProxy;
use FileGetContentsProxy\Proxy\ProxyInterface;


/**
 * Class ProxyFactory
 * @package FileGetContentsProxy
 */
class ProxyFactory extends AbstractProxyFactory
{

    /**
     * @inheritDoc
     */
    public static function createDirectProxy(array $params): ProxyInterface
    {
        return new DirectProxy($params);
    }

    /**
     * @inheritDoc
     */
    public static function createMemoryCacheProxy(array $params): ProxyInterface
    {
        return new MemoryCacheProxy(new DirectProxy($params));
    }
}
