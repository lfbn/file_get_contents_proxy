# File Get Contents Proxy

> A proxy with extra features around file_get_contents.

## Installation

Install the package with composer:

```
composer require "lfbn/file-get-contents-proxy"
```

## Why use this?

With this package you can use [file_get_contents](https://www.php.net/manual/en/function.file-get-contents.php) to get the content of a file, and make this content cacheable in memory.

This way, you have an extra nice feature provided by this proxy, around file_get_contents.

## Usage

### Obtaining a file content once

If you only need to obtain the file content once, then you don't need to do anything differently. Just use file_get_contents as normal!

```php
<?php

$content = file_get_contents('some-file-name.txt');

```

### Obtaining a file content several times

If you want to tke advantage of this package, and need to obtain a file content several times, then you can use memory cache.

```php
<?php

use FileGetContentsProxy\FileGetContentsProxy;

$fileProxy = new FileGetContentsProxy('some-file-name.txt');

// It will be obtained from the file, and then, saved in memory.
$content = $fileProxy->memoryCacheGet();

// It will be obtained from the memory cache.
$cachedContent = $fileProxy->memoryCacheGet();

```

and in between you can request directly, without cache:

```php
<?php

$newContent = $fileProxy->directGet();

```
