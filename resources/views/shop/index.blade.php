{{-- Héritage du template parent --}}
@extends('shop')

@section('content')
    <main role="main">

        <section class="py-5 text-center">
            <div class="container">
                <h1 class="jumbotron-heading">Commandez  votre <br><span class="badge badge-light">nouveau</span> <br>T-Shirt <span class="badge badge-primary ">préféré </span>!</h1>
                <p class="lead text-muted">Dénichez THE T-Shirt de votre série, films préféré(e).</p>

            </div>
        </section>

        <div class="album py-5 bg-light">
            <div class="container">

                <div class="row">
                    @foreach($produits as $produit)
                        <div class="col-md-4">
                            <div class="card mb-4 box-shadow">
                                <a href="{{route('view_product',['id'=>$produit->id])}}">
                                <img src="{{asset('storage/uploads/'.$produit->photo_principale)}}"
                                     class="card-img-top img-fluid" alt="Responsive image">
                                </a>
                                <div class="card-body">
                                    <p class="card-text">{{$produit->nom}} <br>{{$produit->description}} </p>
                                    @if($produit->categorie)
                                    <a href="{{ route('view_by_cat',['id'=>$produit->categorie->id]) }}">
                                        <span class="badge badge-primary">{{$produit->categorie->nom}}</span>
                                    </a>
                                    @endif
                                    <div class="d-flex justify-content-between align-items-center">
                                        <span class="price">{{$produit->prixTTC() }} €</span>
                                        <a href="{{route('view_product',['id'=>$produit->id])}}" class="btn btn-sm
                                        btn-outline-secondary"><i
                                                class="fas
                                        fa-eye"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>

    </main>

@endsection
