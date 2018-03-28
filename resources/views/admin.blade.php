@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">

                <div class="card">
                    <div class="card-header">Alle Producten die uitgeleend zijn</div>
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
                                <th>Van wie is het?</th>
                                <th>Wie heeft het nu?</th>
                                <th>Voor hoe lang al?</th>
                                <th>Annuleren</th>
                            </tr>
                            </thead>
                            <tbody>

                            @foreach ($all_prod_accepted as $product)
                                <tr>
                                    <td>{{$product->product_name}} <br/> id: {{$product->id}}</td>
                                    <td>{{$product->owner->name}}</td>
                                    <td>{{$product->share_holder->name}}</td>
                                    <td>
                                        <script>
                                            moment.locale('nl')
                                            document.write(moment("{{$product->updated_at->format('Ymd H:m:s')}}", "YYYYMMDD h:mm:ss").fromNow());
                                        </script>

                                    </td>
                                    <td><a href="{{ URL::route('annuleer-product', $product->id) }}">Annuleren</a></td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>




@endsection


