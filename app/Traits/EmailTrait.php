<?php
namespace App\Traits;

use Mail;

trait EmailTrait
{
    public function sendMail($data, $view){
        try {
            Mail::send($view, $data, function ($message) use ($data) {
                $message->from('info@aabove.com', 'AAbove');
                $message->subject($data['subject'] ?? '');
                $message->to($data['email']);
                $message->cc('info@aabove.com');
            });
            return true;
        } catch (Exception $e) {
            return false;
        }       
    }

    public function sendContactMail($data, $view){
        try {
            Mail::send($view, $data, function ($message) use ($data) {
                $message->from($data['email'], $data['name']);
                $message->to('info@smartysupply.com');
            });
            return true;
        } catch (Exception $e) {
            return false;
        }       
    }

    public function sendEnquiryMail($data, $view){
        try {
            Mail::send($view, $data, function ($message) use ($data) {
                $message->from($data['fromEmail'], 'Smarty Supply User');
                $message->to($data['email']);
            });
            return true;
        } catch (Exception $e) {
            return false;
        }
    }
}