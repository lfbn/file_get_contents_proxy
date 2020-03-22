<?php

namespace FileGetContentsProxy\Proxy;

/**
 * Interface DownloaderInterface
 */
interface ProxyInterface
{
    /**
     * @return string|false
     */
    public function getContent();

    /**
     * @return string|false
     */
    public function getFilename();
}
