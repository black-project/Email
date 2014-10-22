<?php
/*
 * This file is part of the Email package.
 *
 * (c) Alexandre Balmes <alexandre@lablackroom.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
namespace Email;

use Email\Exception\InvalidEmailAddressException;

/**
 * Class EmailAddress
 *
 * @author Alexandre Balmes <alexandre@lablackroom.com>
 * @license http://opensource.org/licenses/mit-license.php MIT
 */
final class EmailAddress
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
     * @param $email
     * @throws InvalidEmailAddressException
     */
    public function __construct($email)
    {
        if (false === filter_var($email, FILTER_VALIDATE_EMAIL)) {
            throw new InvalidEmailAddressException(sprintf("%s is not a valid email address", $email));
        }

        $this->explodeEmail($email);
    }

    /**
     * @return string
     */
    public function __toString()
    {
        return sprintf("%s@%s.%s", $this->recipient, $this->domain, $this->tld);
    }

    /**
     * @return string
     */
    public function getValue()
    {
        return sprintf("%s@%s.%s", $this->recipient, $this->domain, $this->tld);
    }

    /**
     * @return mixed
     */
    public function getRecipient()
    {
        return $this->recipient;
    }

    /**
     * @return mixed
     */
    public function getDomain()
    {
        return $this->domain;
    }

    /**
     * @return mixed
     */
    public function getTld()
    {
        return $this->tld;
    }

    /**
     * @return array
     */
    public function getValueAsArray()
    {
        return [
            'recipient' => $this->getRecipient(),
            'domain'    => $this->getDomain(),
            'tld'       => $this->getTld()
        ];
    }

    public function isEqualTo(EmailAddress $email)
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
