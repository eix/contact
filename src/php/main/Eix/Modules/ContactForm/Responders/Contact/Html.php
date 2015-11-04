<?php

/**
 * Responder for the contact page.
 */

namespace Eix\Modules\ContactForm\Responders\Contact;

class Html extends \Eix\Core\Responders\Http
{
    protected function httpGetForAll()
    {
        return $this->httpGetForHtml();
    }

    /**
     * GET /contact
     * @return \Eix\Core\Responses\Http\Html
     */
    protected function httpGetForHtml()
    {
        $response = new \Eix\Core\Responses\Http\Html($this->getRequest());
        $response->setTemplateId('contact/index');

        return $response;
    }

    /**
     * POST /contact
     * @return \Eix\Core\Responses\Http\Html
     */
    protected function httpPostForHtml()
    {
        $response = new \Eix\Modules\ContactForm\Responses\Contact\Html($this->getRequest());

        return $response;
    }

}
