<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>

    <style>
        @media screen, print {
            .logo-wrap address {
                color: #252d6d;
                line-height: 1.5;
            }
            .logo-wrap address small {
                display: block;
            }

            .invoice-number h5 {
                font-size: 18px;
                color: #d81d21;
                border-bottom: 1px dotted;
            }
            .invoice-number b {
                color: #252d6d;
                letter-spacing: 1px;
            }
            .client-info-box h5 {
                color: #262c6d;
                font-size: 18px;
                border-bottom: 1px dotted;
            }
            .client-info-box address b {
                font-size: 14px;
                color: #252d6d;
            }
            .client-info-box address p {
                font-size: 14px;
            }
            .invoice-info-date h5 {
                font-size: 16px;
                font-weight: 600;
                border-bottom: 1px dotted;
            }
            .view-table table thead {
                background-color: #252d6d;
                color: #fff;
                font-size: 14px;

            }

            .view-table table thead th {
                font-weight: 500;
                padding: 7px 0;
            }
            .view-table table tbody td {
                padding: 0;
            }
            .view-table table tbody td p {
                margin: 0;
            }
            .view-table table tbody td {
                padding: 7px 12px;
            }
            .view-table table tbody td p {
                margin: 0;
                font-size: 14px;
                font-weight: 400;
            }
            .view-table table tbody td:nth-child(2),
            .view-table table thead th:nth-child(2),
            .view-table table tbody td:nth-child(3),
            .view-table table thead th:nth-child(3)

            {
                text-align: center;
            }

            .view-table table tbody td:nth-child(4),
            .view-table table thead th:nth-child(4)

            {
                text-align: right;
            }
            table {
                width: 100%;
            }
            table.table-borderless.view-total-table td {
                color: #252d6d;
            }


            table.table-borderless.view-total-table td b,
            table.table-borderless.view-total-table td p {
                color: #252d6d;
                text-align: right;
            }


            table.table-borderless.view-total-table b,
            table.table-borderless.view-total-table p {
                font-weight: 600;
                color: #252d6d;
            }
            .footer-text-copyright p {
                font-size: 12px;
                margin: 0;
            }

            table.table-striped tr:nth-child(even){
                background-color: aliceblue;
            }

            .row{
                clear: both;
            }

            .logo-wrap{
                width: 45%;
                float: left;
            }
            .invoice-number{
                width: 20%;
                float: right;
                clear: both;
            }

            .client-info-box{
                width: 30%;
                clear: both;
            }

            .invoice-info-date{
                width: 30%;
                float: left;
                margin-right: 5%;
            }

            .invoice-info-date.payment-info{
                width: 30%;
            }

            .invoice-info-date h5{
                color: #252d6d
            }

            body{
                color: #252d6d;
            }

            .bill-to{
                width: 30%;
                float: left;
            }
            .payment-to{
                width: 30%;
                float: right;
                clear: both;
            }
            .client-info-box b{
                display: block;
            }
            

        }

</style>
</head>
<body>

      <div class="container">
          <div class="row">
              <div class="col-md-4 float-left">
                  <div class="logo-wrap">
                    {{-- <img class="img-fluid" width="150" src="{{asset('/images/logo-transparent.png')}}" alt="logo" /> --}}
                    <h4 style="border-bottom: 1px dotted #252d6d; margin-bottom: 0px;"> Invoice To </h4>
                    <address>
                        <h3>Uk Management College</h3>
                        <small><i>College House, Stanley Street
Manchester, M11 1LE
United Kingdom.</i>
                        </small>
                        <small><em>Phone: <a href="tel:+4401614780015"> +4401614780015</a></em></small>
                        <small><em>Email: <a href="mailto:+finance@ukmcglobal.com"> finance@ukmcglobal.com</a></em></small>
                    <address>
                  </div>
              </div>
              <div class="col-md-2">
                  <div class="invoice-number">
                    <h5 style="margin-bottom: 10px">INVOICE NO.</h5>
                    <b>{{$invoices->invoice_no}}</b>
                  </div>
              </div>
          </div>
          <div class="row mt-5">
            <div class="col-md-12">
                <div class="col-md-4">
                    <div class="client-info-box bill-to">
                          <h5 style="margin-bottom: 10px">From</h5>
                          <address>
                              <b>{{$invoices->client}}</b>
                              <b>{{$invoices->email}}</b>
                              <p>{{$invoices->client_address}}</p>
                          </address>
                    </div>
                </div>
                
                <div class="col-md-4">
                    <div class="client-info-box payment-to">
                          <h5 style="margin-bottom: 5px">Payment Details</h5>
                          <address>
                              <p>{{$invoices->payment_details}}</p>
                          </address>
                    </div>
                </div>
                <div class="col-md-4"></div>
            </div>
          </div>
          <div class="row mt-3 mb-3">
              <div class="col-md-2">
                  <div class="invoice-info-date">
                      <h5 style="margin-bottom: 10px">Invoice Date</h5>
                      <p>{{$invoices->invoice_date}}</p>
                  </div>
              </div>
              <div class="col-md-2">
                <div class="invoice-info-date">
                    <h5 style="margin-bottom: 10px">Terms</h5>
                    <p>30 Days </p>
                </div>
              </div>
              <div class="col-md-2">
                <div class="invoice-info-date">
                    <h5 style="margin-bottom: 10px">Due Date</h5>
                    <p>{{$invoices->due_date}}</p>
                </div>
              </div>
          </div>
          <div class="row">
              <div class="table table-responsive view-table" style="margin-top: 15px">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th width="55%" align="left" style="padding-left: 12px">Student Name</th>
                            <th width="10%">Commission</th>
                            <th width="10%">Installment</th>
                            <th width="20%" align="right" style="padding-right: 12px">Total</th>
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

                  <p style="border: 1px dotted aliceblue; width: 100%;" ><p>

                  <table class="table-borderless view-total-table">
                    <tr>
                        <td width="80%" colspan="3"></td>
                        <td width="20%" align="right"><b>Grand Total<b></td>
                        <td width="15%" align="right">
                            <p id="subTotal">{{$invoices->sub_total}}</p>
                        </td>
                    </tr>

                    {{-- <tr>
                        <td width="80%" colspan="3"></td>
                        <td align="right"><b>Discount</b></td>
                        <td>
                            <p id="subTotal">{{$invoices->discount}}</p>
                        </td>
                    </tr>

                    <tr>
                        <td width="80%" colspan="3"></td>
                        <td width="20%" align="right"><b>Grand Total</b></td>
                        <td>
                            <p id="subTotal">{{$invoices->grand_total}}</p>
                        </td>
                    </tr>
                     --}}
                </table>
              </div>
          </div>


      </div>

</body>
</html>
