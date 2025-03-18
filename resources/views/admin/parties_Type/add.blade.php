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
              <h3 class="card-title">Add Parties Type</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form class="form-horizontal" id="formsubmit">
              
              <div class="card-body">
                <div class="form-group row">
                  <label for="inputEmail3" class="col-sm-2 col-form-label">Parties Type Name</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="inputEmail3" placeholder="Parties Type Name" name="parties_name">
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
     $('#formsubmit').submit(function(e){
      e.preventDefault()
 $.ajax({
  url:"{{ route('parties_type_store') }}",
  type:'post',
  data:$("#formsubmit").serialize(),
  dataType:'json',
headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') 
        },
  success:function(responce){
   if(responce.status == false){
    $('#inputEmail3').addClass('is-invalid').siblings('p').addClass('invalid-feedback text text-danger').text(responce.errors.parties_name)
   }else{
        window.location.href="{{ route('parties_type')}}?status=success&message=Record Added successfully "
   }
  }
 })

     })
    })
  
</script>
@endsection