<?php

namespace spec\Email;

use Email\EmailAddress;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class EmailAddressSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType('Email\EmailAddress');
    }

    function let()
    {
        $this->beConstructedWith("recipient@domain.tld");
    }

    function it_should_throw_an_exception()
    {
        $this
            ->shouldThrow('Email\Exception\InvalidEmailAddressException')
            ->during('__construct', ['foo@bar']);
    }

    function it_should_have_a_to_string()
    {
        $this->__toString()->shouldReturn("recipient@domain.tld");
    }

    function if_should_have_an_email()
    {
        $this->getValue()->shouldReturn("recipient@domain.tld");
    }

    function it_should_have_an_recipient()
    {
        $this->getRecipient()->shouldReturn("recipient");
    }

    function it_should_have_a_domain()
    {
        $this->getDomain()->shouldReturn("domain");
    }

    function it_should_have_a_tld()
    {
        $this->getTld()->shouldReturn("tld");
    }

    function it_should_return_an_email_as_array()
    {
        $this->getValueAsArray()->shouldBeArray();
        $this->getValueAsArray()['domain']->shouldReturn("domain");
    }

    function it_should_be_equal()
    {
        $email = new EmailAddress("recipient@domain.tld");
        $this->isEqualTo($email)->shouldReturn(true);
    }
}
