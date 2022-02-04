<!-- #modal-AgregarPlazo -->
<div class="modal fade" id="modal-AgregarPlazo">
	<div class="modal-dialog modal-xs modal-dialog-centered">
		<div class="modal-content container">
			<form action="{{ route('saveDeadline2pay') }}" method="POST" enctype="multipart/form-data">
				@csrf
				<div class="modal-header">
					<h4 class="modal-title">Nuevo plazo para pagar</h4>
					<button type="button" class="btn-close" data-bs-dismiss="modal" aria-hidden="true"></button>
				</div>
				<div class="modal-body">
					<div class="row">
						<div class="col-md-7 mb-3 offset-1">
							<div class="form-group">
								<label for="number">Semanas que contemplará</label>
								<input type="number" class="form-control @error('number') is-invalid @enderror" name="number" value="{{ old('number') }}" placeholder="Semanas..." autocomplete="number" autofocus>
								@error('number')
								<span class="invalid-feedback" role="alert">
									<strong>{{ $message }}</strong>
								</span>
								@enderror
							</div>
						</div>
						<div class="col-md-3 mb-3">
							<div class="form-group">
								<label for="allow"><span class="text-danger">*</span>¿Activar?</label>
								<div class="form-check form-switch form-switch-md m-2">
									<input class="form-check-input @error('allow') is-invalid @enderror" type="checkbox" name="allow" autocomplete="allow" checked>
									<label class="form-check-label" for="allow"></label>
								</div>
								@error('allow')
								<span class="invalid-feedback" role="alert">
									<strong>{{ $message }}</strong>
								</span>
								@enderror
							</div>
						</div>
						<div class="col-md-5 mb-3 offset-1">
							<div class="form-group">
								<label for="standarRate">Tasa Normal</label>
								<input type="number" step="0.0001" class="form-control @error('standarRate') is-invalid @enderror" name="standarRate" value="{{ old('standarRate') }}" placeholder="#.##" autocomplete="standarRate" autofocus>
								@error('standarRate')
								<span class="invalid-feedback" role="alert">
									<strong>{{ $message }}</strong>
								</span>
								@enderror
							</div>
						</div>
						<div class="col-md-5 mb-3">
							<div class="form-group">
								<label for="punctualRate">Tasa Puntual</label>
								<input type="number" step="0.0001" class="form-control @error('punctualRate') is-invalid @enderror" name="punctualRate" value="{{ old('punctualRate') }}" placeholder="#.##" autocomplete="punctualRate" autofocus>
								@error('punctualRate')
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