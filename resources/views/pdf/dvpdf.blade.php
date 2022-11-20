<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>{{ config('app.name') }}</title>
</head>
<body>  
    <section>
      <h2 class="title" style="text-align: center">Liste des clients</h2> <a href="{{ route('client.pdf') }}">Imprimer</a>
      <div class="card-body px-0 pb-2">
        <div class="table-responsive p-0">
            @if($dv->count())
            <table class="table pt-0 table-striped table-bordered">
            <thead>
                <tr>
                <th scope="col">Code</th> 
                <th scope="col">Nom du document</th>
                <th scope="col">Date d'établissement</th>
                <th scope="col">Date validation</th>
                <th scope="col">Valeur (PU)</th>
                <th scope="col">Date fin</th>
                <th scope="col">Société</th> 
                <th scope="col">Véhicule</th> 
                <th scope="col">Gerant</th> 
                </tr>
            </thead>
            <tbody> 
                @foreach($dv as $item)
                <tr>
                <td  class="nowrap">{{$item->code}}</td>
                <td  class="nowrap">{{$item->libelle}}</td>
                <td  class="nowrap">{{$item->date_etablissement}}</td>
                <td  class="nowrap">{{$item->date_validation}}</td>
                <td  class="nowrap">{{$item->valeur}} Fcfa</td>
                <td  class="nowrap">{{$item->date_fin}}</td>
                <td  class="nowrap">{{$item->societe->libelle}}</td>
                <td  class="nowrap">{{$item->vehicule->libelle}}</td>
                <td  class="nowrap">{{$item->user->name}}</td>
                </tr>
                @endforeach
            </tbody>
            </table>
            @endif
        </div>
      </div>
    </section>
</body>
</html>