<?php

namespace FileGetContentsProxy\Proxy;

/**
 * Class SimpleDownloader
 * @package ProxyDownloader\Proxy
 */
class DirectProxy implements ProxyInterface
{

    /* @var string */
    private $filename;

    /* @var bool */
    private $useIncludePath;

    /* @var resource|null */
    private $context;

    /* @var int */
    private $offset;

    /* @var int|null */
    private $maxlen;

    /**
     * DirectProxy constructor.
     * @param array $params
     */
    public function __construct(array $params)
    {
        $this->filename = $params['filename'];
        $this->useIncludePath = $params['useIncludePath'];
        $this->context = $params['context'];
        $this->offset = $params['offset'];
        $this->maxlen = $params['maxlen'];
    }

    /**
     * @inheritDoc
     */
    public function getContent() {
        if ($this->maxlen !== 0) {
            return file_get_contents(
                $this->filename,
                $this->useIncludePath,
                $this->context,
                $this->offset,
                $this->maxlen
            );
        }

        return file_get_contents(
            $this->filename,
            $this->useIncludePath,
            $this->context,
            $this->offset
        );
    }

    /**
     * @inheritDoc
     */
    public function getFilename(): string
    {
        return $this->filename;
    }
}
