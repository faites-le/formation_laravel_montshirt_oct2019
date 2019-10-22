@extends('backend')
@section('content')
<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            <h1 class="h2">Modifier le tag {{$tag->nom}}</h1>
            <div class="btn-toolbar mb-2 mb-md-0">
                <div class="btn-group mr-2">
                    <button class="btn btn-sm btn-outline-secondary">Lister</button>
                </div>
                <a href="{{route('backend_tags_add')}}" class="btn btn-sm btn-outline-secondary">
                    <span data-feather="calendar"></span>
                    Nouveau
                </a>
            </div>
        </div>
        <form action="{{route('backend_tags_update',['id'=>$tag->id])}}" method="POST">
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
                    <label for="nom">Nom du tag</label>
                    <input type="text" class="form-control" id="nom" name="nom" value="{{$tag->nom}}">
                </div>
            </div>
            <button type="submit" class="btn btn-primary">Valider</button>
        </form>
</main>
@endsection
