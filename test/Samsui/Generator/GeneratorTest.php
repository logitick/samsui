<?php

namespace Samsui\Generator;

use \PHPUnit_Framework_TestCase;
use Samsui\Generator\Provider\Math;

class GeneratorTest extends PHPUnit_Framework_TestCase
{
    public function testRegisterProvider()
    {
        $generator = new Generator();
        $provider = new Math($generator);
        $generator->registerProvider('math', $provider);
        $this->assertEquals($provider, $generator->math);
    }

    public function testGetNull()
    {
        $generator = new Generator();
        $this->assertNull($generator->math);
    }
}
