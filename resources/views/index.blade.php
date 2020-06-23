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
		@foreach($productData as $products)
			<div class="card mb-4 shadow-sm">
				<div class="card-body">
							<div align="right" class="checkbox-inline custom-checkbox">
								<input type="checkbox" name="id[]" value={{$products->id}}>
							</div>
					<ul class="list-unstyled mt-3 mb-4">
						@foreach($products->getAttributes() as $product)
							
							@if (strval($product) != strval($products->id) && strval($product) != strval($products->created_at) && strval($product) != strval($products->updated_at) && strval($product) != strval($products->category_id))
								@if(strval($product) == strval($products->price))
									<li>{{ $product }} $</li>
								@else
									<li>{{ $product }}</li>
								@endif
							@endif	
						@endforeach
						@foreach($atributeData as $atributes)
							@foreach($atributes->getAttributes() as $atribute)
								@if (strval($atribute) != strval($atributes->id) && strval($atribute) != strval($atributes->created_at) && strval($atribute) != strval($atributes->updated_at) && strval($atribute) != strval($atributes->product_id) && strval($atribute) != strval($atributes->hidden))
									@if ($products->id == $atributes->product_id)
										<li>{{ $atribute }}</li>
									@endif
								@endif		
							@endforeach	
						@endforeach	
					</ul>
				</div>
			</div>
		@endforeach
	</div>
	</form>
@endsection