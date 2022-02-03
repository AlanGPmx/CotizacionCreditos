<x-app-layout>
    <x-slot name="header">
        <h2 class="h4 font-weight-bold">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="row" id="searchResults">
        <div class="col-12 mb-3">
            <div class="input-group mb-3">
                <input type="text" class="form-control form-control-lg" id="q2Search" placeholder="Buscar por el nombre del producto o su código SKU...">
                <button class="btn btn-outline-warning" type="button" id="doSearch"><i class="fa fa-search"></i> Buscar</button>
            </div>
        </div>
        <div class="col-md-6">
            <img src="{{ asset('/images/products/imageProduct31048675.png') }}" width="100%" height="auto" alt="">
        </div>
        <div class="col-md-6 mt-3">
            <div class="row">
                <div class="col-12">
                    <h2>Nombre del Articulo</h2>
                    <small class="text-muted">Código SKU: </small>
                    <hr class="my-3">
                    <h5 class="text-decoration-underline">Descripción</h5>
                    <span>Lorem ipsum dolor sit amet consectetur adipisicing elit. Nostrum dolores maxime numquam autem natus error cupiditate quae, debitis iste voluptatum fugit perspiciatis totam, voluptatibus accusamus aliquid molestiae enim illo dolorem dolore minima. Mollitia, dolorum suscipit. Error vitae aut ullam nesciunt excepturi impedit nulla, ipsa quisquam necessitatibus adipisci recusandae mollitia velit?</span>

                    <hr class="my-2">
                </div>
                <div class="col-sm-8 mt-3">
                    <span class="text-danger fw-bold" style="margin-top:15px;">Llévatelo con tú</span> <img src="https://dh3yyy4wyj8lf.cloudfront.net/ekt-storefront/img-sites/components-io/Credito_text-credito.svg">
                    <br>
                    @if (true)
                    <span class="fs-6 fw-light text-decoration-line-through text-muted" style="font-weight:200">$ 319</span>
                    <br>
                    @endif
                    <span class="fs-1" style="font-weight:900">$ 279</span> <span class="text-muted"><small>&nbsp;&nbsp;semanales*</small></span>
                </div>

                <div class="col-sm-4 mt-3">
                    <span class="text-secondary fw-light" style="margin-top:15px;">Precio de Contado</span>
                    <br>
                    @if (true)
                    <span class="fs-6 fw-light text-decoration-line-through text-muted" style="font-weight:200;">$ 19,999</span>
                    <br>
                    @endif
                    <span class="fs-2" style="font-weight:500;">$ 17,999</span>
                </div>
                <div class="col-12">
                    <p><small class="text-muted fw-light" style="font-size: 11px">* Abonos calculados a 96 semanas con 20% de enganche. Sujeto a aprobación de crédito.</small></p>
                    <span class="mt-3">
                        <p>Elegir otro plazo:
                            <select class="form-select" name="" id="">
                                <option value="" selected>Elegir un nuevo plazo a cotizar...</option>
                            </select>
                        </p>
                    </span>
                </div>
            </div>

        </div>
    </div>

</x-app-layout>