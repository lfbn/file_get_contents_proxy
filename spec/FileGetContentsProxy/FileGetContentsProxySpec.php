<?php

namespace spec\FileGetContentsProxy;

use FileGetContentsProxy\FileGetContentsProxy;
use PhpSpec\ObjectBehavior;

class FileGetContentsProxySpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->beConstructedWith('some_filename.txt');
        $this->shouldHaveType(FileGetContentsProxy::class);
    }

    function it_should_have_all_file_get_contents_arguments()
    {
        $this->beConstructedWith(
            'some_filename.txt',
            false,
            NULL,
            0,
            0
        );
        $this->shouldHaveType(FileGetContentsProxy::class);
    }
}
