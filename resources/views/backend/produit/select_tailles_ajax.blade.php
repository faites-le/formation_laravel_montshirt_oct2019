<div class="row">
    <div class="col-12">
        <label for="taille_id">Sélectionnez une taille</label>
        <select name="taille_id" id="taille_id" class="form-control">
            @foreach($tailles as $taille)
                @if(in_array($taille->id,$tailles_produit_ids))
                <option disabled value="{{$taille->id}}">{{$taille->nom}}</option>
                @else
                <option value="{{$taille->id}}">{{$taille->nom}}</option>
                @endif
            @endforeach
        </select>
    </div>
</div>
<div class="row">
    <div class="col-12">
        <label for="qte">Quantité</label>
        <input id="qte" type="number" min="0" class="form-control" name="qte">
    </div>
</div>
