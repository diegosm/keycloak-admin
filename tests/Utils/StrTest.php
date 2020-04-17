<?php

declare(strict_types=1);

namespace Tests\Utils;

use KeycloakAdmin\Utils\Str;
use PHPUnit\Framework\TestCase;

class StrTest extends TestCase
{
    public function testItShouldEndWithString()
    {
        $result = Str::endsWith('mylittleString', 'ing');
        $this->assertTrue($result);
    }

    public function testItShouldEndWithChar()
    {
        $result = Str::endsWith('myChar/', '/');
        $this->assertTrue($result);
    }

    public function testItShouldntEndWithString()
    {
        $result = Str::endsWith('myLittleString', 'not');
        $this->assertFalse($result);
    }
}
