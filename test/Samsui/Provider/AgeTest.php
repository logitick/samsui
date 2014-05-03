<?php namespace Samsui\Provider;

use \PHPUnit_Framework_TestCase;
use Samsui\Generator\Generator;

class AgeTest extends PHPUnit_Framework_TestCase
{
    protected $generator;

    protected function setUp()
    {
        $this->generator = new Generator();
        $this->generator->registerProvider('math', new Math($this->generator));
    }

    public function testBetween()
    {
        $provider = new Age($this->generator);
        $number = $provider->between(1, 4);
        $this->assertInternalType('int', $number);
        $this->assertTrue($number >= 1 && $number <= 4);
    }

    public function testPick()
    {
        $provider = new Age($this->generator);
        $number = $provider->pick(1, 6, 3);
        $this->assertInternalType('int', $number);
        $this->assertTrue(in_array($number, array(1, 6, 3)));
    }

    public function testGroups1()
    {
        $provider = new Age($this->generator);
        $number = $provider->groups(array(10, 13));
        $this->assertInternalType('int', $number);
        $this->assertTrue(in_array($number, array(10, 11, 12, 13)));
    }

    public function testGroups2()
    {
        $provider = new Age($this->generator);
        $number = $provider->groups(array(10, 13), array(5, 8));
        $this->assertInternalType('int', $number);
        $this->assertTrue(in_array($number, array(10, 11, 12, 13, 5, 6, 7, 8)));
    }
}
