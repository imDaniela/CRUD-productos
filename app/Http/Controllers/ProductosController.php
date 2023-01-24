<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Providers\RouteServiceProvider;
use App\Models\Productos;
use App\Models\Variaciones;

class ProductosController extends Controller
{
    //---------------------------- PRODUCTOS ----------------------------------//
    //Funcion que trae todos los elementos de la tabla productos 
    public function GetProductos(){
        $productos = Productos::all();
        return $productos;
    }

    //Funcion que trae la data de un producto en especifico segun su id
    public function GetProducto($id){
        $producto = Productos::find($id);
        return $producto;
    }

    //Funcion de crear o editar el producto segun su id ademas de sus variaciones
    public function SaveProducto(Request $request){
        $producto = Productos::updateOrCreate(
            [ 'id' => $request->id],
            [
                'nombre' => $request->nombre,
                'referencia' => $request->referencia,
                'descripcion' => $request->descripcion,
                'precio'=> $request->precio
            ]
        );

        $variaciones = $request->variaciones;
        foreach($variaciones as $elemento){
            $variacion = Variaciones::updateOrCreate(
                ['id' => $elemento['id']],
                [
                    'producto_id'=> $request->id,
                    'referencia' => $elemento['referencia'],
                    'descripcion' => $elemento['descripcion'],
                    'precio'=> $elemento['precio']
                ]
            );
        }
    }

    //Funcion que elimina el elemento seleccionado segun el id de la tabla
    public function DeleteProducto($id){
        $producto = Productos::find($id); 
        $producto->delete();
    }

    //--------------------------------- VARIACIONES ------------------------------//
    //Funcion que trae todos los elementos de la tabla variaciones 
    public function GetVariaciones(){
        $variaciones = Variaciones::with('Producto')->get();
        return $variaciones;
    }

    //Funcion que trae la data de una variacion en especifico segun su producto_id
    public function GetVariacionesByProductoId($id){
        $variaciones = Variaciones::where('producto_id',$id)->get();
        return response()->json([
            'variaciones'=> $variaciones
        ]);
    }

    //Funcion que elimina el elemento seleccionado segun el id de la tabla
    public function DeleteVariacion($id){
        $variacion = Variaciones::find($id); 
        $variacion->delete();
    }
}
