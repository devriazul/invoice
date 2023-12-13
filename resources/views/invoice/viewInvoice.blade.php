@extends('master')

@section('content')

        <div class="btn-wrap-row">
            <a class="btn btn-primary" target="_blank" href='/invoices/generateInvoice/{{ $invoices->id }}'><i class="fas fa-eye"></i> View PDF</a>
           <a class="btn btn-primary" href="{{url('/invoices/sendInvoiceEmail/'.$invoices->id)}}"><i class="fas fa-paper-plane"></i>Send Email</a>
        </div>

      <div class="container mt-5 pt-3">
          <div class="row d-flex align-items-center justify-content-between">
              <div class="col-md-5">
                  <div class="logo-wrap">
                    {{-- <img class="img-fluid" width="150" src="{{asset('/images/logo-transparent.webp')}}" alt="logo" /> --}}
                    <h4 style="border-bottom: 1px dotted #252d6d"> Invoice To </h4>
                    <address>
                        <h3>Uk Management College</h3>
                        <small><i>College House, Stanley Street
Manchester, M11 1LE
United Kingdom</i>
                        </small>
                        <small><em>Phone: <a href="tel:+4401614780015"> +4401614780015</a></em></small>
                        <small><em>Email: <a href="mailto:+finance@ukmcglobal.com"> finance@ukmcglobal.com</a></em></small>
                    <address>
                  </div>
              </div>
              <div class="col-md-2">
                  <div class="invoice-number">
                    <h5>INVOICE NO.</h5>
                    <b>{{$invoices->invoice_no}}</b>
                  </div>
              </div>
          </div>
          <div class="row mt-5">
            <div class="col-md-4">
                <div class="client-info-box">
                      <h5>From</h5>
                      <address>
                          <b>{{$invoices->client}}</b>
                          <b>{{$invoices->email}}</b>
                          <p>{{$invoices->client_address}}</p>
                      </address>
                </div>
            </div>
            
            <div class="col-md-4">
                <div class="client-info-box">
                      <h5>Payment Details</h5>
                      <address>
                          <p>{{$invoices->payment_details}}</p>
                      </address>
                </div>
            </div>
          </div>
          <div class="row mt-3 mb-3">
              <div class="col-md-2">
                  <div class="invoice-info-date">
                      <h5>Invoice Date</h5>
                      <p>{{$invoices->invoice_date}}</p>
                  </div>
              </div>
              <div class="col-md-2">
                <div class="invoice-info-date">
                    <h5>Terms</h5>
                    <p>30 Days </p>
                </div>
              </div>
              <div class="col-md-2">
                <div class="invoice-info-date">
                    <h5>Due Date</h5>
                    <p>{{$invoices->due_date}}</p>
                </div>
              </div>
          </div>
          <div class="row">
              <div class="table table-responsive view-table">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th width="55%">Student Name</th>
                            <th width="10%">Commission</th>
                            <th width="10%">Installment</th>
                            <th width="20%" align="right">Total</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($invoicesProducts as $invoicesProduct)
                        <tr>
                            <td>
                                <p>{{$invoicesProduct['name']}}</p>
                            </td>

                            <td>
                                <p>{{$invoicesProduct['price']}}</p>
                            </td>

                            <td>
                                <p>{{$invoicesProduct['qty']}}</p>
                            </td>


                            <td>
                                <p>{{$invoicesProduct['total']}}</p>
                            </td>


                        </tr>
                        @endforeach
                    </tbody>
                  </table>

                  <hr />

                  <table class="table-borderless view-total-table">
                    <tr>
                        <td width="80%" colspan="3"></td>
                        <td width="15%" align="right"><b>Grand Total<b></td>
                        <td width="15%">
                            <p id="subTotal">{{$invoices->sub_total}}</p>
                        </td>
                    </tr>

                   {{--  <tr>
                        <td width="80%" colspan="3"></td>
                        <td align="right"><b>Discount</b></td>
                        <td>
                            <p id="subTotal">{{$invoices->discount}}</p>
                        </td>
                    </tr>

                    <tr>
                        <td width="80%" colspan="3"></td>
                        <td width="15%" align="right"><b>Grand Total</b></td>
                        <td>
                            <p id="subTotal">{{$invoices->grand_total}}</p>
                        </td>
                    </tr>
                     --}}
                </table>
              </div>
          </div>

      </div>

@endsection
