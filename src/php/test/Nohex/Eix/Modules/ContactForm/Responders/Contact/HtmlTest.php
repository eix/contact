<?php

namespace Nohex\Eix\Modules\ContactForm\Responders\Contact;

use Nohex\Eix\Modules\ContactForm\Responders\Contact\Html as ContactResponder;

class HtmlTest extends \PHPUnit_Framework_TestCase
{
    public function testConstructor()
    {
        $contactResponder = new ContactResponder;

        $this->assertTrue($contactResponder instanceof ContactResponder);
    }

}
