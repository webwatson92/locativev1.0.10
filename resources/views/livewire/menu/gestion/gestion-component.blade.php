 <!-- menu onglets  -->

 <div class="col-lg-12 col-sm-12">
    <div class="white_card card_height_100 mb_30">
        <div class="white_card_header">
            <div class="box_header m-0">
                <div class="main-title">
                    <h3 class="m-0 text-bold">Gestion</h3>
                </div>
            </div>
        </div>
        <div class="white_card_body">   
            <div class="btn-group">
                <a href="{{ route('client.index') }}" class="btn btn-secondary" type="button">Client</a>
            </div>
            <div class="btn-group">
                <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Véhicule
                </button>
                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                    <a class="dropdown-item" href="{{ route('tv.index') }}">Type véhicule</a>
                    <a class="dropdown-item" href="{{ route('te.index') }}">Type énergie</a>
                    <a class="dropdown-item" href="{{ route('bv.index') }}">Boîte vitesse</a>                    
                    <a class="dropdown-item" href="{{ route('vehicule.index') }}">Véhicule</a>
                    <a class="dropdown-item" href="{{ route('vehicule.doc') }}">Document véhicule</a>
                </div>
            </div>
            <div class="btn-group">
                <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Entretien
                </button>
                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                    <a class="dropdown-item" href="{{ route('trp.index') }}">Pièce</a>
                    <a class="dropdown-item" href="{{ route('trf.index') }}">Fourniture</a>
                    <a class="dropdown-item" href="{{ route('trf.index') }}">Services</a>
                    <a class="dropdown-item" href="{{ route('tren.index') }}">Entretien</a>
                </div>
            </div>
            <div class="btn-group">
                <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Location
                </button>
                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                    <a class="dropdown-item" href="{{ route('tarification.index') }}">Tarification</a>
                    <a class="dropdown-item" href="{{ route('reservation.index') }}">Réservation</a>
                    <a class="dropdown-item" href="{{ route('location.index') }}">Location</a>
                </div>
            </div>
            <div class="btn-group">
                <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Caisse
                </button>
                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                    <a class="dropdown-item" href="{{ route('tm.index') }}">Type mouvement</a>
                    <a class="dropdown-item" href="{{ route('caisse.index') }}">Caisse</a>
                </div>
            </div>
        </div>
    </div>
</div>