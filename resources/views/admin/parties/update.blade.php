@extends('admin.layouts.app')
@section('content')
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Update Parties </h1>
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
              <h3 class="card-title">Update Parties </h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form class="form-horizontal" id="partiesform">
              
              <div class="card-body">
                {{-- parties type name  --}}
                <div class="form-group row">
                  <label for="inputEmail3" class="col-sm-2 col-form-label">Parties Type Name</label>
                  <div class="col-sm-10">
        <select  id="parties_type_id" name="parties_type_id" class="form-control custom-select" >
          <option value="">Select Partytype</option>
          @foreach ($party_type as $party)
            <option value="{{ $party->id }}" {{ ($party->parties_name) ? 'selected' : '' }} >{{ $party->parties_name }}</option>
          @endforeach
        </select>
                    <p></p>
                  </div>
                </div>
                {{-- full name  --}}
                <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 col-form-label">Full Name</label>
                    <div class="col-sm-10">
                      <input type="text" value="{{ $edit->name }}" class="form-control" id="name" placeholder="Enter Your Name" name="name">
                      <p></p>
                    </div>
                  </div>
                  {{-- phone no  --}}
                  <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 col-form-label">Phone No</label>
                    <div class="col-sm-10">
                      <input type="text" value="{{ $edit->phone }}" class="form-control" id="phone" placeholder="Enter your Phone" name="phone">
                      <p></p>
                    </div>
                  </div>
                  {{-- address  --}}
                  <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 col-form-label">Address</label>
                    <div class="col-sm-10">
                      <input type="text" value="{{ $edit->address }}" class="form-control" id="address" placeholder="Enter your Address" name="address">
                      <p></p>
                    </div>
                  </div>
                  {{-- Account Holder name  --}}
                  <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 col-form-label">Account Holder Name</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" id="account_holder_name" placeholder="Enter Holder Name" value="{{ $edit->account_holder_name }}" name="account_holder_name">
                      <p></p>
                    </div>
                  </div>
                  {{-- account number  --}}
                  <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 col-form-label">Account Number</label>
                    <div class="col-sm-10">
                      <input type="text" value="{{ $edit->account_number }}" class="form-control" id="account_number" placeholder="Enter Account Number" name="account_number">
                      <p></p>
                    </div>
                  </div>
                  {{-- Bank name  --}}
                  <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 col-form-label">Bank Name</label>
                    <div class="col-sm-10">
                      <input type="text" value="{{ $edit->bank_name }}"  class="form-control" id="bank_name" placeholder="Enter Bank Name" name="bank_name">
                      <p></p>
                    </div>
                  </div>
                  {{-- ifsc code  --}}
                  <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 col-form-label">IFSC Code</label>
                    <div class="col-sm-10">
                      <input type="text" value="{{ $edit->ifsc_code }}" class="form-control" id="ifsc_code" placeholder="Enter Ifsc Code" name="ifsc_code">
                      <p></p>
                    </div>
                  </div>
                  {{-- branch address  --}}
                  <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 col-form-label">Branch Address</label>
                    <div class="col-sm-10">
                      <input type="text" value="{{ $edit->branch_address }}"  class="form-control" id="branch_address" placeholder="Enter Address" name="branch_address">
                      <p></p>
                    </div>
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
    $("#partiesform").submit(function(e){
        e.preventDefault();
        $.ajax({
            url:"{{ route('parties.update',$edit->id) }}",
            type:'put',
            dataType:'json',
            data:$('#partiesform').serialize(),
            headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    },
   success:function(response){
    let error=response.errors;
    
if(response.status == true){
window.location.href="{{ route('parties.index') }}?status=success&message=Parties Updated successfully"
}else{
  if(error.parties_type_id){
    $('#parties_type_id').addClass('is-invalid').siblings('p').addClass('invalid-feedback').html(error.parties_type_id)
  }else{
    $('#parties_type_id').removeClass('is-invalid').siblings('p').removeClass('invalid-feedback').html('')
  }
  if(error.name){
    $('#name').addClass('is-invalid').siblings('p').addClass('invalid-feedback').html(error.name)
  }else{
    $('#name').removeClass('is-invalid').siblings('p').removeClass('invalid-feedback').html('')
  }
  if(error.phone){
    $('#phone').addClass('is-invalid').siblings('p').addClass('invalid-feedback').html(error.phone)
  }else{
    $('#phone').removeClass('is-invalid').siblings('p').removeClass('invalid-feedback').html('')
  }
  if(error.address){
    $('#address').addClass('is-invalid').siblings('p').addClass('invalid-feedback').html(error.address)
  }else{
    $('#address').removeClass('is-invalid').siblings('p').removeClass('invalid-feedback').html('')
  }
  if(error.account_holder_name){
    $('#account_holder_name').addClass('is-invalid').siblings('p').addClass('invalid-feedback').html(error.account_holder_name)
  }else{
    $('#account_holder_name').removeClass('is-invalid').siblings('p').removeClass('invalid-feedback').html('')
  }
  if(error.account_number){
    $('#account_number').addClass('is-invalid').siblings('p').addClass('invalid-feedback').html(error.account_number)
  }else{
    $('#account_number').removeClass('is-invalid').siblings('p').removeClass('invalid-feedback').html('')
  }
  if(error.bank_name){
    $('#bank_name').addClass('is-invalid').siblings('p').addClass('invalid-feedback').html(error.bank_name)
  }else{
    $('#bank_name').removeClass('is-invalid').siblings('p').removeClass('invalid-feedback').html('')
  }
  if(error.ifsc_code){
    $('#ifsc_code').addClass('is-invalid').siblings('p').addClass('invalid-feedback').html(error.ifsc_code)
  }else{
    $('#ifsc_code').removeClass('is-invalid').siblings('p').removeClass('invalid-feedback').html('')
  }
  if(error.branch_address){
    $('#branch_address').addClass('is-invalid').siblings('p').addClass('invalid-feedback').html(error.branch_address)
  }else{
    $('#branch_address').removeClass('is-invalid').siblings('p').removeClass('invalid-feedback').html('')
  }
}
   },
        })
    })
})
  
</script>
@endsection