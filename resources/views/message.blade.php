@if (Session::has('success'))
    <div class="alert alert-success text-center">
        {{ Session::get('success') }}
    </div>
@endif
@if (Session::has('danger'))
    <div class="alert alert-danger text-center">
        {{ Session::get('danger') }}
    </div>
@endif
@if (request()->query('status') == 'success')
<div class="alert alert-success text-center">
  {{ request()->query('message') }}
</div>
@endif
@if (request()->query('status') == 'danger')
<div class="alert alert-danger text-center">
    {{ request()->query('message') }}
  </div>
@endif