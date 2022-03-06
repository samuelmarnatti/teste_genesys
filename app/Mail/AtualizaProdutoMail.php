<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class AtualizaProdutoMail extends Mailable
{
    private $product;

    use Queueable, SerializesModels;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    // public function __construct()
    // {
    // }
    public function __construct(\stdClass $product)
    {
        $this->product = $product;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $this->subject('Produto ' . $this->product->name . 'Atualizado com sucesso');
        $this->from('sistema@testegenesys.com', 'sistema');
        $this->to('samuelmarnatti@gmail.com', 'Samuel Marnatti');
        return $this->view('mail.notificaAtualizaProduto', ['name' => $this->product->name]);
    }
}