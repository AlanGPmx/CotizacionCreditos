<x-app-layout>
    <!-- Styles for this view [Could be better, for reduce time, it'll be here] -->
    @push('styles')
    <link href="https://cdn.jsdelivr.net/npm/vanilla-datatables@latest/dist/vanilla-dataTables.min.css" rel="stylesheet" type="text/css">
    @endpush

    <x-slot name="header">
        <h2 class="h4 font-weight-bold">
            {{ __('Categories') }}
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
        <div class="col-md-12 mb-4">
            <button class="btn btn-outline-primary btn-block" id="addCategoryButton"> Agregar nueva categoria </button>
        </div>
        <div class="col-md-8 offset-2">
            <h2>Listado de Categorias</h2>

            <table id="tableCategories" class="display" style="width:100%">
                <thead>
                    <tr>
                        <th width="70%">Nombre</th>
                        <th width="15%">Estado</th>
                        <th width="15%">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($categories as $category)
                    <tr>
                        <td width="70%"> {{ $category->name }} </td>
                        <td width="15%" class="text-center">
                            <div class="form-check form-switch form-switch-md m-2">
                                <input class="form-check-input" type="checkbox" name="statusItem" data-id="{{ $category->id }}" autocomplete="statusItem" @if($category->active) checked @endif>
                                <label class="form-check-label" for="active"></label>
                            </div>
                        </td>
                        <td width="15%">
                            <a class="btn btn-sm btn-outline-secondary" href="{{ route('editCategory', $category->id) }}"><i class="fa fa-pencil-alt"></i></a>
                            <button class="btn btn-sm btn-outline-danger" name="deleteItem" data-id="{{ $category->id }}"><i class="fa fa-trash-alt"></i></button>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <!-- #modal-AgregarCategoria -->
    @include('application.categories.add')

    <!-- Scripts for this view [Could be better, for reduce time, it'll be here] -->
    @push('scripts')
    <script src="https://cdn.jsdelivr.net/npm/vanilla-datatables@latest/dist/vanilla-dataTables.min.js" type="text/javascript"></script>
    <script>
        // Open Modal with toggle
        let modalAddCategory = new bootstrap.Modal(document.getElementById('modal-AgregarCategoria'));
        let modalDomElement = document.getElementById('addCategoryButton');

        modalDomElement.addEventListener("click", (event) => {
            modalAddCategory.toggle();
        });

        modalDomElement.addEventListener('shown.bs.modal', (event) => {
            console.log('ok');
        })

        //Vanilla-DataTables
        let table = new DataTable('#tableCategories');

        //Delete
        $("[name='deleteItem']").on('click', function(e) {
            let idElement = $(this).data('id');
            let token = "{{ csrf_token() }}";

            Swal.fire({
                title: '¿Estás seguro?',
                text: 'Estás borrando una categoría. Esta acción es irreversible y no podremos recuperarlo una vez borrado.',
                icon: 'info',
                showCancelButton: true,
                focusCancel: true,
                confirmButtonText: 'Sí, estoy seguro',
                cancelButtonText: 'Cancelar',
            }).then((result) => {
                if (result.isConfirmed) {
                    Swal.fire({
                        title: `Borrando...`,
                        didOpen: () => {
                            Swal.showLoading();
                            $.ajax({
                                url: '/categories/' + idElement,
                                type: 'DELETE',
                                data: {
                                    _token: token,
                                },
                                cache: false
                            }).done(function(respuesta) {
                                (respuesta) ? location.reload(): console.log(respuesta);
                            }).fail(function(xhr, status, error) {
                                console.log('Error: ' + error + ' | Status:' + status);
                            });
                        }
                    })
                }
            });
        });

        //Change Status: Active
        $("[name='statusItem']").on('change', function(e) {
            let idElement = $(this).data('id');
            let token = "{{ csrf_token() }}";
            let futureStatus = ($(this).is(':checked')) ? 1 : 0;

            $.ajax({
                url: '{{ route("updateStatusCategory") }}',
                type: 'POST',
                data: {
                    _token: token,
                    id: idElement,
                    newStatus: futureStatus
                },
                cache: false
            }).done(function(respuesta) {
                if (respuesta) {
                    $.gritter.add({
                        title: 'Estatus actualizado correctamente',
                        time: '2000',
                        before_open: function() {
                            if ($('.gritter-item-wrapper').length == 2) {
                                return false;
                            }
                        }
                    });
                }
            }).fail(function(xhr, status, error) {
                console.log('Error: ' + error + ' | Status:' + status);
            });
        });
    </script>
    @endpush
</x-app-layout>