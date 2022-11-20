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
            <table class="table align-items-center mb-0">
              <thead>
                <tr>
                  <th class="">Code</th>
                  <th class="">Client</th>
                </tr>
              </thead>
              <tbody> 
                <tr>
                  @foreach($te as $item)
                    <tr>
                      <td  class="nowrap">{{$item->code}}</td>
                      <td  class="nowrap">{{$item->libelle}}</td>
                    </tr>
                  @endforeach
                </tr>
              </tbody>
            </table>
        </div>
      </div>
    </section>
</body>
</html>