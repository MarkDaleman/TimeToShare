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
                                    <th>id</th>
                                    <th>gebruikersnaam</th>
                                    <th>actief of niet</th>
                                    <th>non-actief zetten</th>
                                </tr>
                                </thead>
                                <tbody>

                                @foreach ($users as $product)
                                    <tr>
                                        <td>{{$product->id}}</td>
                                        <td>{{$product->name}}</td>
                                        <td>{{$product->active}}</td>
                                        <td><a href="{{ URL::route('annuleer-persoon', $product->id) }}">Persoon Blokkeren</a></td>
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


