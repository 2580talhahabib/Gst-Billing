@extends('admin.layouts.app')
@section('content')
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Add Parties Type</h1>
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
              <h3 class="card-title">Add New Bills</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form class="form-horizontal" id="formsubmit">
              
              <div class="card-body">
                <div class="form-group row">
                  <label for="inputEmail3" class="col-sm-2 col-form-label" class="form-label">Parties Type Name</label>
                  <div class="col-sm-10">
                    <select name="parties_type_id" id="parties_type_id" class="form-control"  >
                    @foreach ($parties_type as $party)
                      <option value="{{ $party->id }}" >{{ $party->parties_name }}</option>
                    @endforeach
                  </select>
                    <p></p>
                  </div>
                </div>
                <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 col-form-label">Invoice Date</label>
                    <div class="col-sm-10">
                      <input name="invoice_date" type="date" class="form-control" id="invoice_date"  >
                      <p></p>
                    </div>
                  </div>

                  <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 col-form-label">Invoice No</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" id="invoice_no"  name="invoice_no">
                      <p></p>
                    </div>
                  </div>

                  <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 col-form-label">Item Descripation</label>
                    <div class="col-sm-10">
                      {{-- <textarea type="text" class="form-control" id="inputEmail3"  name="item_desc"> --}}
                        <textarea  name="item_desc"
                        id="item_desc"
                        rows="5"
                        cols="80"
                         class="w-full p-3 rounded-lg shadow-md border border-gray-300 focus:border-blue-500 focus:ring-2 focus:ring-blue-200 transition-all outline-none resize-none"
                        placeholder="Enter your description here..."></textarea>
                      <p></p>
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 col-form-label">Total Amount </label>
                    <div class="col-sm-10">
                      <input type="number" class="form-control" id="total_amount"  name="total_amount">
                      <p></p>
                    </div>
                  </div>

                  <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 col-form-label">CGST Rate</label>
                    <div class="col-sm-10">
                      <input type="number" class="form-control" id="cgst_rate"  name="cgst_rate">
                      <p></p>
                    </div>
                  </div>


                  <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 col-form-label">SGST Rate</label>
                    <div class="col-sm-10">
                      <input type="number" class="form-control" id="sgst_rate"  name="sgst_rate">
                      <p></p>
                    </div>
                  </div>


                  <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 col-form-label">IGST Rate</label>
                    <div class="col-sm-10">
                      <input type="number" class="form-control" id="igst_rate"  name="igst_rate">
                      <p></p>
                    </div>
                  </div>



                  <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 col-form-label">CGST Amount</label>
                    <div class="col-sm-10">
                      <input type="number" class="form-control" id="cgst_amount"  name="cgst_amount">
                      <p></p>
                    </div>
                  </div>



                  <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 col-form-label">SGST Amount</label>
                    <div class="col-sm-10">
                      <input type="number" class="form-control" id="sgst_amount"  name="sgst_amount">
                      <p></p>
                    </div>
                  </div>


                  <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 col-form-label">IGST Amount</label>
                    <div class="col-sm-10">
                      <input type="number" class="form-control" id="igst_amount"  name="igst_amount">
                      <p></p>
                    </div>
                  </div>


                  <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 col-form-label">Tax Amount</label>
                    <div class="col-sm-10">
                      <input type="number" class="form-control" id="tax_amount"  name="tax_amount">
                      <p></p>
                    </div>
                  </div>


                  <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 col-form-label">Net Amount</label>
                    <div class="col-sm-10">
                      <input type="number" class="form-control" id="net_amount"  name="net_amount">
                      <p></p>
                    </div>
                  </div>

              <div class="form-group row">
                <label for="inputEmail3" class="col-sm-2 col-form-label">Declaration</label>
                <div class="col-sm-10">
                
                    <textarea  name="declaration"
                    id="declaration"
                    rows="5"
                    cols="80"
                     class="w-full p-3 rounded-lg shadow-md border border-gray-300 focus:border-blue-500 focus:ring-2 focus:ring-blue-200 transition-all outline-none resize-none"
                    placeholder="Enter your description here..."></textarea>
                  <p></p>
                </div>
              </div>
              
              <!-- /.card-body -->
              <div class="card-footer">
                <button type="submit" class="btn btn-info">Submit</button>
                <a type="submit" href="{{ route('parties_type') }}" class="btn btn-default float-right">Cancel</a>
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
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script>
  $(document).ready(function(){
    $("#formsubmit").submit(function(e){
 e.preventDefault();
 $.ajax({
   url:"{{ route('bills.store') }}",
   type:'post',
   datatype:'json',
   data:$("#formsubmit").serialize(),
   headers: {'X-CSRF-Token': $('meta[name="csrf-token"]').attr('content')},
success:function(response){
let error=response.errors;
if(error){
  $('.is-invalid').removeClass('is-invalid');
    $('.invalid-feedback').html('');
  for (const field in error) {
    if (Object.prototype.hasOwnProperty.call(error, field)) {
      const element = error[field];
      $(`[name="${field}"]`).addClass('is-invalid').siblings('p').addClass('invalid-feedback').html(element)
      
    }
  }
}else{
   window.location.href="{{ route('bills.index') }}?status=success&message=Bill Added Successfully";
}
}
 })
    })
  })
</script>
@endsection