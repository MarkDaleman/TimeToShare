@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif


                        <p>{{(Auth::user()->name)}},  You are logged in!</p>
                        <p>You have the following user role: {{(Auth::user()->role()->value('name'))}}</p>

                        @if(Auth::user()->active === 1)

                <p>Je gebruikeraccount is actief</p>

                            @endif


                        @if(Auth::user()->active === 0)

                            <p>Je gebruikeraccount staat op non-actief</p>

                        @endif



                </div>
            </div>
        </div>
    </div>
</div>
@endsection
