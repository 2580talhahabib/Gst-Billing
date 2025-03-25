@extends('admin.layouts.app')
@section('content')
     <div class="content-wrapper">
    @include('message')
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Gst Bills </h1>
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
                <h3 class="card-title">Gst Bills</h3>
                 <a href="{{ route('bills.create')}}" class="float-right btn btn-primary">Add New Bills</a>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table class="table table-bordered">
                  <thead>
                    <tr>
                      <th style="width: 10px">#</th>
                   
                      <th>Parties Type</th>
                      <th>Invoice Date</th>
                      <th>Invoice No </th>
                      <th>Total Amount</th>
                      <th>Tax Amount</th>
                      <th>Net Amount</th>
                      <th>Action</th>
                   
                    </tr>
                  </thead>
              <tbody>
                @php
                    $totalamount= 0;
                @endphp
                    @foreach ($record as $records) 
                    @php
                        $totalamount=$totalamount + $records->total_amount ;
                    @endphp
                    <tr>
                    <td>{{ $records->id }}</td>
                    <td>{{ $records->parties_type->parties_name }}</td>
                    <td>{{  date('d-m-Y',strtotime($records->invoice_date))   }}</td>
                    <td>{{ $records->invoice_no }}</td>
                    <td>{{ $records->total_amount }}</td>
                    <td>{{ $records->tax_amount }}</td>
                    <td>{{ $records->net_amount }}</td>
                    <td class="d-flex"> 
                      <a href="{{ route('bills.edit',$records->id) }}"  class="btn btn-info m-1"><i class="fas fa-pencil-alt"></i></a>
                      <a   data-id={{ $records->id }} class="btn btn-danger m-1 deleted" ><i class="fas fa-trash"></i></a>
                    </td>
                   
                    {{-- <td class="d-flex"> 
                    <a href="{{ route('parties.edit',$records->id) }}"  class="btn btn-info m-1"><i class="fas fa-pencil-alt"></i></a>
                    <a href="#"  data-id={{ $records->id }} class="btn btn-danger m-1 deleted" ><i class="fas fa-trash"></i></a>
                  </td> --}}
                    </tr>
                    @endforeach
                    @if (!empty($totalamount))
                    <tr>
                      <th colspan="4"> Total (Rs)</th>
                      <td> Rs. {{ number_format($totalamount) }}</td>
                    </tr>
                        
                    @endif
                 
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
 let id=$(this).data('id');
 console.log(id)
 let url="{{route('bills.destroy', 'ids')  }}";
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
   window.location.href="{{ route('bills.index') }}?status=success&message=Bill deleted successfully"
  }else{
     window.location.href="{{ route('bills.index') }}?status=danger&message=Bill did not found"
  }
  }})

})
})
  </script>
@endsection