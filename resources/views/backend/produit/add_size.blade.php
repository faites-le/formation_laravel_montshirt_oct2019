@extends('backend')

@section('content')
    <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            <h1>Ajouter une taille au produit: {{$produit->nom}}</h1>
        </div>
        <form action="{{route('backend_produit_store_size',['id'=>$produit->id])}}" method="POST">
            @csrf
            <div class="row">
                <div class="col-12">
                    <label for="type_id">Séléctionnez un type de taille</label>
                    <select class="form-control change_type" data-id_produit="{{$produit->id}}" name="type_id"
                            id="type_id">
                        @foreach($types as $type)
                            <option value="{{$type->id}}">{{$type->nom}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="load_tailles"></div>
            <div class="form-group text-right">
                <hr>
                <input type="submit" value="valider" class="btn btn-dark">
            </div>
        </form>

        <h2>Tailles disponibles</h2>
        <div class="alert alert-success remove_reponse" style="display: none"></div>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Taille</th>
                    <th>Quantité</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
            @foreach($produit->tailles as $taille)
            <tr>
                <td>{{$taille->nom}}</td>
                <td>{{$taille->pivot->qte}}</td>
                <td>
                    <a href="#" class="btn btn-outline-danger btn-sm remove_size" data-id_produit="{{$produit->id}}"
                       data-id_taille="{{$taille->id}}">
                        Retirer la taille
                    </a>
                </td>
            </tr>
            @endforeach
            </tbody>
        </table>
    </main>
@endsection
