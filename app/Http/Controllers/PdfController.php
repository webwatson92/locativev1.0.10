<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\{User, TypeVehicule, BoiteVitesse, TypeEnergy, DocVehicule};
use Auth, Pdf;

class PdfController extends Controller
{
    
    public function generatePDFclient(){
        $user = User::with("clients", "pays", 'ville', 'societe')
                ->where('id', Auth::user()->id)->get();
                
        $pdf = Pdf::loadView('pdf.clientpdf', compact('user'));
        // dd($pdf);
        return $pdf->download("clients.pdf");
    }


    public function generatePDFtv(){
        $tv = TypeVehicule::orderBy('created_at', 'DESC')->get();
                
        $pdf = Pdf::loadView('pdf.tvpdf', compact('tv'));
        // dd($pdf);
        return $pdf->download("type-vehicule.pdf");
    }
   
    public function generatePDFte(){
        $te = TypeEnergy::orderBy('created_at', 'DESC')->get();
                
        $pdf = Pdf::loadView('pdf.tepdf', compact('te'));
        // dd($pdf);
        return $pdf->download("type-energie.pdf");
    }

    public function generatePDFbv(){
        $bv = BoiteVitesse::orderBy('created_at', 'DESC')->get();
                
        $pdf = Pdf::loadView('pdf.bvpdf', compact('bv'));
        // dd($pdf);
        return $pdf->download("boite-vitesse.pdf");
    }

    public function generatePDFvehicule(){
        $vehicule = Vehicule::with('type_vehicule', 'type_energie', 'boite_vitesse', 'user')
                    ->orderBy('created_at', 'DESC')->get();
                
        $pdf = Pdf::loadView('pdf.vehiculepdf', compact('vehicule'));
        // dd($pdf);
        return $pdf->download("vehicule.pdf");
    }

    public function generatePDFdv(){
        $dv = DocVehicule::with('societe', 'vehicule', 'user')
                        ->orderBy('created_at', 'DESC')->get();

                
        $pdf = Pdf::loadView('pdf.dvpdf', compact('dv'));
        // dd($pdf);
        return $pdf->download("doc-vehicule.pdf");
    }

}
