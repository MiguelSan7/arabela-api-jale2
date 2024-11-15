<?php

namespace App\Http\Controllers;

use App\Models\Info;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;

class InfoController extends Controller
{
    /**
     * Obtener listado de registros
     */
    public function index()
    {
        try {
            $info = Info::all();
            return response()->json([
                'success' => true,
                'data' => $info
            ], Response::HTTP_OK);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Error al obtener los registros',
                'error' => $e->getMessage()
            ], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    /**
     * Almacenar un nuevo registro
     */
    public function store(Request $request)
    {
        try {
            $validator = Validator::make($request->all(), [
                'cuenta_ok' => 'required|string',
                'nombre' => 'required|string',
                'numdama' => 'required|integer',
                'anio_campania' => 'required|integer',
                'saldo_cobro' => 'required|numeric',
                'pagos' => 'required|numeric',
                'resta' => 'required|numeric',
                'efectividad' => 'required|numeric',
                'fecha_inicial_vigencia' => 'required|date',
                'fecha_final_vigencia' => 'required|date',
                'numero_zona' => 'required|integer',
                'rutas' => 'required|integer',
                'fase' => 'required|string',
                'id_causanocobro' => 'required|integer',
                'digito_dama' => 'required|string|size:1',
                'codigopostal' => 'required|integer',
                'estado' => 'required|string'
            ]);

            if ($validator->fails()) {
                return response()->json([
                    'success' => false,
                    'message' => 'Error de validación',
                    'errors' => $validator->errors()
                ], Response::HTTP_BAD_REQUEST);
            }

            $info = Info::create($request->all());
            return response()->json([
                'success' => true,
                'data' => $info,
                'message' => 'Registro creado exitosamente'
            ], Response::HTTP_CREATED);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Error al crear el registro',
                'error' => $e->getMessage()
            ], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    /**
     * Mostrar un registro específico
     */
    public function show($id)
    {
        try {
            $info = Info::findOrFail($id);
            return response()->json([
                'success' => true,
                'data' => $info
            ], Response::HTTP_OK);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Registro no encontrado',
                'error' => $e->getMessage()
            ], Response::HTTP_NOT_FOUND);
        }
    }

    /**
     * Actualizar un registro específico
     */
    public function update(Request $request, $id)
    {
        try {
            $info = Info::findOrFail($id);
            
            $validator = Validator::make($request->all(), [
                'cuenta_ok' => 'string',
                'nombre' => 'string',
                'numdama' => 'integer',
                'anio_campania' => 'integer',
                'saldo_cobro' => 'numeric',
                'pagos' => 'numeric',
                'resta' => 'numeric',
                'efectividad' => 'numeric',
                'fecha_inicial_vigencia' => 'date',
                'fecha_final_vigencia' => 'date',
                'numero_zona' => 'integer',
                'rutas' => 'integer',
                'fase' => 'string',
                'id_causanocobro' => 'integer',
                'digito_dama' => 'string|size:1',
                'codigopostal' => 'integer',
                'estado' => 'string'
            ]);

            if ($validator->fails()) {
                return response()->json([
                    'success' => false,
                    'message' => 'Error de validación',
                    'errors' => $validator->errors()
                ], Response::HTTP_BAD_REQUEST);
            }

            $info->update($request->all());
            return response()->json([
                'success' => true,
                'data' => $info,
                'message' => 'Registro actualizado exitosamente'
            ], Response::HTTP_OK);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Error al actualizar el registro',
                'error' => $e->getMessage()
            ], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    /**
     * Eliminar un registro específico
     */
    public function destroy($id)
    {
        try {
            $info = Info::findOrFail($id);
            $info->delete();
            return response()->json([
                'success' => true,
                'message' => 'Registro eliminado exitosamente'
            ], Response::HTTP_OK);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Error al eliminar el registro',
                'error' => $e->getMessage()
            ], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }
    public function getNumDamaCount()
    {
        try {
            $numDamaCounts = Info::select('numdama', DB::raw('count(*) as total'))
                ->groupBy('numdama')
                ->orderBy('numdama')
                ->get();


            $chartData = [
                'labels' => $numDamaCounts->pluck('numdama')->toArray(),
                'data' => $numDamaCounts->pluck('total')->toArray()
            ];
            print_r($chartData);
            return view('graficas.numdama', [
                'chartData' => $chartData
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Error al obtener el conteo de numdama',
                'error' => $e->getMessage()
            ], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }
}