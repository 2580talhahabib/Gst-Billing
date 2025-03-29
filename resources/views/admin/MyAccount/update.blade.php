@extends('admin.layouts.app')
@section('content')
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>My Account </h1>
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
              <h3 class="card-title">Add Account</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form class="dropzone overflow-visible p-0" id="formDropzone" method="POST" enctype="multipart/form-data" novalidate>              
              @csrf
              <div class="card-body">
                <div class="form-group row">
                  <label for="inputEmail3" class="col-sm-2 col-form-label">Name</label>
                  <div class="col-sm-10">
                    <input type="text" value="{{ Auth::user()->name }}"  class="form-control" id="inputEmail3" placeholder="Enter your Name" name="name">
                    <p></p>
                  </div>
                </div>
                <div class="form-group row">
                  <label for="inputEmail3" class="col-sm-2 col-form-label">Email</label>
                  <div class="col-sm-10">
                    <input type="text" value="{{ Auth::user()->email}}" class="form-control" id="emailerror" placeholder="Enter your Email" name="email">
                    <p></p>
                  </div>
                </div>
                <div class="form-group mb-4">
                  <label class="form-label text-muted opacity-75 fw-medium" for="formImage">Image</label>
                  <div class="dropzone-drag-area form-control" id="previews">
                      <div class="dz-message text-muted opacity-50" data-dz-message>
                          <span>Drag file here to upload</span>
                      </div>    
                      <div class="d-none" id="dzPreviewContainer">
                          <div class="dz-preview dz-file-preview">
                              <div class="dz-photo">
                                  <img class="dz-thumbnail" data-dz-thumbnail>
                              </div>
                              <button class="dz-delete border-0 p-0" type="button" data-dz-remove>
                                  <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" id="times"><path fill="#FFFFFF" d="M13.41,12l4.3-4.29a1,1,0,1,0-1.42-1.42L12,10.59,7.71,6.29A1,1,0,0,0,6.29,7.71L10.59,12l-4.3,4.29a1,1,0,0,0,0,1.42,1,1,0,0,0,1.42,0L12,13.41l4.29,4.3a1,1,0,0,0,1.42,0,1,1,0,0,0,0-1.42Z"></path></svg>
                              </button>
                          </div>
                      </div>
                  </div>
                  <div class="invalid-feedback fw-bold">Please upload an image.</div>
              </div>
                <div class="form-group row">
                  <label for="inputEmail3" class="col-sm-2 col-form-label">Password</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="inputEmail3" placeholder="Parties Type Name" name="password">
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
     
      </div>
   
    </div>
  </section>
  <!-- /.content -->
</div>


  <script src="https://code.jquery.com/jquery-3.6.3.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.7.2/min/dropzone.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
<script>
    Dropzone.autoDiscover = false;

/**
 * Setup dropzone
 */
$('#formDropzone').dropzone({
    previewTemplate: $('#dzPreviewContainer').html(),
    url: '{{ route('myaccount_update') }}',
    addRemoveLinks: true,
    autoProcessQueue: false,       
    uploadMultiple: false,
    parallelUploads: 1,
    maxFiles: 1,
    acceptedFiles: '.jpeg, .jpg, .png, .gif',
    thumbnailWidth: 900,
    thumbnailHeight: 600,
    previewsContainer: "#previews",
    timeout: 0,
    init: function() 
    {
        myDropzone = this;

        // when file is dragged in
        this.on('addedfile', function(file) { 
            $('.dropzone-drag-area').removeClass('is-invalid').next('.invalid-feedback').hide();
        });
    },
    success: function(file, response) 
    {
        // hide form and show success message
        $('#formDropzone').fadeOut(600);
        setTimeout(function() {
            $('#successMessage').removeClass('d-none');
        }, 600);
    }
});



$(document).ready(function(){
  $("#formDropzone").submit(function(e){
    e.preventDefault();
    let formData = new FormData(this);
    formData.append('image', myDropzone.files[0]);

    $.ajax({
      url:"{{ route('myaccount_update') }}",
      type:'post',
      dataType:'json',
      data:formData,
      processData: false, 
        contentType: false, 
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        success: function(response) {
    console.log(response);
    if(response.errors && response.errors.email) {
        $('#emailerror').addClass('is-invalid')
                       .siblings('p')
                       .addClass('invalid-feedback')
                       .text(response.errors.email[0]); // Get first error message
    } else if(response.status === true) {
        window.location.href = "{{ route('dashboard') }}?status=success&message=Account+Details+Updated+successfully";
    }
}
    })
  })
})
</script>
  

@endsection