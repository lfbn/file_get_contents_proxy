<?php

namespace FileGetContentsProxy;

use FileGetContentsProxy\Proxy\ProxyInterface;

/**
 * Class AbstractProxyFactory
 * @package FileGetContentsProxy
 */
abstract class AbstractProxyFactory
{
    /**
     * @param array $params
     * @return ProxyInterface
     */
    abstract public static function createDirectProxy(array $params): ProxyInterface;

    /**
     * @param array $params
     * @return ProxyInterface
     */
    abstract public static function createMemoryCacheProxy(array $params): ProxyInterface;
}
