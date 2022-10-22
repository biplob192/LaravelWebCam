<?php

namespace App\Http\Controllers;

use Storage;
use App\Models\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

class WebcamController extends Controller
{
    /**
     * Write code on Method
     *
     * @return response()
     */
    public function index()
    {
        return view('webcam');
    }

    /**
     * Write code on Method
     *
     * @return response()
     */
    public function store(Request $request)
    {


        $clientData['name'] = 'Mr. John Herry';
        $clientData['address'] = 'Kalabagan, Dhaka-1205';
        $clientData['mobile'] = '01xxxxxxxxx';
        $clientData['email'] = 'sample@mail.com';
        $clientData['image'] = 'image';

        if ($request->name) {
            $clientData['name'] = $request->name;
        }
        if ($request->address) {
            $clientData['address'] = $request->address;
        }
        if ($request->mobile) {
            $clientData['mobile'] = $request->mobile;
        }
        if ($request->email) {
            $clientData['email'] = $request->email;
        }
        if ($request->image) {
            $folderPath = "uploads/";

            $img = $request->image;
            $image_parts = explode(";base64,", $img);
            $image_type_aux = explode("image/", $image_parts[0]);
            $image_type = $image_type_aux[1];

            $image_base64 = base64_decode($image_parts[1]);
            $fileName = uniqid() . '.png';

            $file = $folderPath . $fileName;
            Storage::put($file, $image_base64);

            $clientData['image'] = $image_parts[1];
        }

        $newClient = Client::create($clientData);
        return redirect()->route('client.profile', ['id' => $newClient->id]);
        dd('Image uploaded successfully: ' . $fileName);
    }
}
