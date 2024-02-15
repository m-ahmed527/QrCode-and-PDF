<?php

namespace App\Http\Controllers;

use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

class QrCodeCOntroller extends Controller
{
    public function QrCode(Request $request){

        // $qr= \QrCode::size(250)->style('dot')->eye('circle')
        // ->color(255, 150, 150,50)->backgroundColor(0,150,0)->margin(10)->errorCorrection('H')
        // ->generate('Hello World');

        // $qr=QrCode::size(200)->email('foo@bar.com', 'This is the subject.', 'This is the message body.');
        // $qr= QrCode::size(200)->SMS('555-555-5555', 'Body of the message');

        $qr=QrCode::size(200)->wiFi([
            'encryption' => 'WPA/WEP',
            'ssid' => 'SSID of the network',
            'password' => 'Password of the network',
            'hidden' => 'Whether the network is a hidden SSID or not.'
        ]);


        return view('qrCode', get_defined_vars());
    }


    public function pdfDownload(){

        $qr=QrCode::size(200)->wiFi([
            'encryption' => 'WPA/WEP',
            'ssid' => 'SSID of the network',
            'password' => 'Password of the network',
            'hidden' => 'Whether the network is a hidden SSID or not.'
        ]);

        $pdf = Pdf::loadView('pdf',compact('qr'));
        return $pdf->stream('pdf');
    }
}
