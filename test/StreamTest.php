<?php

namespace Heartbeat\Partner\Test;

use Heartbeat\Partner\Stream;

class StreamTest extends SdkPartnerApiTestCase
{
    public function testFindException()
    {
        $this->expectException("luya\headless\Exception");
        Stream::viewOne(1, $this->getClient());
    }
}