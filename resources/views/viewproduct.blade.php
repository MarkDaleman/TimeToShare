@extends('layouts.app')

@section('content')
    <div class="container">

        {{--<script src="{{ asset('js/jquery.min.js') }}"></script>--}}
        {{--<script src="{{ asset('js/moment.js') }}"></script>--}}


        {{--@if(Session::has('status'))--}}
            {{--<p class="alert {{ Session::get('alert-class', 'alert-info') }}">{{ Session::get('status') }}</p>--}}
        {{--@endif--}}

        <div class="row justify-content-center">
            <div class="col-md-8">

                <div class="card">
                    <div class="card-header">Alle Product(en)</div>
                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success">
                                {{ session('status') }}
                            </div>
                        @endif
                            <table class="table table-inverse">
                                <thead>
                                <tr>
                                    <th>Productnaam</th>
                                    <th>Wie heeft het op het moment</th>
                                    <th>Share Status</th>
                                    <th>Product terug?</th>
                                </tr>
                                </thead>
                                <tbody>

                                @foreach ($products as $product)
                                <tr>
                                    <td>{{$product->product_name}} <br/> id: {{$product->id}}</td>
                                    <td>{{$product->share_holder->name}}</td>
                                    @if ($product->share_status === 0)
                                        <td>Not accepted</td>
                                    @elseif ($product->share_status === 1)
                                        <td>Accepted</td>
                                    @endif

                                    @if ($product->product_returned === 0)
                                        <td>Product weg</td>
                                    @elseif ($product->product_returned === 1)
                                        <td>Product terug</td>
                                    @endif

                                </tr>
                                @endforeach
                                </tbody>
                            </table>
                    </div>
                </div>

                <br />
                <div class="card">
                    <div class="card-header">Verzoeken</div>
                    <div class="card-body">
                        <table class="table table-inverse">
                            <thead>
                            <tr>
                                <th>Productnaam</th>
                                <th>Eigenaar</th>
                                <th>Accepteren?</th>
                            </tr>
                            </thead>
                            <tbody>

                            @foreach ($verzoeken as $verzoek)
                                <tr>
                                    <td>{{$verzoek->product_name}} <br/> id: {{$verzoek->id}}</td>
                                    <td>{{$verzoek->owner->name}}</td>
                                    <td>


                                        {{--<button href="{{ URL::route('accept-product', $verzoek->id) }}" type="button" class="btn btn-primary">Accepteren</button>--}}

                                        <a href="{{ URL::route('accept-product', $verzoek->id) }}">Accepteren</a>

                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>

                <br />


                <div class="card">
                    <div class="card-header">Producten Geaccepteerd</div>
                    <div class="card-body">
                        <table class="table table-inverse">
                            <thead>
                            <tr>
                                <th>Productnaam</th>
                                <th>Wie heeft hem</th>
                                <th>Product Terug</th>
                            </tr>
                            </thead>
                            <tbody>

                            @foreach ($prod_accepted as $accepted_products)
                                <tr>
                                    <td>{{$accepted_products->product_name}}</td>
                                    <td>{{$accepted_products->share_holder->name}}</td>
                                    <td>

                                        {{--<button href="{{ URL::route('return-product', $accepted_products->id) }}" type="button" class="btn btn-primary">Terug</button>--}}

                                        <a href="{{ URL::route('return-product', $accepted_products->id) }}">Terug</a>


                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                <br />



                <div class="card">
                    <div class="card-header">Producten geleend op dit moment</div>
                    <div class="card-body">
                        <table class="table table-inverse">
                            <thead>
                            <tr>
                                <th>Prodcutnaam</th>
                                <th>Product is van</th>
                                <th>Hoelang al</th>
                            </tr>
                            </thead>
                            <tbody>

                            @foreach ($uitgeleend as $verzoek)
                                <tr>
                                    <td>{{$verzoek->product_name}}</td>
                                    <td>{{$verzoek->owner->name}}</td>
                                    <td>
                                        {{--{{$verzoek->updated_at->format('Ymd H:m:s')}}--}}


                                        <script>
                                            moment.locale('nl');
                                            document.write(moment("{{$verzoek->updated_at->format('Ymd H:m:s')}}", "YYYYMMDD h:mm:ss").fromNow()).zone("+01:00");
                                        </script>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>

                <br />





                <div class="card">
                    <div class="card-header">Producten die geannulleerd zijn op dit moment</div>
                    <div class="card-body">
                        <table class="table table-inverse">
                            <thead>
                            <tr>
                                <th>Prodcutnaam</th>
                            </tr>
                            </thead>
                            <tbody>

                            @foreach ($prod_geannuleerd as $product)
                                <tr>
                                    <td>{{$product->product_name}}</td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>

                <br />


            </div>
        </div>
    </div>




@endsection

@section('script')


    {{--<script type="text/javascript">--}}
        {{--$(document).ready(function() {--}}
            {{--now = moment("20180319", "YYYYMMDD").fromNow();--}}
            {{--alert(now);--}}
        {{--});--}}
    {{--</script>--}}

    @endsection

