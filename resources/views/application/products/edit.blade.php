<x-app-layout>
	<!-- Styles for this view [Could be better, for reduce time, it'll be here] -->
	@push('styles')
	@endpush

	<x-slot name="header">
		<h2 class="h4 font-weight-bold">
			{{ __('Edit Product') }}
		</h2>
	</x-slot>

	<div class="row">
		<div class="col-12">
			@if (session()->has('message'))
			<div class="alert {{ session()->get('type') }} h3" role="alert">
				<i class="fa {{ session()->get('icon') }}"></i> &nbsp;{{ session()->get('message') }}
			</div>
			@endif
		</div>

		<div class="col-md-8 offset-2">
			<h2>Editar el Producto</h2>

			<form action="{{ route('updateProduct', $product->id) }}" method="POST" enctype="multipart/form-data">
				@csrf
				@method('PATCH')
				<div class="row">
					<div class="col-md-6 mb-3">
						<div class="form-group">
							<label for="name">Nombre del Producto</label>
							<input type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ $product->name }}" placeholder="Nombra la nueva categoria..." autocomplete="name" autofocus>
							@error('name')
							<span class="invalid-feedback" role="alert">
								<strong>{{ $message }}</strong>
							</span>
							@enderror
						</div>
					</div>
					<div class="col-md-6 mb-3">
						<div class="form-group">
							<label for="sku">SKU o ID</label>
							<input type="text" class="form-control @error('sku') is-invalid @enderror" name="sku" value="{{ $product->sku }}" autocomplete="sku" required>
							@error('sku')
							<span class="invalid-feedback" role="alert">
								<strong>{{ $message }}</strong>
							</span>
							@enderror
						</div>
					</div>
					<div class="col-md-4 mb-3">
						<div class="form-group">
							<label for="category_id"><span class="text-danger">*</span>Categoría</label>
							<select class="form-select @error('category_id') is-invalid @enderror" name="category_id" required>
								<option disabled value="">Elegir una Categoría...</option>
								@foreach ($categories as $category)
								<option value="{{ $category->id }}" @if($category->id == $product->category_id) selected @endif>{{ $category->name }}</option>
								@endforeach
							</select>
							@error('category_id')
							<span class="invalid-feedback" role="alert">
								<strong>{{ $message }}</strong>
							</span>
							@enderror
						</div>
					</div>
					<div class="col-md-2 mb-3">
						<div class="form-group">
							<label for="active"><span class="text-danger">*</span>Mostrarlo</label>
							<div class="form-check form-switch form-switch-md m-2">
								<input class="form-check-input @error('active') is-invalid @enderror" type="checkbox" name="active" autocomplete="active" checked>
								<label class="form-check-label" for="active"></label>
							</div>
							@error('active')
							<span class="invalid-feedback" role="alert">
								<strong>{{ $message }}</strong>
							</span>
							@enderror
						</div>
					</div>
					<div class="col-md-4 mb-3">
						<div class="form-group">
							<label for="price">Precio</label>
							<input type="text" class="form-control @error('price') is-invalid @enderror" name="price" value="{{ $product->price }}" autocomplete="price" required>
							@error('price')
							<span class="invalid-feedback" role="alert">
								<strong>{{ $message }}</strong>
							</span>
							@enderror
						</div>
					</div>
					<div class="col-md-2 mb-3">
						<div class="form-group">
							<label for="hasDiscount"><span class="text-danger">*</span>¿Descuento?</label>
							<div class="form-check form-switch form-switch-md m-2">
								<input class="form-check-input @error('hasDiscount') is-invalid @enderror" type="checkbox" @if($product->discount) checked @endif name="hasDiscount" autocomplete="hasDiscount">
								<label class="form-check-label" for="hasDiscount"></label>
							</div>
							@error('hasDiscount')
							<span class="invalid-feedback" role="alert">
								<strong>{{ $message }}</strong>
							</span>
							@enderror
						</div>
					</div>
					<div class="col-md-6 mb-3" name="justIfHasDiscount" @if(is_null($product->discount)) style="display:none" @endif>
						<div class="form-group">
							<label for="typeDiscount"><span class="text-danger">*</span>Tipo de Descuento</label>
							<select class="form-select @error('typeDiscount') is-invalid @enderror" name="typeDiscount">
								<option selected disabled value="">Elegir una opción...</option>
								<option @if($product->typeDiscount == 1) selected @endif value="1">Porcentaje</option>
								<option @if($product->typeDiscount == 2) selected @endif value="2">Precio</option>
							</select>
							@error('typeDiscount')
							<span class="invalid-feedback" role="alert">
								<strong>{{ $message }}</strong>
							</span>
							@enderror
						</div>
					</div>
					<div class="col-md-6 mb-3" name="justIfHasDiscount" @if(is_null($product->discount)) style="display:none" @endif>
						<div class="form-group">
							<label for="discount">{{ ($product->typeDiscount == 1) ? 'Porcentaje':'Precio en descuento' }}</label>
							<input type="text" class="form-control @error('discount') is-invalid @enderror" name="discount" value="{{ $product->discount }}" autocomplete="discount">
							@error('discount')
							<span class="invalid-feedback" role="alert">
								<strong>{{ $message }}</strong>
							</span>
							@enderror
						</div>
					</div>
					<div class="col-md-12 mb-3">
						<div class="row">
							<div class="col-md-6">
								<div class="form-group">
									<label for="image"><span class="text-danger">*</span>Imagen <span class="text-muted">(400x400 píxeles)</span></label>
									<input class="form-control @error('image') is-invalid @enderror" type="file" accept="image/png, image/svg, image/jpg, image/jpeg, image/webp" name="image" id="image" autocomplete="image">
								</div>
								@error('image')
								<span class="invalid-feedback col-12" role="alert">
									<strong>{{ $message }}</strong>
								</span>
								@enderror
								<label class="mt-3">Previsualización</label>
								<img src="{{ asset('/images/products/'.$product->image) }}" id="preview_image_product" alt="" width="100%" height="auto" style="pointer-events: none" ondragstart="return false;" draggable="false">
							</div>
							<div class="col-md-6 mb-3">
								<div class="form-floating">
									<textarea class="form-control" style="height: 460px" placeholder="Leave a comment here" name="description" required>{{ $product->description }}</textarea>
									<label for="floatingTextarea2">Descripción</label>
								</div>
								@error('description')
								<span class="invalid-feedback" role="alert">
									<strong>{{ $message }}</strong>
								</span>
								@enderror
							</div>
						</div>
					</div>




					<div class="col-12 d-grid gap-2 d-md-flex justify-content-md-end">
						<a class="btn btn-outline-secondary " href="{{ route('products') }}"> <i class="fa fa-angle-left"></i> Cancelar </a>
						<button class="btn btn-outline-success float-right" type="submit"> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Guardar &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </button>
					</div>
				</div>
			</form>
		</div>
	</div>

	<!-- Scripts for this view [Could be better, for reduce time, it'll be here] -->
	@push('scripts')
	<script>
		//Preview IMage
		imgInput = document.getElementById('image');
		imgInput.onchange = evt => {
			const [file] = imgInput.files
			if (file) {
				document.getElementById('preview_image_product').src = URL.createObjectURL(file)
			}
		}

		//Discount
		$('[name="hasDiscount"]').on('change', function() {
			$('[name=justIfHasDiscount]').toggle();
		});
	</script>
	@endpush
</x-app-layout>