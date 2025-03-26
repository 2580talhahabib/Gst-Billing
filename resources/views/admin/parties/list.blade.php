@extends('admin.layouts.app')
@section('content')
     <div class="content-wrapper">
    @include('message')
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Parties </h1>
          </div>
         
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Search Parties </h3> <br>
                <form action="">
                    <div class="container ">
                        <div class="search-container d-flex">
                            <div class="id m-3">
                                <h5 class="text-muted m">ID</h5>
                                <input type="text" value="{{ Request::get('search') }}" name="search"
                                    class="border border-3 rounded-lg border-muted ">
                            </div>
                            <div class="parites_type m-3">
                                <h5 class="text-muted">Name</h5>
                                <input type="text" value="{{ Request::get('name') }}" name="name"
                                    class="border border-3 rounded-lg border-muted ">
                            </div>
                        </div>
                        <div class="buttons m-5"></div>
                        <button type="submit" class="btn btn-primary ms-5">submit</button>
                        <a class="btn btn-danger ms-5">Reset</a>
                    </div>

                </form>



                 <a href="{{ route('parties.create')}}" class="float-right btn btn-primary">Add New Parties</a>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table class="table table-bordered">
                  <thead>
                    <tr>
                      <th style="width: 10px">#</th>
                   
                      <th>Parties Type</th>
                      <th>Name</th>
                      <th>Phone </th>
                      <th>Address</th>
                      <th>Account Holder Name</th>
                      <th>Account Number</th>
                      <th>Bank Name</th>
                      <th>IFSC Code</th>
                      <th>Branch Address</th>
                      <th>Action</th>
                   
                    </tr>
                  </thead>
                  <tbody>
                    @foreach ($record as $records)
                    <tr>
                    <td>{{ $records->id }}</td>
                    <td>{{ $records->parties_type->parties_name }}</td>
                    <td>{{ $records->name }}</td>
                    <td>{{ $records->phone }}</td>
                    <td>{{ $records->address }}</td>
                    <td>{{ $records->account_holder_name }}</td>
                    <td>{{ $records->account_number }}</td>
                    <td>{{ $records->bank_name }}</td>
                    <td>{{ $records->ifsc_code }}</td>
                    <td>{{ $records->branch_address }}</td>
                    <td class="d-flex"> 
                    <a href="{{ route('parties.edit',$records->id) }}"  class="btn btn-info m-1"><i class="fas fa-pencil-alt"></i></a>
                    <a href="#"  data-id={{ $records->id }} class="btn btn-danger m-1 deleted" ><i class="fas fa-trash"></i></a>
                  </td>
                    </tr>
                    @endforeach
                 
                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->
              <div class="card-footer clearfix">
                <ul class="pagination pagination-sm m-0 float-right">
                  <li class="page-item"><a class="page-link" href="#">&laquo;</a></li>
                  <li class="page-item"><a class="page-link" href="#">1</a></li>
                  <li class="page-item"><a class="page-link" href="#">2</a></li>
                  <li class="page-item"><a class="page-link" href="#">3</a></li>
                  <li class="page-item"><a class="page-link" href="#">&raquo;</a></li>
                </ul>
              </div>
            </div>
         
          </div>
      
          <!-- /.col -->
        </div>
        
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

  <script>
$(document).ready(function(){
  $(".deleted").click(function(e){
 e.preventDefault();
 let id=$('.deleted').data('id');
 let url="{{route('parties.Destroy', 'ids')  }}";
 url=url.replace('ids',id);

 $.ajax({
  url:url,
  type:'delete',
  data:{},
  dataType:'json',
  headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') 
        },
  success:function(response){
  if(response.status == true){
   window.location.href"{{ route('parties.index') }}?status=success&message=Record deleted successfully"
  }else{
     window.location.href="{{ route('parties.index') }}?status=danger&message=Record did not found"
  }
  }})

})
})
  </script>
@endsection