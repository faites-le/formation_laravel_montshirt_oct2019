@extends('backend')

@section('content')
    <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            <h1 class="h2">Gestion des commandes</h1>

        </div>
        <div class="table-responsive">
            <table class="table table-bordered table-sm">
                <thead>
                <tr>
                    <th>ID</th>
                    <th>Date</th>
                    <th>Nom et Prénom</th>
                    <th>Code Postal</th>
                    <th>TOTAL TTC</th>
                    <th>Actions</th>
                </tr>
                </thead>
                <tbody>
                @foreach($commandes as $commande)
                <tr>
                    <td>{{$commande->id}}</td>
                    <td>{{$commande->created_at}}</td>
                    <td>{{$commande->user->name}}</td>
                    <td>{{$commande->adresse->code_postal}}</td>
                    <td>{{number_format($commande->total_ttc,2)}} €</td>
                    <td>
                        <a href="{{route('backend_commande_show',['id'=>$commande->id])}}"
                           class="btn btn-sm btn-primary">Voir</a>
                    </td>
                </tr>
                @endforeach
                </tbody>
            </table>
            {{$commandes->links()}}
        </div>
    </main>
@endsection
