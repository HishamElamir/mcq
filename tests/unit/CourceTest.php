<?php

class CourceTest extends \PHPUnit_Framework_TestCase
{
    protected function setUp()
    {
     	$var = 250;
     	$expected = 250;
     	$this->assertAttributeEquals($expected, $var);
    }

    protected function tearDown()
    {
    	
    }

    // tests
    public function testMe()
    {
    }
}
