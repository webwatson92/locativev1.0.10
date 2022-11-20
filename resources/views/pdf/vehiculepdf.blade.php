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
            @if($vehicule->count())
            <table class="table pt-0 table-striped table-bordered">
            <thead>
                <tr>
                    <th scope="col">Code</th>
                    <th scope="col">Libéllé</th>
                    <th scope="col">Date d'acquisition</th>
                    <th scope="col">Date cession</th>
                    <th scope="col">PU</th>
                    <th scope="col">Puissance</th> 
                    <th scope="col">Type véhicule</th> 
                    <th scope="col">Type énergie</th> 
                    <th scope="col">Boite vitesse</th> 
                    <th scope="col">Société</th> 
                    <th scope="col">Gerant</th> 
                    <th scope="col">KMC</th> 
                    <th scope="col">Date KMC</th>
                    <th scope="col">PVD</th>
                    <th scope="col">Date KMC 2</th>
                </tr>
            </thead>
            <tbody> 
                @foreach($vehicule as $item)
                <tr>
                <td  class="nowrap">{{$item->code}}</td>
                <td  class="nowrap">{{$item->libelle}}</td>
                <td  class="nowrap">{{$item->date_acquisition}}</td>
                <td  class="nowrap">{{$item->date_cession}}</td>
                <td  class="nowrap">{{$item->valeur}} Fcfa</td>
                <td  class="nowrap">{{$item->puissance}} W</td>
                <td  class="nowrap">{{$item->type_vehicule->libelle}}</td>
                <td  class="nowrap">{{$item->type_energie->libelle}}</td>
                <td  class="nowrap">{{$item->boite_vitesse->libelle}}</td>
                <td  class="nowrap">{{$item->societe->libelle}}</td>
                <td  class="nowrap">{{$item->user->name}}</td>
                <td  class="nowrap">{{$item->kmc}} KM</td>
                <td  class="nowrap">{{$item->dkmc}}</td>
                <td  class="nowrap">{{$item->pvd}} KM</td>
                <td  class="nowrap">{{$item->dkmc2}}</td>
                </tr>
                @endforeach
            </tbody>
            </table>
            {{$vehicule->links()}}
            @endif
        </div>
      </div>
    </section>
</body>
</html>