<?php

namespace EmailForwardParser\Tests;

use EmailForwardParser\EmailForwardParser;
use EmailForwardParser\Email;

class EmailForwardParserTest extends TestCase
{
    public function setUp()
    {
        date_default_timezone_set('UTC');
    }

    //public function testReadWithNullContent()
    //{
        //$forward = EmailForwardParser::read(null);

        //$this->assertTrue($forward instanceof Email);
        //$this->assertEquals($forward->getBody(), '');
        //$this->assertEquals($forward->getSubject(), null);
        //$this->assertEquals($forward->getFrom(), array());
        //$this->assertEquals($forward->getTo(), array());
    //}

    //public function testReadWithEmptyContent()
    //{
        //$forward = EmailForwardParser::read('');

        //$this->assertTrue($forward instanceof Email);
        //$this->assertEquals($forward->getBody(), '');
        //$this->assertEquals($forward->getSubject(), null);
        //$this->assertEquals($forward->getTo(), array());
    //}

    //public function testParseForward()
    //{
        //$body = $this->getFixtures('email_1.txt');
        //$forward = EmailForwardParser::read($body);

        //$date = $forward->getDate();
        //$from = $forward->getFrom();
        //$to = $forward->getTo();

        //$this->assertEquals($from['email'], 'jeremy@test.com');
        //$this->assertEquals($from['name'], 'Jeremy Marc');
        //$this->assertEquals($to['email'], 'jeremy@test.com');
        //$this->assertEquals($to['name'], 'Jeremy Marc');
        //$this->assertEquals($forward->getSubject(), 'Test');
        //$this->assertEquals($date->format('Y-m-d'), '2013-03-22');
    //}

    //public function testParseForwardWithoutName()
    //{
        //$body = $this->getFixtures('email_2.txt');
        //$forward = EmailForwardParser::read($body);

        //$from = $forward->getFrom();
        //$to = $forward->getTo();
        //$this->assertEquals($from['email'], 'jeremy@test.com');
        //$this->assertEquals($from['name'], '');
        //$this->assertEquals($to['email'], 'jeremy@test.com');
        //$this->assertEquals($to['name'], '');
    //}

    public function testBodyShouldNotContainsHeaders()
    {
        $body = $this->getFixtures('email_3.txt');
        $forward = EmailForwardParser::read($body);

        $from = $forward->getFrom();
        $to = $forward->getTo();
        $cc = $forward->getCc();
        $body = $forward->getBody();

        $this->assertEquals($from['email'], 'jeremy@from.com');
        $this->assertEquals($from['name'], '');
        $this->assertEquals($to['email'], 'test@to.com');
        $this->assertEquals($to['name'], '');
        $this->assertEquals($cc['email'], 'test@cc.com');
        $this->assertEquals($cc['name'], '');

        $this->assertEquals($body, "I just got invited yesterday and tried to login this morning and says my account is locked?\n\nTried changing my password and that didn't do anything for me. Not sure what is going on.\n\nThanks,\nJeremy\n\n--\nSent with Sparrow");
    }
}
