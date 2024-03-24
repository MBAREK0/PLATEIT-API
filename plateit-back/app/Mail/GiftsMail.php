<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class GiftsMail extends Mailable
{
    use Queueable, SerializesModels;
    public $data ;
    public function __construct($data){
        $this->data = $data;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $imagePath = public_path('images/medium_plate_vip.jpg');

        return $this->view('mail.Gift')
            ->subject('Email with Embedded Image')
            ->attach($imagePath, [
                'as' => 'embedded_image.jpg',
                'mime' => 'image/jpeg',
            ])->with('data', $this->data);
    }
}
