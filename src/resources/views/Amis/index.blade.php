@extends('layouts.app')


@section('content')

@php
    //Import de class User
    use App\User;
@endphp

    <link rel="stylesheet" type="text/css" href="{{ asset('/css/Amis_list.css') }}" >


    <div id="div_amis" class="container">

        <div id="div_add_friend">
            <form action="{{ route('Amis.store') }}" method="post">
                @csrf
                <label id="label_add_friend" for="input_friend_invite">Ajouter un amis:</label>
                <input id="input_friend_invite" class="form-control" type="text" name="name" placeholder="Pseudo ou Email" required>
                <input type="submit" placeholder="Envoyer demande" class="btn btn-success bouton-creation">
            </form>

        </div>
        <br>
        <table class="table table-striped">
            <tbody>
            @if(@isset($name))
                <!-- Si l'utilisateur n'a pas d'amis -->
                @unless($name)
                    <hr>
                    <h1 id="no_friend_msg">Vous n'avez pas d'amis pour le moment🙁</h1>
                @else
                    <!-- Sinon, on les affiche -->
                    @foreach ($name ?? '' as $data)
                        <tr id="friend-{{ User::where('name', $data)->first()->id }}">
                            <td>
                                <img alt="Amis-avatar" src="/Images/avatar/{{ User::where('name', $data)->first()->avatar }}" class="amis-avatar">
                            </td>
                            <td>
                                <h1 id="name_friend"> {{$data}} </h1>
                            </td>
                            <td>
                                <i id="btn_delete_friend" data-toggle="modal" data-target="#window_delete_friend-{{ User::where('name', $data)->first()->id }}" class="material-icons">delete</i>

                                <!-- Modèle confirmer suppression de l'ami -->
                                <div class="modal fade" id="window_delete_friend-{{ User::where('name', $data)->first()->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Confirmation</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <p id="text_confirmation_delete_friend">
                                                    Voulez-vous vraiment supprimer <strong>{{ User::where('name', $data)->first()->name }}</strong> de vos amis? cette action est irréversible.
                                                </p>
                                            </div>
                                            <div class="modal-footer">
                                                <form method="post" id="form_delete_friend">
                                                    <input type="hidden" name="id_ami" value="{{ User::where('name', $data)->first()->id }}">
                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Annuler</button>
                                                </form>
                                                <button type="button" class="btn btn-primary confirm_delete_friend" data-dismiss="modal" value="{{ User::where('name', $data)->first()->id }}">confirmer</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </td>
                        </tr>
                    @endforeach
                @endunless
            @endif
            </tbody>
        </table>
    </div>

@endsection

<!-- JQuery et Ajax-->
<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
<script src = "https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>

<!-- Scripts suppression amis -->
<script type="text/javascript" src="{{ URL::asset('js/Amis.js') }}"></script>

