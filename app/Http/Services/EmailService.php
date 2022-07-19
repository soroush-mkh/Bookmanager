<?php

namespace App\Http\Services;

use Illuminate\Support\Facades\Mail;


class EmailService
{

    private $details;
    private $subject;
    private $from = [
        [ 'address' => NULL , 'name' => NULL , ],
    ];
    private $to;

    public function fire ()
    {

        Mail::to($this->to)->send(new MailViewProvider($this->details , $this->subject , $this->from));
        return TRUE;

    }

    public function getDetails ()
    {
        return $this->details;
    }

    public function setDetails ( $details )
    {
        $this->details = $details;
    }


    public function getSubject ()
    {
        return $this->subject;
    }

    public function setSubject ( $subject )
    {
        $this->subject = $subject;
    }


    public function getFrom ()
    {
        return $this->from;
    }

    public function setFrom ( $address , $name )
    {
        $this->from = [
            [
                'address' => $address ,
                'name'    => $name ,
            ],
        ];
    }

    public function getTo ()
    {
        return $this->to;
    }

    public function setTo ( $to )
    {
        $this->to = $to;
    }


}
