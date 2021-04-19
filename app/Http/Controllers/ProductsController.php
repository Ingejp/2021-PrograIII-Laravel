<?php

namespace App\Http\Controllers;

use App\Models\Products;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use App\Models\Brands;

class ProductsController extends Controller
{
    public function registerProducts(){
        $marcas=Brands::all();
        return view('registrarProducto', compact('marcas'));
    }

    public function saveProduct(Request $request){

        //Validaciones del formulario
        $data = request()->validate([
            'codigo' => 'required|max:13',
            'nombre'=>'required|max:75',
            'descripcion'=>'required|max:75',
            'marca'=>'required'
        ],[
            'codigo.required'=>'El campo codigo no debe estar vacio.',
            'nombre.required'=>'El campo nombre no debe estar vacio.',
            'descripcion.required'=>'El campo descripcion no debe estar vacio.',
            'id_marca.required'=>'El campo descripcion no debe estar vacio.',
            'codigo.max'=>'El codigo no puede tener más 13 caracteres.',
            'nombre.max'=>'El nombre no puede tener más 75 caracteres.',
            'descripcion.max'=>'La descripcion no puede tener más 75 caracteres.',
        ]);



        try{
            //Guardar el producto
           $products= Products::create([
               'codigo_producto'=> $data['codigo'],
               'nombre'=>$data['nombre'],
               'descripcion'=>$data['descripcion'],
               'id_marca'=>$data['marca']
           ]);

        }catch(QueryException $queryException){ //capturamos el erro en el catch
            return redirect()->route('products.index')->with('warning', 'Ocurrio un error al registrar el producto. ');
        }

        return redirect()->route('products.index')->with('success', 'Registro realizado exitosamente');

    }
}
