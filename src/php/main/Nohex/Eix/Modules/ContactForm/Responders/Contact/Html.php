<?php

/**
 * Responder for the contact page.
 */

namespace Nohex\Eix\Modules\ContactForm\Responders\Contact;

class Html extends \Nohex\Eix\Core\Responders\Http
{
    protected function httpGetForAll()
    {
        return $this->httpGetForHtml();
    }

    /**
     * GET /contact
     * @return \Nohex\Eix\Core\Responses\Http\Html
     */
    protected function httpGetForHtml()
    {
        $response = new \Nohex\Eix\Core\Responses\Http\Html($this->getRequest());
        $response->setTemplateId('contact/index');

        return $response;
    }

    /**
     * POST /contact
     * @return \Nohex\Eix\Core\Responses\Http\Html
     */
    protected function httpPostForHtml()
    {
        $response = new \Nohex\Eix\Modules\ContactForm\Responses\Contact\Html($this->getRequest());

        return $response;
    }

}
