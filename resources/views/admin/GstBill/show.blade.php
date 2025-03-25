@extends('admin.layouts.app')
@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>View Bills Details</h1>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <!-- left column -->
                    <div class="col-md-12">

                        <!-- /.card -->
                        <!-- Horizontal Form -->
                        <div class="card card-info">
                            <div class="card-header">
                                <h3 class="card-title">Bills</h3>
                            </div>
                            <!-- /.card-header -->
                            <!-- form start -->
                            <form class="form-horizontal" id="formsubmit">

                                <div class="card-body">
                                    <div class="form-group row">
                                        <label for="inputEmail3" class="col-sm-2 col-form-label" class="form-label">Parties
                                            Type Name</label>
                                        <div class="col-sm-10">
                                            <h5> : {{ $show->parties_type->parties_name }}</h5>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="inputEmail3" class="col-sm-2 col-form-label">Invoice Date</label>
                                        <div class="col-sm-10">
                                            <h5> : {{ $show->invoice_date }}</h5>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="inputEmail3" class="col-sm-2 col-form-label">Invoice No</label>
                                        <div class="col-sm-10">
                                            <h5> : {{ $show->invoice_no }}</h5>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="inputEmail3" class="col-sm-2 col-form-label">Item Descripation</label>
                                        <div class="col-sm-10">
                                            <h5> : {{ $show->item_desc }}</h5>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="inputEmail3" class="col-sm-2 col-form-label">Total Amount </label>
                                        <div class="col-sm-10">
                                            <h5> : {{ $show->total_amount }}</h5>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="inputEmail3" class="col-sm-2 col-form-label">CGST Rate</label>
                                        <div class="col-sm-10">
                                            <h5> : {{ $show->cgst_rate }}</h5>
                                        </div>
                                    </div>


                                    <div class="form-group row">
                                        <label for="inputEmail3" class="col-sm-2 col-form-label">SGST Rate</label>
                                        <div class="col-sm-10">
                                            <h5> : {{ $show->sgst_rate }}</h5>
                                        </div>
                                    </div>


                                    <div class="form-group row">
                                        <label for="inputEmail3" class="col-sm-2 col-form-label">IGST Rate</label>
                                        <div class="col-sm-10">
                                            <h5> : {{ $show->igst_rate }}</h5>
                                        </div>
                                    </div>



                                    <div class="form-group row">
                                        <label for="inputEmail3" class="col-sm-2 col-form-label">CGST Amount</label>
                                        <div class="col-sm-10">
                                            <h5> : {{ $show->cgst_amount }}</h5>
                                        </div>
                                    </div>



                                    <div class="form-group row">
                                        <label for="inputEmail3" class="col-sm-2 col-form-label">SGST Amount</label>
                                        <div class="col-sm-10">
                                            <h5> : {{ $show->sgst_amount }}</h5>
                                        </div>
                                    </div>


                                    <div class="form-group row">
                                        <label for="inputEmail3" class="col-sm-2 col-form-label">IGST Amount</label>
                                        <div class="col-sm-10">
                                            <h5> : {{ $show->igst_amount }}</h5>
                                        </div>
                                    </div>


                                    <div class="form-group row">
                                        <label for="inputEmail3" class="col-sm-2 col-form-label">Tax Amount</label>
                                        <div class="col-sm-10">
                                            <h5> : {{ $show->tax_amount }}</h5>
                                        </div>
                                    </div>


                                    <div class="form-group row">
                                        <label for="inputEmail3" class="col-sm-2 col-form-label">Net Amount</label>
                                        <div class="col-sm-10">
                                            <h5> : {{ $show->net_amount }}</h5>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="inputEmail3" class="col-sm-2 col-form-label">Declaration</label>
                                        <div class="col-sm-10">
                                            <h5> : {{ $show->declaration }}</h5>
                                        </div>
                                    </div>

                                    <!-- /.card-body -->
                                    <div class="card-footer">
                                       
                                        <a type="submit" href="{{ route('bills.index') }}"
                                            class="btn btn-default float-right">Cancel</a>
                                    </div>
                                    <!-- /.card-footer -->
                            </form>
                        </div>
                        <!-- /.card -->

                    </div>
                    <!--/.col (left) -->
                    <!-- right column -->

                    <!--/.col (right) -->
                </div>
                <!-- /.row -->
            </div><!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"
        integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script>
        $(document).ready(function() {
            $("#formsubmit").submit(function(e) {
                e.preventDefault();
                $.ajax({
                    url: "{{ route('bills.store') }}",
                    type: 'post',
                    datatype: 'json',
                    data: $("#formsubmit").serialize(),
                    headers: {
                        'X-CSRF-Token': $('meta[name="csrf-token"]').attr('content')
                    },
                    success: function(response) {
                        let error = response.errors;
                        if (error) {
                            $('.is-invalid').removeClass('is-invalid');
                            $('.invalid-feedback').html('');
                            for (const field in error) {
                                if (Object.prototype.hasOwnProperty.call(error, field)) {
                                    const element = error[field];
                                    $(`[name="${field}"]`).addClass('is-invalid').siblings('p')
                                        .addClass('invalid-feedback').html(element)

                                }
                            }
                        } else {
                            window.location.href =
                                "{{ route('bills.index') }}?status=success&message=Bill Added Successfully";
                        }
                    }
                })
            })
        })
    </script>
@endsection
