Email
=====

PHP 5.4+ library to make working with Email safer, easier, and fun!

[![SensioLabsInsight](https://insight.sensiolabs.com/projects/9bfe8343-0fd5-412b-a3f5-2b364d602c56/big.png)](https://insight.sensiolabs.com/projects/9bfe8343-0fd5-412b-a3f5-2b364d602c56)
[![Build Status](https://travis-ci.org/black-project/Email.png?branch=master)](https://travis-ci.org/black-project/Email)
[![Scrutinizer Quality Score](https://scrutinizer-ci.com/g/black-project/Email/badges/quality-score.png)](https://scrutinizer-ci.com/g/black-project/Email/)
[![Latest Stable Version](https://poser.pugx.org/black/email/v/stable.png)](https://packagist.org/packages/black/email)
[![Total Downloads](https://poser.pugx.org/black/email/downloads.png)](https://packagist.org/packages/black/email)

Installation
------------

The recommended way to install Email is through [Composer][1]:

```json
{
    "require": {
        "black/email": "@stable"
    }
}
```

__Protip:__ You should browse the [`black/email`][2] page to choose a stable version to use, avoid the `@stable` meta
constraint.

Usage
-----

Usage is simple. Just create a new EmailEmail, if your email is invalid an `Email\Exception\InvalidEmailEmailException`
will be thrown. Be aware of this, the validation is on the format, not on a A or MX record in a valid DNS.

```php
$email = new Email\EmailEmail("foo@bar.com");
$email->getValue(); // return foot@bar.com
$email->getValueAsArray() // return ['recipient' => "foo", 'domain' => "bar", 'tld' => "com"]
```

__List of available getters__

- `getValue()`
- `getValueAsArray()`
- `getRecipient()`
- `getDomain()`
- `getTld()`

__Check if two email are equals__

`isEqualTo(Email\EmailEmail $email)`: Check if two emails are equals

__WARNING__

`FILTER_VALIDATE_EMAIL` will not works with non-standard ASCII characters so an email like this
`me@domain.中国` will throw an InvalidEmailAddressException.

`FILTER_VALIDATE_EMAIL` don't know rules of providers. `0me@hotmail.com` is invalid for hotmail but valid for PHP.

License
-------

Email is released under the MIT License. See the bundled LICENSE file for details.

Contributing
------------

See [CONTRIBUTING][5] file.

Credits
-------

This README is heavily inspired by [Geocoder][3] library by the great [@willdurand][4]. This guy needs your [PR][6] for the
sake of the REST in PHP.

Alexandre "pocky" Balmes [alexandre@lablackroom.com][7]. Send me [Flattrs][8] if you love my work, [buy me gift][9] or hire me!


[1]: https://getcomposer.org/
[2]: https://packagist.org/packages/black/email
[3]: https://github.com/geocoder-php/Geocoder
[4]: https://github.com/willdurand
[5]: CONTRIBUTING.md
[6]: http://williamdurand.fr/2014/07/02/resting-with-symfony-sos/
[7]: mailto:alexandre@lablackroom.com
[8]: https://flattr.com/profile/alexandre.balmes
[9]: http://www.amazon.fr/registry/wishlist/3OR3EENRA5TSK
