@extends('layouts.plantilla')

@section('titulo', 'Registro de Productos')

@section('contenido-limpio')
    <div class="p-1">
        <div class="text-secondary">
            <div class="row">
                <div class="col-md-12 d-flex justify-content-center text-blue text-uppercase"><h4>Registro de Productos
                    </h4></div>
            </div>
        </div>
        <div class="p-5">
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <form action="{{route('products.registrarProducto')}}" method="POST">
                @csrf
                @method('POST')
                <div class="row">
                    <div class="col-6 offset-3">
                        <div class="form-group">
                            <label>Codigo</label>
                            <input type="text" name="placa" id="placa" maxlength="8" class="form-control">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-6 offset-3">
                        <div class="form-group">
                            <label>nombre</label>
                            <input type="text" name="descripcion" class="form-control" >
                        </div>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-6 offset-3">
                        <div class="form-group">
                            <label>descripción</label>
                            <input type="text"  name="descripcion" class="form-control" >
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-6 offset-3">
                        <button type="submit" class="btn btn-primary">Guardar</button>
                        <a href="{{route('index')}}" class="btn btn-danger">Cancelar</a>
                    </div>
                </div>
            </form>
        </div>

    </div>
    @if(session()->get('success'))
        <script>
            toastr.success('Producto registrado.')
        </script>
    @elseif(session()->get('warning'))
        <script>
            toastr.warning('Ocurrio un error al registrar el producto.')
        </script>
    @endif

@endsection
