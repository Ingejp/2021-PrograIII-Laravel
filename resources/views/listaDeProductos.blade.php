@extends('layouts.plantilla')

@section('contenido')
    <div class="p-3 bg-white mb-3">
        <h3>Lista de Productos</h3>
        <div class="input-group mb-3">
            <input type="text" class="form-control" placeholder="Nombre del comercio" id="nom_buscar">
            <div class="input-group-append">
                <button class="btn btn-outline-secondary rounded-right" onclick="searchComercio()" id="btn-comercio" ><i class="fas fa-search"></i></button>
            </div>
            <button type="button" class="btn btn-success ml-5" onclick="goToEvents()"><i class="fas fa-plus text-white"></i> Nuevo</button>
        </div>
        <div class="table-responsive">
            <table class="table table-hover">
                <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">CODIGO</th>
                    <th scope="col">PRODUCTO</th>
                    <th scope="col">DESCRIPCIÓN</th>
                    <th scope="col">MARCA</th>
                    <th scope="col" ></th>
                    <th scope="col" ></th>
                </tr>
                </thead>
                <tbody>
                @foreach($products as $producto)
                    <tr>
                        <td>{{$producto->alias}}</td>
                        <td>{{$producto->nombre}}</td>
                        <td>{{$producto->direccion}}</td>
                        <td>{{$producto->telefono_principal}}</td>
                        <td>{{$producto->telefono_secundario}}</td>
                        <td class="d-flex d-inline"><a href="/comercio=editar={{$producto->id_comercio}}"><i class="far fa-edit fa-lg"></i></a><a onclick="deleteComercio({{$comercio->id_comercio}})" class="mx-3" href="#" ><i class="fas fa-trash-alt fa-lg text-danger" ></i></a></td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
        <div class="d-flex justify-content-center">
            {{ $products->links() }}
        </div>
    </div>
@endsection

