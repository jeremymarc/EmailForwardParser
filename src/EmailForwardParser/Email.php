<?php

namespace EmailForwardParser;

class Email
{
    private $from;
    private $to;
    private $cc;
    private $subject;
    private $date;
    private $body;

    public function __construct()
    {
        $this->from = array();
        $this->to = array();
        $this->cc = array();
    }
    
    /**
     * Get from.
     *
     * @return from.
     */
    public function getFrom()
    {
        return $this->from;
    }
    
    /**
     * Set from.
     *
     * @param from the value to set.
     */
    public function setFrom($from)
    {
        $this->from = $from;

        return $this;
    }
    
    /**
     * Get to.
     *
     * @return to.
     */
    public function getTo()
    {
        return $this->to;
    }
    
    /**
     * Set to.
     *
     * @param to the value to set.
     */
    public function setTo($to)
    {
        $this->to = $to;

        return $this;
    }

    /**
     * Get cc.
     *
     * @return cc.
     */
    public function getCc()
    {
        return $this->cc;
    }
    
    /**
     * Set cc.
     *
     * @param cc the value to set.
     */
    public function setCc($cc)
    {
        $this->cc = $cc;

        return $this;
    }
    
    /**
     * Get subject.
     *
     * @return subject.
     */
    public function getSubject()
    {
        return $this->subject;
    }
    
    /**
     * Set subject.
     *
     * @param subject the value to set.
     */
    public function setSubject($subject)
    {
        $this->subject = $subject;

        return $this;
    }
    
    /**
     * Get date.
     *
     * @return date.
     */
    public function getDate()
    {
        return $this->date;
    }
    
    /**
     * Set date.
     *
     * @param date the value to set.
     */
    public function setDate($date)
    {
        $this->date = $date;

        return $this;
    }
    
    /**
     * Get body.
     *
     * @return body.
     */
    public function getBody()
    {
        return $this->body;
    }
    
    /**
     * Set body.
     *
     * @param body the value to set.
     */
    public function setBody($body)
    {
        $this->body = $body;

        return $this;
    }
}
