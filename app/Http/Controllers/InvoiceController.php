<?php

namespace App\Http\Controllers;

use App\Invoice;
use App\InvoiceProduct;
use App\Mail\InvoiceEmail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use PDF;
use notify;
use Illuminate\Support\Facades\Redirect;


class invoiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $invoices = Invoice::orderBy('created_at', 'desc')
        ->paginate(8);

        return view('invoice.index', compact('invoices'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return view('invoice.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $this->validate($request, [
            'invoice_no' => 'required|unique:invoices',
            'client' => 'required|max:255',
            'client_address' => 'required|max:255',
            'payment_details' => 'required|max:255',
            'invoice_date' => 'required',
            'due_date' => 'required',
            'email' => 'required|email',
            'name' => 'required|max:255',
            // 'discount' => 'required|numeric|min:0',
            'price' => 'required',
            'qty' => 'required'
        ]);

        $data = $request->all();



        $sub_total = 0;

        if(count($data['name']) > 0) {
            foreach ($data['name'] as $item => $value) {
                $total =  $data['price'][$item] * $data['qty'][$item];
                $sub_total +=  $total;
            }

        }

        $data['sub_total'] = $sub_total;

        // $data['grand_total'] = $sub_total - $data['discount'];

        $lastId = Invoice::create($data)->id;

        if(count($data['name']) > 0) {
            foreach ($data['name'] as $item => $value) {
                $total =  $data['price'][$item] * $data['qty'][$item];
                $data2 = array(
                    'invoice_id'=> $lastId,
                    'name'=> $data['name'][$item],
                    'price'=> $data['price'][$item],
                    'qty'=> $data['qty'][$item],
                    'total'=> $total
                );

                InvoiceProduct::insert($data2);
            }
    }

        $invoices = invoice::where('id', $lastId)->firstOrFail();
        $invoicesProducts = InvoiceProduct::where('invoice_id', $lastId)->get();

        $pdf = PDF::loadView('invoice.pdf', compact('invoices', 'invoicesProducts'));
        $path = public_path('pdf/');
        $fileName =  $invoices['invoice_no'] . '.' . 'pdf' ;
        $pdf->save($path . '/' . $fileName);


        smilify('success', 'Invoice Created Successfully !! Now Click to Send an Email');
        return Redirect::route('invoices.viewInvoice', $lastId);

    }

    public function viewInvoice($id)
    {
        $invoices = invoice::where('id', $id)->firstOrFail();
        $invoicesProducts = InvoiceProduct::where('invoice_id', $id)->get();
        return view('invoice.viewInvoice', compact('invoices', 'invoicesProducts'));

    }

    //Generate PDF

    public function generateInvoice($id)
    {
        $invoices = invoice::where('id', $id)->firstOrFail();
        $invoicesProducts = InvoiceProduct::where('invoice_id', $id)->get();

        $pdf = PDF::loadView('invoice.pdf', compact('invoices', 'invoicesProducts'));
        /* $path = public_path('pdf/');
        $fileName =  $invoices['invoice_no'] . '.' . 'pdf' ;
        $pdf->save($path . '/' . $fileName); */
        return $pdf->stream('invoice.pdf');

        // return $pdf->stream('invoice.pdf');
        // return $pdf->download('invoice.pdf');
    }


    public function sendInvoiceEmail($invoiceId){
        $invoices = invoice::where('id', $invoiceId)->firstOrFail();
        $invoicesProducts = InvoiceProduct::where('invoice_id', $invoiceId)->get();

        $pdf = PDF::loadView('invoice.pdf', compact('invoices', 'invoicesProducts'));
        $path = public_path('pdf/');
        $fileName =  $invoices['invoice_no'] . '.' . 'pdf' ;
        $pdf->save($path . '/' . $fileName);

        $email = new InvoiceEmail($invoices, $invoicesProducts);
        $recipient = 'finance@ukmcglobal.com';
        $ccRecipient = 'zahid@@ukmcglobal.com';

        Mail::to($recipient)
            ->cc($ccRecipient)
            ->send($email);

        emotify('success', 'Your Email Send successfully to UKMC. Great Job :) !');
        return Redirect::route('invoices.create');
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
