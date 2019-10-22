@extends('process')

@section('content')
    <main role="main">
        <div class="container">
            <div class="py-5 text-center">
                <i class="fab fa-4x fa-cc-visa"></i>
                <i class="fab fa-4x fa-cc-mastercard"></i>
                <h2>Paiement par Carte Bancaire</h2>
                <h4 class="mt-5">Total à régler: {{number_format($total_a_payer),2}} € TTC</h4>
            </div>
            <div class="row">
                <div class="col-md-12 order-md-1">
                    <button class="btn btn-warning btn-lg btn-block" type="submit">Accéder au paiement sécurisé</button>
                </div>
            </div>

            <div class="row">
                <div class="col-md-12 order-md-1">
                    <a href="{{route('commande_store')}}" class="btn btn-primary btn-lg btn-block mt-2" type="submit">
                       Effectuer un paiement par chèque</a>
                </div>
            </div>
        </div>
    </main>
@endsection
