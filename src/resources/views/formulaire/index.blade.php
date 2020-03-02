@extends('layouts.app')

@section('content')


<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
            <div class="card-header"><h1>Formulaires</h1></div>
                <table>     
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Owner</th>
                            <th>Open date</th>
                            <th>End date</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>

                        @foreach($formulaires as $formulaire)
                            <tr>
                                <td>{{ $formulaire->name }}</td>
                                <td>{{ $formulaire->user->name }}</td>
                                <td>{{ $formulaire->open_on }}</td>
                                <td>{{ $formulaire->close_on }}</td>
                                <td><a href="{{ route('formulaires.show', ['formulaire' => $formulaire->id]) }}">Voir Plus</a></td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>


@endsection
