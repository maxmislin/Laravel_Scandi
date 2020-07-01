@extends('layouts.app')

@section('content')
  <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center p-4 mb-3">
      <h1 class="h2">Add Category</h1>
  </div>
    
  <form action="{{ route('addCategories-form') }}" method="post" id="addForm">
    @csrf

    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center p-3">
      <h3 class="h3">Category</h3>
    </div>

    <div class="col-md-3 mb-3">  
      <label for="name">Name</label>
      <input type="text" class="form-control" name="name" required="">
      <div class="invalid-feedback">
        Please enter Name.
      </div>
    </div>

    <div class="col-md-3 mb-3">
      <button form="addForm" type="submit" class="btn btn-sm btn-outline-secondary pl-5 pr-5 pt-2">
        <h6>Save<h6>
      </button>
    </div>
  </form>
@endsection