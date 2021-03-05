@if(session()->has('success'))
    <div class="alert alert-success dark alert-dismissible fade show" role="alert">{{ session()->get('success') }}
        <button class="close" type="button" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
      </div>
@endif

@if(session()->has('error'))
    <div class="alert alert-danger dark alert-dismissible fade show" role="alert">{{ session()->get('error') }}
        <button class="close" type="button" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
      </div>
@endif