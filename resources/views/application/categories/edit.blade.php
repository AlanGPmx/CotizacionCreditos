<x-app-layout>
	<!-- Styles for this view [Could be better, for reduce time, it'll be here] -->
	@push('styles')
	@endpush

	<x-slot name="header">
		<h2 class="h4 font-weight-bold">
			{{ __('Edit Category') }}
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
			<h2>Editar la Categoría</h2>

			<form action="{{ route('updateCategory', $category->id) }}" method="POST" enctype="multipart/form-data">
				@csrf
				@method('PATCH')
				<div class="row">
					<div class="col-md-10 mb-3">
						<div class="form-group">
							<label for="name">Nombre de la Categoria</label>
							<input type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ $category->name }}" placeholder="Nombra la nueva categoria..." autocomplete="name" autofocus>
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
								<input class="form-check-input @error('active') is-invalid @enderror" type="checkbox" name="active" autocomplete="active" @if($category->active) checked @endif>
								<label class="form-check-label" for="active"></label>
							</div>
							@error('active')
							<span class="invalid-feedback" role="alert">
								<strong>{{ $message }}</strong>
							</span>
							@enderror
						</div>
					</div>
					<div class="col-12 d-grid gap-2 d-md-flex justify-content-md-end">
						<a class="btn btn-outline-secondary " href="{{ route('categories') }}"> <i class="fa fa-angle-left"></i> Cancelar </a>
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