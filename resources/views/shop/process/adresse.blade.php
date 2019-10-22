@extends('process')
@section('content')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">Panier</a></li>
            <li class="breadcrumb-item"><a href="#">Identification</a></li>
            <li class="breadcrumb-item active" aria-current="page">Adresse</li>
            <li class="breadcrumb-item"><a href="#">Paiement</a></li>
            <li class="breadcrumb-item"><a href="#">Merci</a></li>
        </ol>
    </nav>

    <main role="main">

        <div class="container">
            <div class="py-5 text-center">
                <i class="fas fa-4x fa-shipping-fast"></i>


                <h2>Votre adresse de livraison</h2>

            </div>

            <div class="row">

                <div class="col-md-12 order-md-1">
                    <form action="{{route('commande_store_adresse')}}" method="POST">
                        @csrf
                        @if($errors->any())
                            <div class="alert alert-danger">
                                @foreach($errors->all() as $error)
                                    <p>{{$error}}</p>
                                @endforeach
                            </div>
                        @endif
                        <div class="row">
                            <div class="col-md-3 mb-4">
                                <label for="prenom">Votre prénom</label>
                                <input type="text" class="form-control" id="prenom" name="prenom"
                                       value="{{$adresse->prenom ?? old('prenom')}}">
                            </div>
                            <div class="col-md-3 mb-4">
                                <label for="nom">Votre nom <span class="text-danger">*</span></label>
         <input type="text" class="form-control" id="nom" name="nom" value="{{$adresse->nom ?? old('nom')}}">
                            </div>
                            <div class="col-md-3 mb-4">
                                <label for="email">Votre email <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" id="email" name="email"
                                       value="{{$adresse->email  ?? old('email')}}">
                            </div>
                            <div class="col-md-3 mb-4">
                                <label for="telephone">Votre téléphone <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" id="telephone" name="telephone"
                                       value="{{$adresse->telephone ?? old('telephone')}}">
                            </div>
                        </div>

                        <div class="mb-3">
                            <label for="adresse">Votre adresse <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" id="adresse" name="adresse"
                                   value="{{$adresse->adresse ?? old('adresse')}}">
                        </div>

                        <div class="mb-3">
                            <label for="adresse2">Complément d'adresse<span class="text-muted">(Optional)</span></label>
                            <input type="text" class="form-control" id="adresse2" name="adresse2"
                                   value="{{$adresse->adresse2 ?? old('adresse2')}}">
                        </div>

                        <div class="row">
                            <div class="col-md-4 mb-4">
                                <label for="ville">Votre ville <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" id="ville" name="ville"
                                       value="{{$adresse->ville ?? old('ville')}}">
                            </div>

                            <div class="col-md-3 mb-3">
                                <label for="code_postal">Votre code postal <span class="text-danger">*</span></label>
                                <input autocomplete="off" type="text" class="form-control" id="code_postal"
                                       name="code_postal"
                                       value="{{$adresse->code_postal ?? old('code_postal')}}">
                            </div>

                            <div class="col-md-5 mb-3">
                                <label for="pays">Votre pays <span class="text-danger">*</span></label>
                                <select class="custom-select d-block w-100" id="pays" required name="pays">
                                    @foreach($pays as $code => $p)
<option @if(old('pays') == $code || (isset($adresse->pays) && $adresse->pays == $code))
                                    selected @endif
                                    value="{{$code}}">{{$p}}
</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <hr class="mb-4">
                        <button class="btn btn-outline-dark btn-lg btn-block" type="submit">Procéder au paiement</button>
                    </form>
                </div>
            </div>
            </div>

    </main>
@endsection
