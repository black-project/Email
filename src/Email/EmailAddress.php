<?php

namespace Email;

use Email\Exception\InvalidEmailAddressException;

/**
 * Class EmailAddress
 */
class EmailAddress
{
    /**
     * @var
     */
    private $recipient;

    /**
     * @var
     */
    private $domain;

    /**
     * @var
     */
    private $tld;

    /**
     * EmailAddress constructor.
     * @param $email
     * @throws InvalidEmailAddressException
     */
    public function __construct($email)
    {
        if (false === filter_var($email, FILTER_VALIDATE_EMAIL)) {
            throw new InvalidEmailAddressException("{$email} is not a valid email address");
        }

        $this->explodeEmail($email);
    }

    /**
     * @return string
     */
    public function __toString() : string
    {
        return $this->getValue();
    }

    /**
     * @return string
     */
    public function getValue()
    {
        return "{$this->recipient}@{$this->domain}.{$this->tld}";
    }

    /**
     * @return mixed
     */
    public function getRecipient() : string
    {
        return $this->recipient;
    }

    /**
     * @return mixed
     */
    public function getDomain() : string
    {
        return $this->domain;
    }

    /**
     * @return mixed
     */
    public function getTld() : string
    {
        return $this->tld;
    }

    /**
     * @return array
     */
    public function getValueAsArray() : array
    {
        return [
            'recipient' => $this->getRecipient(),
            'domain'    => $this->getDomain(),
            'tld'       => $this->getTld()
        ];
    }

    public function isEqualTo(EmailAddress $email) : bool
    {
        return $this->getValue() === $email->getValue();
    }

    /**
     * @param $email
     * @return EmailAddress
     */
    private function explodeEmail($email)
    {
        list($recipient, $domain) = explode("@", $email);
        list($domain, $tld) = explode(".", $domain, 2);

        $this->recipient = $recipient;
        $this->domain    = $domain;
        $this->tld       = $tld;
    }
}
