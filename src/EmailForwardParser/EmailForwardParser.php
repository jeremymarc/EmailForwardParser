<?php

namespace EmailForwardParser;

class EmailForwardParser
{
    const DATE_REGEX = '/^Date:\s+(.*?)$/';
    const SUBJECT_REGEX = '/^Subject:\s+(.*?)$/';

    const FROM_REGEX = '/^From:\s+["\']?(.*?)["\']?\s*(?:\[mailto:|<)(.*?)(?:[\]>])$/';
    const TO_REGEX = '/^To:\s+["\']?(.*?)["\']?\s*(?:\[mailto:|<)(.*?)(?:[\]>])$/';

    const REPLY_REGEX = '/^(>+)/s';

    public static function read($text)
    {
        $to = $from = array();
        $date = $body = $subject = "";

        $lines = explode("\n", $text);
        foreach($lines as $line) {
            if (preg_match(self::REPLY_REGEX, $line)) {
                $line = preg_replace(self::REPLY_REGEX, '', $line);
                $line = trim($line);

                if (0 === stripos($line, 'from:')) {
                    preg_match(self::FROM_REGEX, $line, $matches);
                    if (count($matches) > 2) {
                        $from = array(
                            'name' => $matches[1],
                            'email' => $matches[2],
                        );
                        continue;
                    }
                }

                if (0 === stripos($line, 'to:')) {
                    preg_match(self::TO_REGEX, $line, $matches);
                    if (count($matches) > 2) {
                        $to = array(
                            'name' => $matches[1],
                            'email' => $matches[2],
                        );
                        continue;
                    }
                }

                if (0 === stripos($line, 'subject:')) {
                    preg_match(self::SUBJECT_REGEX, $line, $matches);
                    if (count($matches) > 1) {
                        $subject = $matches[1];
                        continue;
                    }
                }

                if (0 === stripos($line, 'date:')) {
                    preg_match(self::DATE_REGEX, $line, $matches);
                    if (count($matches) > 1) {
                        $date = new \DateTime();
                        $date->setTimestamp(strtotime($matches[1]));
                        continue;
                    }
                }

                $body .= $line . "\n";
            }
        }

        return array(
            'from'    => $from,
            'to'      => $to,
            'subject' => $subject,
            'date'    => $date,
            'body'    => $body,
        );
    }
}
