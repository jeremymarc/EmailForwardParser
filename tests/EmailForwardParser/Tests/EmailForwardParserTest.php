<?php

namespace EmailForwardParser\Tests;

use EmailForwardParser\EmailForwardParser;

class EmailForwardParserTest extends TestCase
{
    public function setUp()
    {
        date_default_timezone_set('UTC');
    }

    public function testReadWithNullContent()
    {
        $forward = EmailForwardParser::read(null);

        $this->assertTrue(is_array($forward));
        $this->assertEquals(5, count($forward));
    }

    public function testReadWithEmptyContent()
    {
        $forward = EmailForwardParser::read('');

        $this->assertTrue(is_array($forward));
        $this->assertEquals(5, count($forward));
    }

    public function testParseForward()
    {
        $body = $this->getFixtures('email_1.txt');
        $forward = EmailForwardParser::read($body);

        $date = $forward['date'];
        $this->assertEquals($forward['from']['email'], 'jeremy@test.com');
        $this->assertEquals($forward['from']['name'], 'Jeremy Marc');
        $this->assertEquals($forward['to']['email'], 'jeremy@test.com');
        $this->assertEquals($forward['to']['name'], 'Jeremy Marc');
        $this->assertEquals($forward['subject'], 'Test');
        $this->assertEquals($date->format('Y-m-d'), '2013-03-22');
    }

    public function testParseForwardWithoutName()
    {
        $body = $this->getFixtures('email_2.txt');
        $forward = EmailForwardParser::read($body);

        $this->assertEquals($forward['from']['email'], 'jeremy@test.com');
        $this->assertEquals($forward['from']['name'], '');
        $this->assertEquals($forward['to']['email'], 'jeremy@test.com');
        $this->assertEquals($forward['to']['name'], '');
    }
}
