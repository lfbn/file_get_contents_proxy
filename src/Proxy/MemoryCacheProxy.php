<?php

namespace FileGetContentsProxy\Proxy;

/**
 * Class MemoryCacheProxy
 * @package FileGetContentsProxy\Proxy
 */
class MemoryCacheProxy implements ProxyInterface
{

    /**
     * @var array
     */
    private $cache = [];

    /**
     * @var DirectProxy
     */
    private $directProxy;

    /**
     * MemoryCacheProxy constructor.
     * @param DirectProxy $directProxy
     */
    public function __construct(DirectProxy $directProxy)
    {
        $this->directProxy = $directProxy;
    }

    /**
     * @inheritDoc
     */
    public function getContent()
    {
        if (isset($this->cache[$this->directProxy->getFilename()])) {
            return $this->cache[$this->directProxy->getFilename()];
        }

        $this->cache[$this->directProxy->getFilename()] = $this->directProxy->getContent();
        return $this->cache[$this->directProxy->getFilename()];
    }

    /**
     * @inheritDoc
     */
    public function getFilename()
    {
        return $this->directProxy->getFilename();
    }
}
