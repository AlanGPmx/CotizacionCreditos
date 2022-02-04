<x-app-layout>
    <x-slot name="header">
        <h2 class="h4 font-weight-bold">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="row" id="searchResults">
        <div class="col-12 mb-1">
            <form action="{{ route('dashboard') }}" method="get">
                <div class="input-group mb-3">
                    <input type="text" minlength="1" pattern=".{1,}" required class="form-control form-control-lg" id="q" name="q" placeholder="Buscar por el nombre del producto o su código SKU..." @if (Request::get('q')) value="{{ Request::get('q') }}" @endif>
                    <button class="btn btn-outline-warning" type="submit"><i class="fa fa-search"></i> Buscar</button>
                </div>
            </form>
        </div>
        @if (Request::get('q'))
        <div class="col-12 mb-3">
            <h2>Resultados: {{ count($results)}} </h2>
        </div>
        <div class="col-12">
            <div class="row">
                @foreach ($results as $result)
                <!-- Producto -->
                <div class="col-md-6">
                    <img src="{{ asset('/images/products/'.$result->image) }}" width="100%" height="auto" alt="">
                </div>
                <div class="col-md-6 mt-3">
                    <div class="row">
                        <div class="col-12">
                            <h2>{{ $result->name }}</h2>
                            <small class="text-muted">Código SKU: {{ $result->sku }}</small>
                            <hr class="my-3">
                            <h5 class="text-decoration-underline">Descripción</h5>
                            <span>Lorem ipsum dolor sit amet consectetur adipisicing elit. Nostrum dolores maxime numquam autem natus error cupiditate quae, debitis iste voluptatum fugit perspiciatis totam, voluptatibus accusamus aliquid molestiae enim illo dolorem dolore minima. Mollitia, dolorum suscipit. Error vitae aut ullam nesciunt excepturi impedit nulla, ipsa quisquam necessitatibus adipisci recusandae mollitia velit?</span>

                            <hr class="my-2">
                        </div>
                        <div class="col-12">
                            <span class="mt-3">
                                <p>Elegir un plazo:
                                    <select class="form-select" data-id="{{ $result->id }}" name="chooseWeeksDeadline2Pay">
                                        <option value="" disabled selected>Elegir un nuevo plazo a cotizar...</option>
                                        @foreach ($weeks as $week)
                                        <option value="{{ $week->id }}">{{ $week->number }} semanas</option>
                                        @endforeach
                                    </select>
                                </p>
                            </span>
                        </div>
                        <div class="col-12 row" name="showPrice_{{ $result->id }}" style="display:none">
                            <div class="col-sm-7 mt-3">
                                <span class="text-danger fw-bold" style="margin-top:15px;">Llévatelo con </span> <img src="https://dh3yyy4wyj8lf.cloudfront.net/ekt-storefront/img-sites/components-io/Credito_text-credito.svg">
                                <br>
                                @if ( !is_null($result->discount))
                                <span class="fs-6 fw-light text-decoration-line-through text-muted" style="font-weight:200" id="ostandar_{{ $result->id }}"></span>
                                <br>Abono Normal:<br>
                                <span class="fs-2" style="font-weight:900" id="fstandar_{{ $result->id }}"></span> <span class="text-muted"><small>&nbsp;&nbsp;semanales*</small></span>
                                <br><br>
                                <span class="fs-6 fw-light text-decoration-line-through text-muted" style="font-weight:200" id="opunctual_{{ $result->id }}"></span><br>
                                Abono Puntual:<br>
                                <span class="fs-2" style="font-weight:900" id="fpunctual_{{ $result->id }}"></span> <span class="text-muted"><small>&nbsp;&nbsp;semanales*</small></span>
                                @else
                                Abono Normal:<br>
                                <span class="fs-2" style="font-weight:900" id="ostandar_{{ $result->id }}"></span> <span class="text-muted"><small>&nbsp;&nbsp;semanales*</small></span>
                                <br><br>
                                Abono Puntual:<br>
                                <span class="fs-2" style="font-weight:900" id="opunctual_{{ $result->id }}"></span> <span class="text-muted"><small>&nbsp;&nbsp;semanales*</small></span>
                                @endif
                            </div>
                            <div class="col-md-1 d-flex" style="height: 205px;">
                                <div class=" vr"></div>
                            </div>
                            <div class="col-sm-4 mt-3 text-center">
                                <span class="text-secondary fw-light" style="margin-top:15px;">Precio de Contado</span>
                                <br>
                                @if ( !is_null($result->discount))
                                <span class="fs-6 fw-light text-decoration-line-through text-muted" style="font-weight:200;" id="oprice_{{ $result->id }}"></span>
                                <br>
                                <span class="fs-3" style="font-weight:500;" id="fprice_{{ $result->id }}"></span>
                                @else
                                <span class="fs-3" style="font-weight:500;" id="oprice_{{ $result->id }}"></span>
                                @endif

                                <p class="mt-2 text-muted"><i class="fa fa-shield-alt"></i> Tu compra esta 100% protegida</p>
                                <a style="text-decoration:none;" href="https://solicitudcredito.bancoazteca.com.mx/SolicitudCreditoBaz/Nuevo/clienteNuevo?utm_source=ekt&utm_medium=home_banner&utm_campaign=cinmediato"><span class="text-danger fw-bold" style="margin-top:15px;">Tramita hoy tu</span> <img src="https://dh3yyy4wyj8lf.cloudfront.net/ekt-storefront/img-sites/components-io/Credito_text-credito.svg"></a>
                            </div>
                            <div class="col-12">
                                <p><small class="text-muted fw-light" style="font-size: 11px">* Sujeto a aprobación de crédito.</small></p>
                            </div>
                        </div>

                    </div>
                </div>
                <!-- Fin del Producto -->
                <div class="col-12">
                    <hr class="my-5">
                </div>
                @endforeach
            </div>
        </div>
        @else
        <!-- Inicio -->
        <div class="col-md-12 text-center">
            <h2 class="text-muted">¡Realiza una búsqueda ahora!</h2>
        </div>
        <!-- Fin de Inicio -->
        @endif

    </div>

    <!-- Scripts for this view [Could be better, for reduce time, it'll be here] -->
    @push('scripts')
    <script src="https://cdn.jsdelivr.net/npm/vanilla-datatables@latest/dist/vanilla-dataTables.min.js" type="text/javascript"></script>
    <script>
        //Discount
        $('[name="chooseWeeksDeadline2Pay"]').on('change', function() {
            let idProd = $(this).data('id');
            let weeksID = $(this).val();
            let token = "{{ csrf_token() }}";

            $('[name=showPrice_' + idProd + ']').show();

            $.ajax({
                url: "{{ route('calcItemPay') }}",
                type: 'POST',
                data: {
                    _token: token,
                    idProd: idProd,
                    idWeeks: weeksID
                },
            }).done(function(respuesta) {
                /* respuesta = jQuery.parseJSON(respuesta); */
                console.log(respuesta);

                //De contado
                $('#oprice_' + idProd).html('$ ' + respuesta['original']['price']);
                if (!jQuery.isEmptyObject(respuesta['final'])) {
                    $('#fprice_' + idProd).html('$ ' + respuesta['final']['price']);
                }

                //Semanales
                $('#ostandar_' + idProd).html('$ ' + respuesta['original']['standarPay']);
                $('#opunctual_' + idProd).html('$ ' + respuesta['original']['punctualPay']);
                if (!jQuery.isEmptyObject(respuesta['final'])) {
                    $('#fstandar_' + idProd).html('$ ' + respuesta['final']['standarPay']);
                    $('#fpunctual_' + idProd).html('$ ' + respuesta['final']['punctualPay']);
                }

            }).fail(function(xhr, status, error) {
                console.log('Error: ' + error + ' | Status:' + status);
            });
        });
    </script>
    @endpush
</x-app-layout>