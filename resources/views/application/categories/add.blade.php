<!-- #modal-AgregarCategoria -->
<div class="modal fade" id="modal-AgregarCategoria">
	<div class="modal-dialog modal-lg modal-dialog-centered">
		<div class="modal-content">
			<form action="{{ route('saveCategory') }}" method="POST" enctype="multipart/form-data">
				@csrf
				<div class="modal-header">
					<h4 class="modal-title">Nueva Categoría</h4>
					<button type="button" class="btn-close" data-bs-dismiss="modal" aria-hidden="true"></button>
				</div>
				<div class="modal-body">
					<div class="row">
						<div class="col-md-10 mb-3">
							<div class="form-group">
								<label for="name">Nombre de la Categoria</label>
								<input type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" placeholder="Nombra la nueva categoria..." autocomplete="name" autofocus>
								@error('name')
								<span class="invalid-feedback" role="alert">
									<strong>{{ $message }}</strong>
								</span>
								@enderror
							</div>
						</div>

						<div class="col-md-2 mb-3">
							<div class="form-group">
								<label for="active"><span class="text-danger">*</span>¿Activar?</label>
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
					</div>
				</div>
				<div class="modal-footer">
					<a href="javascript:;" class="btn" data-bs-dismiss="modal"> Cancelar </a>
					<button type="submit" class="btn"> Guardar </button>
				</div>
			</form>
		</div>
	</div>
</div>