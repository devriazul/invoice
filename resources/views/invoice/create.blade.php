@extends('master')


@section('content')

@include('header.header')

<div id="invoice">


    <div class="container">


    <form method="POST" action={{route('invoices.store')}}>
        @csrf

    <div class="card custom-card">

        <div class="card-header">
            <h4 class="float-left">Create Your Invoice</h4>
        </div>
        <div class="card-body">
            <div class="row">

                <div class="col-md-4">
                    <div class="form-group form-custom">

                        <div class="w-100 mb-4">
                            <label>Invoice No.</label>
                            {{-- <b class="inovoice-no-style" id="invoice_no"></b> --}}
                            <input type="text" name="invoice_no" class="form-control"/>
                            @error('invoice_no')
                            <small class="text-danger custom-error">{{ $message }}</small>
                            @enderror
                        </div>

                        <label class="pt-2">Client Name</label>
                        <input type="text" name="client" class="form-control" />
                        @error('client')
                            <small class="text-danger custom-error">{{ $message }}</small>
                        @enderror
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group form-custom">
                        <label>Client Address</label>
                        <textarea rows='4' type="text" name="client_address" class="form-control" ></textarea>
                        @error('client_address')
                            <small class="text-danger custom-error">{{ $message }}</small>
                        @enderror
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group form-custom">
                        <label>Email</label>
                        <input type="email" name="email" class="form-control"  />
                        @error('email')
                            <small class="text-danger custom-error">{{ $message }}</small>
                        @enderror
                        <div class="row">
                            <div class="col-sm-6">
                                <label class="pt-2">Invoice Date</label>
                                <input type="date" name="invoice_date" class="form-control"  />
                                @error('invoice_date')
                                    <small class="text-danger custom-error">{{ $message }}</small>
                                @enderror
                            </div>
                            <div class="col-sm-6">
                                <label class="pt-2">Due Date</label>
                                <input type="date" name="due_date" class="form-control" />
                                @error('due_date')
                                    <small class="text-danger custom-error">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group form-custom">
                        <label>Payment Details</label>
                        <textarea rows='4' type="text" name="payment_details" class="form-control" ></textarea>
                        @error('payment_details')
                            <small class="text-danger custom-error">{{ $message }}</small>
                        @enderror
                    </div>
                </div>
            </div>
        </div>

        <table class="table table-bordered table-form" id="myTable">
            <thead>
                <tr>
                    <th width="5%">
                        <button class="btn btn-primary" type="button" id="addRow"> <i class="fas fa-plus-circle"></i> </button>
                    </th>
                    <th width="55%">Student Name</th>
                    <th width="10%">Commission</th>
                    <th width="10%">Installment</th>
                    <th width="20%">Total</th>
                </tr>
            </thead>
            <tbody>
                <tr class="productrows">
                    <td>
                        <button class="btn btn-danger" type="button" onclick='alert("You Can Not Delete This First Item Try another")'>
                            <i class="fas fa-minus-circle" name="btnName"></i>
                        </button>
                    </td>

                    <td>
                        <input type="text" name="name[]" class="form-control" placeholder="Student Name" />
                        @error('title')
                            <small class="text-danger custom-error">{{ $message }}</small>
                        @enderror
                    </td>

                    <td>
                        <input type="number" value="0" name="price[]" onkeyup="handleTotal()" class="form-control price numberInputs" placeholder="Price" />
                        @error('price')
                            <small class="text-danger custom-error">{{ $message }}</small>
                        @enderror
                    </td>

                    <td>
                        <input type="number" name="qty[]" onkeyup="handleTotal()" value="1" class="form-control qty numberInputs" placeholder="Qty" />
                    </td>
                    @error('qty')
                        <small class="text-danger custom-error">{{ $message }}</small>
                    @enderror
                    <td>
                        <b class="totalprice">0</b>
                    </td>
                </tr>


            </tbody>
        </table>

        <table class="total-table">
            <tr>

                <td width="80.5%" align="right">Grand Total</td>
                <td >
                    <b id="subTotal">0</b>
                </td>
            </tr>

            {{-- <tr>
                <td width="77.7%" align="right">Discount</td>
                <td>
                    <input type="number" id="discount" name="discount" class="form-control numberInputs" value="0" />
                    @error('discount')
                        <small class="text-danger custom-error">{{ $message }}</small>
                    @enderror
                </td>
            </tr>

            <tr>
                <td width="77.7%" align="right">Grand Total</td>
                <td>
                    <b id="grandTotal">0</b>
                </td>
            </tr>
             --}}
        </table>

        <div class="card-header" style="margin-top: 15px">
            <button class="btn btn-success create-btn" type="submit">CREATE INVOICE</button>
        </div>
    </div>

    </form>
</div>

</div>

@endsection

@push('scripts')

<script type="text/javascript" src="{{asset('/js/app.js')}}"></script>
@endpush
