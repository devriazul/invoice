<?php

namespace App\Mail;
use App\Invoice;
use App\InvoiceProduct;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class InvoiceEmail extends Mailable
{
    use Queueable, SerializesModels;

    public $invoices;
    public $invoicesProducts;

    public function __construct(Invoice $invoices, $invoicesProducts)
    {
        $this->invoices = $invoices;
        $this->invoicesProducts = $invoicesProducts;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {

       return $this->view('emails.invoiceEmail')
                        ->attach(public_path('pdf/'.$this->invoices->invoice_no.'.pdf'), [
                        'mime' => 'application/pdf'
                    ]);
    }
}
