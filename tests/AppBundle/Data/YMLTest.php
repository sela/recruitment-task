<?php

namespace Tests\AppBundle\Data;

use AppBundle\Data\YML;

class YMLTest extends \PHPUnit_Framework_TestCase
{
    public function testGetValue()
    {
        $stubUsersCollection = $this->getMockBuilder('AppBundle\Entity\User')
            ->setMethods(['getValue'])
            ->getMock();

        $stubUsersCollection
            ->method('getValue')
            ->with()
            ->willReturn(100);

        $csv = new YML($stubUsersCollection);

        $this->assertEquals(100, $csv->getValue());
    }

    public function testIsActive()
    {
        $stubUsersCollection = $this->getMockBuilder('AppBundle\Entity\User')
            ->setMethods(['getActive'])
            ->getMock();

        $stubUsersCollection
            ->method('getActive')
            ->with()
            ->willReturn(true);

        $csv = new YML($stubUsersCollection);

        $this->assertEquals(true, $csv->isActive());
    }
}
