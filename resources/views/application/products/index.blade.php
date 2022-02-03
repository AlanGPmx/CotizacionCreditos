<x-app-layout>
    <x-slot name="header">
        <h2 class="h4 font-weight-bold">
            {{ __('Products') }}
        </h2>
    </x-slot>

    <div class="row">
        <div class="col-md-12 mb-4">
            <button class="btn btn-outline-primary btn-block" id="addProductButton"> Agregar nuevo producto </button>
        </div>
        <div class="col-md-12">
            <h2>Listado de Productos</h2>
        </div>
    </div>

    <!-- #modal-AgregarProducto -->
    @include('application.products.add')

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

        // Open Modal with toggle
        var modalAddProduct = new bootstrap.Modal(document.getElementById('modal-AgregarProducto'))

        document.querySelector('#addProductButton').addEventListener("click", (event) => {
            modalAddProduct.toggle()
        });
    </script>
    @endpush
</x-app-layout>