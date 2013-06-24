EmailForwardParser
=================
[![Build Status](https://www.travis-ci.org/jeremymarc/EmailForwardParser.png?branch=master)](https://www.travis-ci.org/jeremymarc/EmailForwardParser)

This is a small PHP library to parse forwarded email content, 
inspired by [EmailReplyParser](https://github.com/willdurand/EmailReplyParser/).

Installation
------------
If you don't use a _ClassLoader_ in your application, just require the provided
autoloader:

``` php
<?php

require_once 'src/autoload.php';
```

Usage
-----
Simply call the read method with the email content like this: 

```php
<?php
    $email = EmailForwardParser::read($body);
    $from = $email->getFrom();
    $to = $email->getTo();

    $fromName = $from['name'];
    $fromEmail = $from['email'];
    $toName = $to['name'];
    $toEmail = $to['email'];
    $date = $email->getDate(); //DateTime
    $subject = $email->getSubject();
    $body = $email->getBody();
```
