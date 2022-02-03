<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class PQRSAntendidoCerrado extends Mailable
{
    use Queueable, SerializesModels;

    public $respuesta, $estado, $documento;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($respuesta, $estado, $documento)
    {
        $this->respuesta = $respuesta;
        $this->estado = $estado;
        $this->documento = $documento;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('emails.pqrs-antendido-cerrado')->subject('PQRS Actualizado');
    }
}
