<?php

namespace App\Http\Controllers;

use App\Models\Products;
use http\Env\Response;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use App\Models\Brands;

class ProductsController extends Controller
{
    public function getAll(){
        $products=Products::all();
        return $products;
    }

    public function registerProducts(){
        //Consultamos las marcas de productos que estan en la Base de datos
        $marcas = Brands::all();

        $variableDeEjemplo='Hola Alumnos de PrograIII';

        //Se retorna la ruta y se envian los objetos o variables hacia la vista
        return view('registrarProducto', compact('marcas', 'variableDeEjemplo'));
    }

    public function showProducts(){
        $products = Products::all();
        return view('listaDeProductos', compact('products'));
    }

    public function saveProduct(Request $request){
        if($request->control=='form' || $request->control=='api') {
            //Validaciones del formulario
            $data = request()->validate([
                'codigo' => 'required|max:13',
                'nombre' => 'required|max:75',
                'descripcion' => 'required|max:75',
                'marca' => 'required'
            ], [
                'codigo.required' => 'El campo codigo no debe estar vacio.',
                'nombre.required' => 'El campo nombre no debe estar vacio.',
                'descripcion.required' => 'El campo descripcion no debe estar vacio.',
                'id_marca.required' => 'El campo marca no debe estar vacio.',

                'codigo.max' => 'El codigo no puede tener más 13 caracteres.',
                'nombre.max' => 'El nombre no puede tener más 75 caracteres.',
                'descripcion.max' => 'La descripcion no puede tener más 75 caracteres.',
            ]); // termina el bloque de validaciones

            try {
                //Guardar el producto
                $products = Products::create([
                    'codigo_producto' => $data['codigo'],
                    'nombre' => $data['nombre'],
                    'descripcion' => $data['descripcion'],
                    'id_marca' => $data['marca']
                ]);

            } catch (QueryException $queryException) { //capturamos el erro en el catch
                return redirect()->route('products.index')->with('warning', 'Ocurrio un error al registrar el producto. ');
            }
        }
        if($request->control=='form'){
            return redirect()->route('products.index')->with('success', 'Registro realizado exitosamente');
        }elseif($request->control=='api'){
            return response()->json([
                'codigo' => '1',
                'descripcion' => 'Guardado Exitosamente',
            ]);
        }
    }
}
