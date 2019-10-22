@extends('shop')

@section('content')
<main role="main">
        <section class="py-5">
            <div class="container">
                <h1 class="jumbotron-heading"> <span class="badge badge-primary ">Votre panier </span></h1>
                @if(count($content) ==0)
                    <div class="container text-center">
                        <h1>Votre panier est vide</h1>
                        <img src="https://media.giphy.com/media/3o7bu7Xzqkq8K3MsUg/giphy.gif"
                             alt="votre panier est vide">
                    </div>
                @else
                <table class="table table-bordered table-responsive-sm">
                    <thead>
                    <tr>
                        <th>Produit</th>
                        <th>Qte</th>
                        <th>P.U TTC</th>
                        <th>Total TTC</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($content as $produit)
                    <tr>
                        <td>
                            <img style="float: left;margin-right: 10px" width="110" class="rounded-circle img-thumbnail"
                                 src="{{asset('storage/uploads/'.$produit['attributes']['photo']) }}"
                                 alt="">
                            <div style="margin-top: 25px;">
                                {{$produit['name']}} <br> @if($produit['attributes']['size']) <strong>Taille: </strong>
                                {{$produit['attributes']['size']->nom}}  @endif
                                <br>
                                <a href="{{route('remove_product_cart',['id'=>$produit['id']])}}">
                                    <i style="color:red" class="fa fa-trash"></i>
                                </a>
                            </div>
                        </td>
                        <td>
                            <form action="{{route('update_product_cart',['id'=>$produit['id']])}}" method="post">
                                @csrf
                            <input style="display: inline-block" name="qte" class="form-control col-sm-4"
                                   type="number"
                                   max="{{$produit['attributes']['qte_maxi']}}"
                                   value="{{$produit['quantity']}}">
                            <button class="pl-2 change_qte"> <i class="fas fa-sync"></i> </button>
                            </form>
                        </td>
                        <td>
                           {{$produit['attributes']['prix_ttc']}} €
                        </td>
                        <td>
           {{ number_format( $produit['attributes']['prix_ttc'] * $produit['quantity'] ,2 ) }} €
                        </td>
                    </tr>
                    @endforeach
                    </tbody>
                    <tfoot>
                    <tr>
                        <td colspan="2"></td>
                        <td>Total HT</td>
                        <td>{{number_format($total_ht_panier,2)}} €</td>
                    </tr>
                    <tr>
                        <td colspan="2"></td>
                        <td>TVA (20%)</td>
                        <td>{{number_format($tva,2)}} €</td>
                    </tr>
                    <tr>
                        <td colspan="2"></td>
                        <td>Total TTC</td>
                        <td>{{number_format($total_ttc_panier,2)}} €</td>
                    </tr>
                    </tfoot>
                </table>
                <a class="btn btn-block btn-outline-dark"
                   href="{{route('commande_identification')}}">Commander</a>
                @endif
            </div>
        </section>
    </main>
@endsection
