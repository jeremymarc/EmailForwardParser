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
    $forward = EmailForwardParser::read($body);

    $fromName = $forward['from']['name'];
    $fromEmail = $forward['from']['email'];
    $toName = $forward['to']['name'];
    $toEmail = $forward['to']['email'];
    $date = $forward['date']; //DateTime
    $subject = $forward['subject'];
    $body = $forward['body'];
```
