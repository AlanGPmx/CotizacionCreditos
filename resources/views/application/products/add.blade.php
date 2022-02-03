<!-- #modal-AgregarProducto -->
<div class="modal fade" id="modal-AgregarProducto">
	<div class="modal-dialog modal-lg modal-dialog-centered">
		<div class="modal-content">
			<form action="{{ route('saveProduct') }}" method="POST" enctype="multipart/form-data">
				@csrf
				<div class="modal-header">
					<h4 class="modal-title">Nuevo Producto</h4>
					<button type="button" class="btn-close" data-bs-dismiss="modal" aria-hidden="true"></button>
				</div>
				<div class="modal-body">
					<div class="row">
						<div class="col-md-6 mb-3">
							<div class="row">
								<div class="col-md-12 mb-3">
									<div class="form-group">
										<label for="name">Nombre del Producto</label>
										<input type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" autocomplete="name" autofocus required>
										@error('name')
										<span class="invalid-feedback" role="alert">
											<strong>{{ $message }}</strong>
										</span>
										@enderror
									</div>
								</div>
								<div class="col-md-9 mb-3">
									<div class="form-group">
										<label for="category_id"><span class="text-danger">*</span>Categoría</label>
										<select class="form-select @error('category_id') is-invalid @enderror" name="category_id" required>
											<option selected disabled value="">Elegir una Categoría...</option>
											@foreach ($categories as $category)
											<option value="{{ $category->id }}">{{ $category->name }}</option>
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
								<div class="col-md-8 mb-3">
									<div class="form-group">
										<label for="price">Precio</label>
										<input type="text" class="form-control @error('price') is-invalid @enderror" name="price" value="{{ old('price') }}" autocomplete="price" required>
										@error('price')
										<span class="invalid-feedback" role="alert">
											<strong>{{ $message }}</strong>
										</span>
										@enderror
									</div>
								</div>
								<div class="col-md-4 mb-3">
									<div class="form-group">
										<label for="hasDiscount"><span class="text-danger">*</span>¿Descuento?</label>
										<div class="form-check form-switch form-switch-md m-2">
											<input class="form-check-input @error('hasDiscount') is-invalid @enderror" type="checkbox" name="hasDiscount" autocomplete="hasDiscount">
											<label class="form-check-label" for="hasDiscount"></label>
										</div>
										@error('hasDiscount')
										<span class="invalid-feedback" role="alert">
											<strong>{{ $message }}</strong>
										</span>
										@enderror
									</div>
								</div>
								<div class="col-md-6 mb-3" name="justIfHasDiscount" style="display:none">
									<div class="form-group">
										<label for="typeDiscount"><span class="text-danger">*</span>Tipo de Descuento</label>
										<select class="form-select @error('typeDiscount') is-invalid @enderror" name="typeDiscount">
											<option selected disabled value="">Elegir una opción...</option>
											<option value="1">Porcentaje</option>
											<option value="2">Precio</option>
										</select>
										@error('typeDiscount')
										<span class="invalid-feedback" role="alert">
											<strong>{{ $message }}</strong>
										</span>
										@enderror
									</div>
								</div>
								<div class="col-md-6 mb-3" name="justIfHasDiscount" style="display:none">
									<div class="form-group">
										<label for="discount">Precio</label>
										<input type="text" class="form-control @error('discount') is-invalid @enderror" name="discount" value="{{ old('discount') }}" autocomplete="discount">
										@error('discount')
										<span class="invalid-feedback" role="alert">
											<strong>{{ $message }}</strong>
										</span>
										@enderror
									</div>
								</div>
								<div class="col-md-12 mb-3">
									<div class="form-floating">
										<textarea class="form-control" style="height: 100px" placeholder="Leave a comment here" name="description" required></textarea>
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
						<div class="col-md-6 mb-3">
							<div class="row">
								<div class="col-md-12 mb-3">
									<div class="form-group">
										<label for="sku">SKU o ID</label>
										<input type="text" class="form-control @error('sku') is-invalid @enderror" name="sku" value="{{ old('sku') }}" autocomplete="sku" required>
										@error('sku')
										<span class="invalid-feedback" role="alert">
											<strong>{{ $message }}</strong>
										</span>
										@enderror
									</div>
								</div>
								<div class="col-md-12 mb-3">
									<div class="form-group row">
										<span class="col-12">
											<label for="image"><span class="text-danger">*</span>Imagen <span class="text-muted">(400x400 píxeles)</span></label>
											<input class="form-control @error('image') is-invalid @enderror" type="file" accept="image/png, image/svg, image/jpg, image/jpeg, image/webp" name="image" id="image" autocomplete="image">
										</span>
										@error('image')
										<span class="invalid-feedback col-12" role="alert">
											<strong>{{ $message }}</strong>
										</span>
										@enderror
										<span class="col-12 mt-3">
											<label>Previsualización</label>
											<img src="{{ url('/images/preview.jpg') }}" id="preview_image_product" alt="" width="100%" height="auto" style="pointer-events: none" ondragstart="return false;" draggable="false">
										</span>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="modal-footer">
					<a href="javascript:;" class="btn btn-white" data-bs-dismiss="modal"> Cancelar </a>
					<button type="submit" class="btn btn-green"> Guardar </button>
				</div>
			</form>
		</div>
	</div>
</div>