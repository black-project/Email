<?php

namespace spec\Email;

use Email\EmailAddress;
use PhpSpec\ObjectBehavior;

class EmailAddressSpec extends ObjectBehavior
{
    public function it_is_initializable()
    {
        $this->shouldHaveType('Email\EmailAddress');
    }

    public function let()
    {
        $this->beConstructedWith("recipient@domain.tld");
    }

    public function it_should_throw_an_exception()
    {
        $this
            ->shouldThrow('Email\Exception\InvalidEmailAddressException')
            ->during('__construct', ['foo@bar']);
    }

    public function it_should_have_a_to_string()
    {
        $this->__toString()->shouldReturn("recipient@domain.tld");
    }

    public function if_should_have_an_email()
    {
        $this->getValue()->shouldReturn("recipient@domain.tld");
    }

    public function it_should_have_an_recipient()
    {
        $this->getRecipient()->shouldReturn("recipient");
    }

    public function it_should_have_a_domain()
    {
        $this->getDomain()->shouldReturn("domain");
    }

    public function it_should_have_a_tld()
    {
        $this->getTld()->shouldReturn("tld");
    }

    public function it_should_return_an_email_as_array()
    {
        $this->getValueAsArray()->shouldBeArray();
        $this->getValueAsArray()['domain']->shouldReturn("domain");
    }

    public function it_should_be_equal()
    {
        $email = new EmailAddress("recipient@domain.tld");
        $this->isEqualTo($email)->shouldReturn(true);
    }
}
