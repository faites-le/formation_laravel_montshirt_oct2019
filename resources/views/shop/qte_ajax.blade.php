@if($qte >0)
<label for="qte">Quantité</label>

<select name="qte" id="qte" class="form-control">
    @for($i=1;$i<=$qte;$i++)
        <option value="{{$i}}">{{$i}}</option>
    @endfor
</select>


<button class="btn btn-cart my-2 btn-block">
    <i class="fas fa-shopping-cart"></i>
    Ajouter au Panier
</button>
@else
    <button disabled class="btn btn-danger my-2 btn-block">
        <i class="fas fa-shopping-cart"></i>
        Rupture de stock !!
    </button>
@endif
