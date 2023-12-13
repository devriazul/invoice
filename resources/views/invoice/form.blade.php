@extends('master')


@section('content')

<div id="invoice">
    {{-- @if(Session::has(success))
        <div class="alert alert-success">
            {{Session::get('success')}}
        </div>
    @endif --}}
    <div class="card">
        <div class="card-header">
            <h4 class="float-left">Create Invoices</h4>
            <a href="{{route('invoices.index')}}" class="btn btn-success float-right">Back</a>
        </div>
            <div class="card-body">
                <form action="{{ route('invoices.store') }}" method="POST">
                    {{csrf_field()}}
                    <div class="row">
                        <div class="col-sm-4">
                            <div class="form-group">
                                <label>Invoice No.</label>
                                <input type="text" class="form-control" name="invoice_no">
                            </div>
                            <div class="form-group">
                                <label>Client</label>
                                <input type="text" class="form-control" name="client">
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group">
                                <label>Client Address</label>
                                <textarea class="form-control" name="client_address"></textarea>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group">
                                <label>Title</label>
                                <input type="text" class="form-control" name="title">
                            </div>
                            <div class="row">
                                <div class="col-sm-6">
                                    <label>Invoice Date</label>
                                    <input type="date" class="form-control" name="invoice_date">
                                </div>
                                <div class="col-sm-6">
                                    <label>Due Date</label>
                                    <input type="date" class="form-control" name="due_date">
                                </div>
                            </div>
                        </div>
                    </div>
                    <hr>
                    <table class="table table-bordered table-form">
                        <thead>
                            <tr>
                                <th>Product Name</th>
                                <th>Price</th>
                                <th>Qty</th>
                                <th>Total</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td class="table-name">
                                    <textarea class="form-control" name="name[]"></textarea>
                                    <textarea class="form-control" name="name[]"></textarea>
                                </td>
                                <td class="table-price">
                                    <input type="text" class="form-control" name="price[]">
                                    <input type="text" class="form-control" name="price[]">
                                </td>
                                <td class="table-qty">
                                    <input type="text" class="form-control" name="qty[]">
                                    <input type="text" class="form-control" name="qty[]">
                                </td>
                                <td class="table-total">
                                    <span class="table-text">
                                        <input type="hidden" value="500" name="total[]">
                                        <input type="hidden" value="800" name="total[]">
                                        500
                                        <br>
                                        800
                                    </span>
                                </td>
                                <td class="table-remove">
                                    <span @click="remove(product)" class="table-remove-btn">&times;</span>
                                </td>
                            </tr>
                        </tbody>
                        <tfoot>
                            <tr>
                                <td class="table-empty" colspan="2">
                                    <span @click="addLine" class="table-add_line">Add Line</span>
                                </td>
                                <td class="table-label">Sub Total</td>
                                <td class="table-amount">
                                    <input type="hidden" value="400" name="sub_total">
                                    400</td>
                            </tr>
                            <tr>
                                <td class="table-empty" colspan="2"></td>
                                <td class="table-label">Discount</td>
                                <td class="table-discount">
                                    <input type="text" class="form-control" name="discount" value="100">
                                </td>
                            </tr>
                            <tr>
                                <td class="table-empty" colspan="2"></td>
                                <td class="table-label">Grand Total</td>
                                <td class="table-amount">
                                    <input type="hidden" value="500" name="grand_total">
                                500</td>
                            </tr>
                        </tfoot>
                    </table>
                </div>

                <div class="card-footer">
                    <a href="{{route('invoices.index')}}" class="btn btn-primary">Back</a>
                    <button class="btn btn-success" type="submit">CREATE</button>
                </div>
            </form>
    </div>
</div>

@endsection

@push('scripts')

@endpush
