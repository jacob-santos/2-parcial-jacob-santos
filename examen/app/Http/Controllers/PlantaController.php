<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Planta;
use Illuminate\Support\Facades\Validator;

class PlantaController extends Controller
{
    public function show()
    {
        return response()->json(Planta::all(), 200);
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nombre' => 'required|string',
            'altura' => 'required|numeric',
            'tipo' => 'required|string',
            'riego' => 'required|string',
        ]);

        if ($validator->fails()) {
            return response()->json(["message" => "Error al crear el registro", "errors" => $validator->errors()], 400);
        }

        $planta = Planta::create($request->all());
        return response()->json(["message" => "Registro exitoso", "data" => $planta], 201);
    }

    public function edit(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'nombre' => 'required|string',
            'altura' => 'required|numeric',
            'tipo' => 'required|string',
            'riego' => 'required|string',
        ]);

        if ($validator->fails()) {
            return response()->json(["message" => "Error al actualizar el registro", "errors" => $validator->errors()], 400);
        }

        $planta = Planta::find($id);
        if (!$planta) {
            return response()->json(["message" => "Planta no encontrada"], 404);
        }

        $planta->update($request->all());
        return response()->json(["message" => "Actualización exitosa"], 200);
    }

    public function delete($id)
    {
        $planta = Planta::find($id);
        if (!$planta) {
            return response()->json(["message" => "Planta no encontrada"], 404);
        }

        $planta->delete();
        return response()->json(["message" => "Eliminación exitosa"], 200);
    }
}
