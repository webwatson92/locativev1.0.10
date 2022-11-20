<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>{{ config('app.name') }}</title>
    
    <style>

      *{
      padding: 0;
      border: none;
      outline: none;
      }

      .header{
          position: relative;
          width: 30%;
          margin: 0 auto;
      }

      .header img{
          width: 100%;
          object-fit: cover;
      }

      .imprimer{
          position: fixed;
          right: 6%;
          background: #888;
          color: #fff;
          padding: .5em;
          border-radius: .1em;
          text-decoration: none;
          font-size: 1.2em;
      }

      .imprimer:focus{
          background: #333;
      }

      .table{
          position: relative;
          width: 90%;
          margin: 0 auto;
          top: 3em;
          text-align: center;
      }

      .table .title{
          color: #888;
      }

      .table .liste{
          width: 100%;
          padding: .1em;
      }

      .table .liste thead th{
          color: #fff;
          background-color: rgb(5, 2, 39);
          padding: .5em 0;
          border: .1em solid #aaa;
          
      }

      .table .liste tbody td{
          color: #333;
          padding: .5em;
          border: .1em solid #333;
      }

      .footer{
          position: fixed;
          width: 40%;
          margin: 0 auto;
          right: 0%;
          left: 0%;
          bottom: 0;
      }

      .footer img{
          width: 100%;
          object-fit: cover;
      }

    </style>
</head>
<body>  
    <section class="table">
      <h2 class="title" style="text-align: center">Liste des clients</h2> <a href="{{ route('client.pdf') }}">Imprimer</a>
      <div class="card-body px-0 pb-2">
        <div class="table-responsive p-0">
            <table class="liste">
              <thead>
                <tr>
                  <th class="">Code</th>
                  <th class="">Client</th>
                  <th class="">Reg. commerce</th>
                    <th class="">N° Taxe</th>
                    <th class="">N° Tel</th>
                    <th class="">Adresse</th> 
                    <th class="">Email</th> 
                    <th class="">Quartier</th> 
                    <th class="">Ville</th> 
                    <th class="">Pays</th> 
                    <th class="">Société</th> 
                    <th class="">Gerant</th> 
                    <th class="">Note</th> 
                </tr>
              </thead>
              <tbody> 
                <tr>
                  @foreach($user as $u)
                    @foreach ($u->clients as $item)
                    <tr>
                      <td  class="nowrap">{{$item->code}}</td>
                      <td  class="nowrap">{{$item->libelle}}</td>
                      <td  class="nowrap">{{$item->reg_commerce}}</td>
                      <td  class="nowrap">{{$item->numero_tel}}</td>
                      <td  class="nowrap">{{$item->numero_taxe}}</td>
                      <td  class="nowrap">{{$item->adresse}}</td>
                      <td  class="nowrap">{{$item->email}}</td>
                      <td  class="nowrap">{{$item->quartier->libelle}}</td>
                      <td  class="nowrap">{{$item->ville->libelle}}</td>
                      <td  class="nowrap">{{$item->pays->libelle}}</td>
                      <td  class="nowrap">{{$item->societe->libelle}}</td>
                      <td  class="nowrap">{{$u->name}}</td>
                      <td  class="nowrap">{{$item->note}}</td>
                    </tr>
                    @endforeach
                  @endforeach
                </tr>
              </tbody>
            </table>
        </div>
      </div>
    </section>
</body>
</html>