<?php

/**
 * Provides means to respond to a contact request.
 */

namespace Eix\Modules\ContactForm\Responses\Contact;

use Eix\Core\Responses\Http\Html as HtmlResponse;

class Html extends HtmlResponse
{
    public function issue()
    {
        // Gather the email data.
        $senderName = $this->getRequest()->getParameter('name');
        $senderAddress = $this->getRequest()->getParameter('email');
        $message = $this->getRequest()->getParameter('message');
        // Assign the contact data to the response.
        $this->setData('contact', array(
            'name' => $senderName,
            'email' => $senderAddress,
            'message' => $message,
        ));
        // Send the email.
        $errors = $this->sendMessage($senderName, $senderAddress, $message);
        // Check the result.
        if (empty($errors)) {
            // The message has been sent.
            $this->setTemplateId('contact/sent');
        } else {
            // The message failed to be sent.
            $this->setTemplateId('contact/index');
            $this->addData('errors', $errors);
        }

        parent::issue();
    }

    /**
     * Sends the contact message.
     */
    private function sendMessage($senderName, $senderAddress, $message)
    {
        // Check that all data is present.
        $errors = array();
        if (empty($senderName)) {
            $errors[] = _('Your name is missing.');
        }
        if (empty($senderAddress)) {
            $errors[] = _('Your e-mail address is missing.');
        }
        if (empty($message)) {
            $errors[] = _('The message is empty.');
        }

        // No validation errors? Proceed with the sending.
        if (empty($errors)) {
            try {
                $messageData = PHP_EOL
                    . PHP_EOL
                    . '----------------------------'
                    . PHP_EOL . PHP_EOL
                    . 'User agent: ' . @$_SERVER['HTTP_USER_AGENT'] . PHP_EOL
                    . 'Origin URL: ' . @$_SERVER['REMOTE_ADDR'] . PHP_EOL
                    . 'Cookie: ' . @$_SERVER['HTTP_COOKIE'] . PHP_EOL
                    . 'Request: ' . serialize($_REQUEST)
                ;

                $settings = \Eix\Core\Application::getSettings();

                $mailMessage = new \Eix\Services\Net\Mail\Message;
                $mailMessage->setSender($senderAddress, $senderName);
                $mailMessage->setBody($message . $messageData);
                $mailMessage->addRecipient(
                    $settings->mail->sender->address,
                    $settings->mail->sender->name
                );
                $mailMessage->setSubject($settings->modules->contactForm->subject);

                $mailMessage->send();
            } catch (\Exception $exception) {
                $errors = array(
                    'source' => 'server',
                    'messages' => $exception->getMessage()
                );
            }
        } else {
            $errors = array(
                'source' => 'validation',
                'messages' => $errors,
            );
        }

        return $errors;
    }

}
