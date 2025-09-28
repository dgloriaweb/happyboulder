<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class BoulderRouteController extends Controller
{

    public function showForm()
    {
        return view('start');
    }

    public function listRoutes()
    {
        $jsonPath = app_path('../resources/json/data.json');
        $data = json_decode(\Illuminate\Support\Facades\File::get($jsonPath), true);
        // sort data by wallIndex
        usort($data[0]['nodes'], function ($a, $b) {
            return $a['wallIndex'] <=> $b['wallIndex'];
        });
        return view('qr_gen', ['nodes' => $data[0]['nodes'] ?? []]);
    }

    public function addNode(Request $request)
    {
        $jsonPath = app_path('Data/firstqr.json');

        // Read JSON into array
        $data = [];
        if (file_exists($jsonPath)) {
            $data = json_decode(file_get_contents($jsonPath), true);
        }

        // Prepare new node
        $newNode = [
            'nickname' => $request->input('nickname'),
            'levelAtSetup' => (int)$request->input('levelAtSetup'),
            'color' => $request->input('color'),
            'suggestedLevel' => (int)$request->input('suggestedLevel'),
            'wallIndex' => (int)$request->input('wallIndex'),
            'rating' => [
                'intensity' => (int)$request->input('intensity'),
                'risk' => (int)$request->input('risk'),
                'complexity' => (int)$request->input('complexity'),
            ]
        ];

        // Add new node to array
        if (isset($data[0]['nodes']) && is_array($data[0]['nodes'])) {
            $data[0]['nodes'][] = $newNode;
        } else {
            $data = [
                [
                    'nodes' => [$newNode]
                ]
            ];
        }

        // Write array back to JSON file
        file_put_contents($jsonPath, json_encode($data, JSON_PRETTY_PRINT));

        return redirect('/')->with('success', 'Node added!');
    }
}