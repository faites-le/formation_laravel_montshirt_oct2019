@extends('backend')

@section('content')
    <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            <h1 class="h2">Modifier un produit</h1>
            <div class="btn-toolbar mb-2 mb-md-0">
                <div class="btn-group mr-2">
                    <button class="btn btn-sm btn-outline-secondary">Lister les produits</button>
                </div>
                <button class="btn btn-sm btn-outline-secondary">
                    <span data-feather="calendar"></span>
                    Nouveau
                </button>
            </div>
        </div>
        <form action="{{route('backend_produit_update',['id'=>$produit->id])}}" method="post" enctype="multipart/form-data">
            @csrf
            @if($errors->any())
                <div class="alert alert-danger">
                    @foreach($errors->all() as $error)
                        <p>{{$error}}</p>
                    @endforeach
                </div>
            @endif
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="nom">Nom du produit</label>
                    <input type="text" class="form-control" id="nom" name="nom" value="{{$produit->nom}}">
                </div>
                <div class="form-group col-md-3">
                    <label for="prix_ht">PRIX H.T</label>
                    <input type="text" class="form-control" id="prix_ht" name="prix_ht" value="{{$produit->prix_ht}}">
                </div>
                <div class="form-group col-md-3">
                    <label for="qte">Quantité</label>
                    <input type="text" class="form-control" id="qte" name="qte" value="{{$produit->qte}}">
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-12">
                    <label for="description">Description</label>
                    <textarea type="text" class="form-control" name="description"
                              id="description">{{$produit->description}}</textarea>
                </div>
            </div>
            <div class="form-row">
                <div class="form-group">
                    <label for="photo_principale">Photo du produit</label>
                    <input type="file" class="form-control-file" id="photo_principale" name="photo_principale">
                </div>
                <div class="col-md-4">
                    <img width="100" class="img rounded-circle" style="border: 3px solid #5b64f1"
                         src="{{asset('storage/uploads/'.$produit->photo_principale)}}"
                         alt="">
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="category_id">Catégorie</label>
                    <select class="form-control form-control-lg" id="categorie_id" name="categorie_id" >
                        @foreach($categories as $categorie)
                            @if($produit->categorie && $produit->categorie->id == $categorie->id)
                                <option selected value="{{$categorie->id}}">{{$categorie->nom}}</option>
                        @else
                            <option value="{{$categorie->id}}">{{$categorie->nom}}</option>
                            @endif

                        @endforeach
                    </select>
                </div>
                <div class="form-group col-md-6">
                    <label for="tags">Tags</label>
                    <select multiple class="form-control" id="tags" name="tags[]">
                        @foreach($tags as $tag)
                            @if(in_array($tag->id,$tags_id))
                                <option selected value="{{$tag->id}}">{{$tag->nom}}</option>
                            @else
                                <option value="{{$tag->id}}">{{$tag->nom}}</option>
                            @endif
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-12">
                    <label for="produits_recommandes">Produits recommandés</label>
                    <select multiple class="form-control" name="produits_recommandes[]" id="produits_recommandes">
                        @foreach($produits as $produit)
                            @if(in_array($produit->id,$produit_recommandations))
                                <option selected value="{{$produit->id}}">{{$produit->nom}}</option>
                            @else
                                <option value="{{$produit->id}}">{{$produit->nom}}</option>
                            @endif
                        @endforeach
                    </select>
                </div>



            </div>

            <button type="submit" class="btn btn-primary">Valider</button>
        </form>
    </main>
@endsection
