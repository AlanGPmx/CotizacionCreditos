<!-- #modal-AgregarProducto -->
<div class="modal fade" id="modal-AgregarProducto">
	<div class="modal-dialog modal-lg modal-dialog-centered">
		<div class="modal-content">
			<form action="{{ route('saveProduct') }}" method="POST" enctype="multipart/form-data">
				@csrf
				<div class="modal-header">
					<h4 class="modal-title">Nuevo Banner</h4>
					<button type="button" class="btn-close" data-bs-dismiss="modal" aria-hidden="true"></button>
				</div>
				<div class="modal-body">
					<div class="row">
						<div class="col-md-6 mb-3">
							<div class="row">
								<div class="col-md-12 mb-3">
									<div class="form-group">
										<label for="name">Nombre del Producto</label>
										<input type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" placeholder="Título del Anuncio" autocomplete="name" autofocus>
										@error('name')
										<span class="invalid-feedback" role="alert">
											<strong>{{ $message }}</strong>
										</span>
										@enderror
									</div>
								</div>
								<div class="col-md-9 mb-3">
									<div class="form-group">
										<label for="order"><span class="text-danger">*</span>Orden</label>
										<select class="form-select @error('order') is-invalid @enderror" name="order" required>
											<option selected disabled value="">Prioridad</option>
											<option value="1">1º - Primero</option>
											<option value="2">2º - Segundo</option>
											<option value="3">3º - Tercero</option>
											<option value="4">4º - Cuarto</option>
											<option value="5">5º - Quinto</option>
											<option value="6">6º - Sexto</option>
											<option value="7">7º - Séptimo</option>
											<option value="8">8º - Octavo</option>
											<option value="9">9º - Noveno</option>
											<option value="10">10º - Décimo</option>
										</select>
										@error('order')
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
								<div class="col-md-12 mb-3">
									<div class="form-group">
										<label for="description">Breve Descripción</label>
										<input type="text" class="form-control @error('description') is-invalid @enderror" name="description" value="{{ old('description') }}" placeholder="Máximo 10 palabras" autocomplete="description">
										@error('description')
										<span class="invalid-feedback" role="alert">
											<strong>{{ $message }}</strong>
										</span>
										@enderror
									</div>
								</div>
								<div class="col-md-12 mb-3">
									<div class="form-group">
										<label for="link">Enlace</label>
										<input type="text" class="form-control @error('link') is-invalid @enderror" name="link" value="{{ old('link') }}" placeholder="https://cecyt3.ipn.mx" autocomplete="link">
										@error('link')
										<span class="invalid-feedback" role="alert">
											<strong>{{ $message }}</strong>
										</span>
										@enderror
									</div>
								</div>
							</div>
						</div>
						<div class="col-md-6 mb-3">
							<div class="row">
								<div class="col-md-12 mb-3">
									<div class="form-group row">
										<span class="col-12">
											<label for="image"><span class="text-danger">*</span>Imagen <span class="text-muted">(400x400 píxeles)</span></label>
											<input class="form-control @error('image') is-invalid @enderror" type="file" accept="image/png, image/svg, image/jpg, image/jpeg" name="image" id="image" autocomplete="image">
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