@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Add Product Page</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success">
                                {{ session('status') }}
                            </div>
                        @endif


                        <p>Door het formulier hieronder in te vullen kan je een product toevoegen en met iemand anders delen.</p>

                            <form action="{{ url('/addproduct/post') }}" method="post">
                                <div class="form-group">
                                    <input type="text" class="form-control" id="product_name" name="product_name" placeholder="Productnaam">

                                <br />
                                    <input type="text" class="form-control" id="search" name="search" placeholder="Gebruiker zoeken">
                                </div>
                                <button type="submit" class="btn btn-primary">Submit</button>
                                <input type="hidden" name="_token" value="{{ Session::token() }}">
                            </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.js"></script>
    <script src="http://twitter.github.io/typeahead.js/releases/latest/typeahead.bundle.js"></script>
    <!-- Initialize typeahead.js on the input -->
    <script>
        $(document).ready(function() {
            var bloodhound = new Bloodhound({
                datumTokenizer: Bloodhound.tokenizers.whitespace,
                queryTokenizer: Bloodhound.tokenizers.whitespace,
                remote: {
                    url: '/user/find?q=%QUERY%',
                    wildcard: '%QUERY%'
                },
            });

            $('#search').typeahead({
                hint: true,
                highlight: true,
                minLength: 2
            }, {
                name: 'users',
                source: bloodhound,
                display: function(data) {
                    return data.name  //Input value to be set when you select a suggestion.
                },
                templates: {
                    empty: [
                        '<div class="list-group search-results-dropdown"><div class="list-group-item">Nothing found.</div></div>'
                    ],
                    header: [
                        '<div class="list-group search-results-dropdown">'
                    ],
                    suggestion: function(data) {
                        return '<div style="font-weight:normal; margin-top:-10px ! important;" class="list-group-item">' + data.name +'</div></div>'
                    }
                }
            });
        });
    </script>

@endsection
