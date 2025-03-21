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
                <h3 class="card-title">Parties  List</h3>
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
                    
                    <td>
                      <a href="" class="btn btn-success">Update</a>
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
 function deleteCategory(id){
  var url='{{ route('parties_type_delete','ID') }}'
  var DeleteUrl=url.replace('ID',id)
  // alert(url);
  // return false;
if(confirm('Are you sure you want to delete')){
  $.ajax({
  url:DeleteUrl,
  type:'delete',
  data:{},
  dataType:'json',
  headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') 
        },
  success:function(response){
  if(response.status == true){
    window.location.href= "{{ route('parties_type') }}"
  }
  }
})
}
 }
  </script>
@endsection