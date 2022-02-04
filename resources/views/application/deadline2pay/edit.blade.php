<x-app-layout>
	<!-- Styles for this view [Could be better, for reduce time, it'll be here] -->
	@push('styles')
	@endpush

	<x-slot name="header">
		<h2 class="h4 font-weight-bold">
			{{ __('Edit Deadline to pay') }}
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
			<h2>Editar el plazo</h2>

			<form action="{{ route('updateDeadline2pay', $deadline2pay->id) }}" method="POST" enctype="multipart/form-data">
				@csrf
				@method('PATCH')
				<div class="row">
					<div class="col-md-4 mb-3">
						<div class="form-group">
							<label for="number">Número de semanas</label>
							<input type="number" class="form-control @error('number') is-invalid @enderror" name="number" value="{{ $deadline2pay->number }}" placeholder="Nombra la nueva categoria..." autocomplete="number" autofocus>
							@error('number')
							<span class="invalid-feedback" role="alert">
								<strong>{{ $message }}</strong>
							</span>
							@enderror
						</div>
					</div>
					<div class="col-md-3 mb-3">
						<div class="form-group">
							<label for="standarRate">Tasa Normal</label>
							<input type="number" step="0.0001" class="form-control @error('standarRate') is-invalid @enderror" name="standarRate" value="{{ $deadline2pay->standarRate }}" placeholder="#.####" autocomplete="standarRate" autofocus>
							@error('standarRate')
							<span class="invalid-feedback" role="alert">
								<strong>{{ $message }}</strong>
							</span>
							@enderror
						</div>
					</div>
					<div class="col-md-3 mb-3">
						<div class="form-group">
							<label for="punctualRate">Tasa Puntual</label>
							<input type="number" step="0.0001" class="form-control @error('punctualRate') is-invalid @enderror" name="punctualRate" value="{{ $deadline2pay->punctualRate }}" placeholder="#.####" autocomplete="punctualRate" autofocus>
							@error('punctualRate')
							<span class="invalid-feedback" role="alert">
								<strong>{{ $message }}</strong>
							</span>
							@enderror
						</div>
					</div>

					<div class="col-md-2 mb-3">
						<div class="form-group">
							<label for="allow"><span class="text-danger">*</span>¿Activar?</label>
							<div class="form-check form-switch form-switch-md m-2">
								<input class="form-check-input @error('allow') is-invalid @enderror" type="checkbox" name="allow" autocomplete="allow" @if($deadline2pay->allow) checked @endif>
								<label class="form-check-label" for="allow"></label>
							</div>
							@error('allow')
							<span class="invalid-feedback" role="alert">
								<strong>{{ $message }}</strong>
							</span>
							@enderror
						</div>
					</div>
					<div class="col-12 d-grid gap-2 d-md-flex justify-content-md-end">
						<a class="btn btn-outline-secondary " href="{{ route('deadline2pay') }}"> <i class="fa fa-angle-left"></i> Cancelar </a>
						<button class="btn btn-outline-success float-right" type="submit"> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Guardar &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </button>
					</div>
				</div>
			</form>
		</div>
	</div>

	<!-- Scripts for this view [Could be better, for reduce time, it'll be here] -->
	@push('scripts')
	@endpush
</x-app-layout>