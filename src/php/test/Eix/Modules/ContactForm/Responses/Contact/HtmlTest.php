<?php

namespace Eix\Modules\ContactForm\Responses\Contact;

use Eix\Modules\ContactForm\Responses\Contact\Html as ContactResponse;

class HtmlTest extends \PHPUnit_Framework_TestCase
{
    public function testConstructor()
    {
        $contactResponse = new ContactResponse;

        $this->assertTrue($contactResponse instanceof ContactResponse);
    }

}
