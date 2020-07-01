@extends('layouts.app')

@section('content')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center p-4 mb-3">
        <h1 class="h2">Add Attribute</h1>
    </div>


    
    <form action="{{ route('addAtributes-form') }}" method="post" id="addForm">
    @csrf

        <div class="col-md-2 mb-3">
            <label>Category</label>
            <select class="browser-default custom-select" id="switcher" name="switcher">
            @foreach($data as $category)
                <option value="{{$category->name}}">{{$category->name}}</option>
            @endforeach
            </select>
        </div>

        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center p-3">
            <h3 class="h3">Attribute</h3>
        </div>

        <div class="col-md-3 mb-3">  
            <label for="sku">Name</label>
            <input type="text" class="form-control" name="name" required="">
            <div class="invalid-feedback">
                Please enter Name.
            </div>
        </div>
        
        <div class="col-md-3 mb-3">  
            <label for="sku">Units(optional)</label>
            <input type="text" class="form-control" name="units">
            <div class="invalid-feedback">
                Please enter Units.
            </div>
        </div>
            
        <div class="col-md-3 mb-3">
            <label for="cBox">Required(optional)</label>
            <input type="checkbox" name="required" value="true" class="ml-1" id="req">
        </div>
            
        <div class="col-md-3 mb-3">
            <label for="cBox">Numeric(optional)</label>
            <input type="checkbox" name="numeric" value="true" class="ml-1" id="num">
        </div>

        <div class="col-md-3 mb-3">
            <label for="cBox">Unique(optional)</label>
            <input type="checkbox" name="unique" value="true" class="ml-1" id="uniq">
        </div>

        <div class="col-md-3 mb-3">
            <label for="cBox" id="onChange">Min(optional)</label>
            <input type="text" class="form-control" name="min">
            <div class="invalid-feedback">
                Please enter Min Symbols.
            </div>
        </div>

        <div class="col-md-3 mb-3">
            <label for="cBox" id="onChange">Max(optional)</label>
            <input type="text" class="form-control" name="max">
            <div class="invalid-feedback">
                Please enter Max Symbols.
            </div>
        </div>

        <div class="col-md-3 mb-3">
            <button type="submit" class="btn btn-sm btn-outline-secondary pl-5 pr-5 pt-2">
                <h6>Save<h6>
            </button>
        </div>
    </form>
@endsection