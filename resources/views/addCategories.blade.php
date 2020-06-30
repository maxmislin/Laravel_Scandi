@extends('layouts.app')

@section('content')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center p-4 mb-3">
    <h1 class="h2">Add Categories</h1>
</div>
  
 <form action="{{ route('apply-form') }}" method="post">
    @csrf

	  <div class="col-md-3 mb-3">  
      <label for="sku">Name</label>
      <input type="text" class="form-control" name="name" placeholder="Name" required="">
      <div class="invalid-feedback">
        Please enter Name.
      </div>
    </div>

    <div class="col-md-3 mb-3">
        <a class="btn btn-primary" href="#" role="button">Add More +</a>
    </div>

    <div class="col-md-3 mb-3">
      <button type="submit" class="btn btn-sm btn-outline-secondary pl-5 pr-5 pt-2">
        <h6>Save<h6>
      </button>
    </div>
  </form>
@endsection