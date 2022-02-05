<?php

namespace App\Http\Controllers;

use App\Models\Prestamo;
use Illuminate\Http\Request;
use Carbon\Carbon;

class MultasController extends Controller
{
    
    public function index()
    {
        $total_multas = null; 

        $datos['prestamos'] = Prestamo::paginate(10);
        $datos['multa'] = $total_multas;
        return view('multas.index', $datos); 
    }

    public function filtrar(Request $request){ 
        $prestamos = Prestamo::where('fecha_inicio', '>=', $request->fecha_inicio)
            ->where('fecha_fin', '<=', $request->fecha_fin)
            ->get();  

        foreach ($prestamos as $prestamo) {
            $prestamo->multa = $this->calcularMulta($prestamo);
           
        }

      
        $datos['prestamos'] = $prestamos;
       
        return view('multas.index', $datos);
    }

    public function calcularMulta($prestamos){
        $valor_multa = 0;
        $penalidad = 5;
        
            $estado = $prestamos->estado;

            $fecha_fin = Carbon::parse($prestamos->fecha_fin);
            $fecha_entrega = Carbon::parse($prestamos->fecha_fentrega);
            $fecha_actual = Carbon::now();

            if($estado == 'Prestado'){
                if($fecha_actual > $fecha_fin){
                    $resta = $fecha_actual->diffInDays($fecha_fin);
                    $total_multa = $valor_multa + ($resta * $penalidad);
                   
                }else{
                    $total_multa = $valor_multa + 0;
                    
                }
            }else{
                if($fecha_entrega > $fecha_fin){
                    $resta = $fecha_entrega->diffInDays($fecha_fin);
                    $total_multa = $valor_multa + ($resta * $penalidad);
                    
                }else{
                    $total_multa = $valor_multa + 0;
                  
                }
            
        }
        return $total_multa;
    }

}
