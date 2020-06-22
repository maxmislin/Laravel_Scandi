@extends('layouts.app')

@section('content')
	<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center p-4 mb-3">
        <h1 class="h2">Product List</h1>
        <div class="btn-toolbar mb-2 mb-md-0">
          	<div class="btn-group mr-2">
            	<button form="cBox" type="submit" class="btn btn-sm btn-outline-secondary py-2 px-2">Mass Delete Action</button>
          	</div>
        </div>
  </div>

	<form id="cBox" action="{{ route('delete-form') }}" method="post">
	@csrf
	<div class="d-flex flex-wrap">
		@foreach($data as $product)
		
			<div class="card mb-4 shadow-sm">
				<div class="card-body">
							<div align="right" class="checkbox-inline custom-checkbox">
								<input type="checkbox" name="id[]" value={{$product->id}}>
							</div>
					<ul class="list-unstyled mt-3 mb-4">
						@foreach($product->getAttributes() as $atribute)
							@if (strval($atribute) != strval($product->id) && strval($atribute) != strval($product->created_at) && strval($atribute) != strval($product->updated_at) && strval($atribute) != strval($product->category_id))
								@if(strval($atribute) == strval($product->price))
									<li>{{ $atribute }} $</li>
								@endif	
								<li>{{ $atribute }}</li>	
							@endif	
						@endforeach
					</ul>
				</div>
			</div>
		@endforeach
	</div>
	</form>
@endsection