<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class PredictionController extends Controller
{
    public function predictOutbreak(Request $request)
    {
        $data = $request->validate([
            'disease_name' => ['required'],
            'current_cases' => ['required', 'integer'],
            'location' => ['required']
        ]);

        $response = Http::post('http://127.0.0.1:8000/predict-outbreak', [
            'DiseaseName' => $data['disease_name'],
            'CurrentCases' => $data['current_cases'],
            'Location' => $data['location']
        ]);

        $result = $response->json();

        return view('welcome', compact('result')); 
    }
}

