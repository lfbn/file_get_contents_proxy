<?php

namespace FileGetContentsProxy;

use FileGetContentsProxy\Proxy\ProxyInterface;

/**
 * Package entry point. It replicates the arguments and returns
 * of file_get_contents, allowing to create an instance, and using it
 * to obtain the result directly, or using memory cache of it.
 *
 * Class FileGetContentsProxy
 * @package FileGetContentsProxy
 */
class FileGetContentsProxy
{

    /**
     * @var ProxyInterface
     */
    private $directProxy;

    /**
     * @var ProxyInterface
     */
    private $memoryCacheProxy;

    /**
     * Creates an instance of FileGetContentsProxy. It supports
     * all arguments that file_get_contents has.
     * @link https://php.net/manual/en/function.file-get-contents.php
     *
     * @param string $filename <p>
     * Name of the file to read.
     * </p>
     * @param bool $useIncludePath [optional] <p>
     * Note: As of PHP 5 the FILE_USE_INCLUDE_PATH constant can be
     * used to trigger include path search.
     * </p>
     * @param resource|null $context [optional] <p>
     * A valid context resource created with
     * stream_context_create. If you don't need to use a
     * custom context, you can skip this parameter by &null;.
     * </p>
     * @param int $offset [optional] <p>
     * The offset where the reading starts.
     * </p>
     * @param int|null $maxlen [optional] <p>
     * Maximum length of data read. The default is to read until end
     * of file is reached.
     * </p>
     */
    public function __construct(
        string $filename,
        bool $useIncludePath = false,
        $context = NULL,
        int $offset = 0,
        int $maxlen = 0
    ) {
        $params = [
            'filename' => $filename,
            'useIncludePath' => $useIncludePath,
            'context' => $context,
            'offset' => $offset,
            'maxlen' => $maxlen
        ];
        $this->directProxy = ProxyFactory::createDirectProxy($params);
        $this->memoryCacheProxy = ProxyFactory::createMemoryCacheProxy($params);
    }

    /**
     * Uses directly file_get_contents to return a result.
     *
     * @return string|false
     */
    public function directGet()
    {
        return $this->directProxy->getContent();
    }

    /**
     * Uses memory cache to save the first result. Returns that one, in
     * the next requests.
     *
     * @return string|false
     */
    public function memoryCacheGet()
    {
        return $this->memoryCacheProxy->getContent();
    }
}
