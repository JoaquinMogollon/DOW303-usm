@extends('layout.master')

@section('contenido-principal')

    <!-- datos -->
    <div class="container-fluid">
        <div class="row">
            <div class="col">
                <h3>Equipos</h3>
            </div>
        </div>

        <div class="row">
            <!-- tabla -->
            <div class="col-12 col-lg-8 order-last order-lg-first">
                <table class="table table-bordered table-striped table-hover">
                    <thead>
                        <tr>
                            <th>N°</th>
                            <th>Apellido</th>
                            <th>Nombre</th>
                            <th>Posicion</th>
                            <th>Numero</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>

                        @foreach ($jugadores as $num=>$jugador)

                        <tr>
                            <td class="align-middle">{{$num+1}}</td>
                            <td class="align-middle">{{$jugador->apellido}}</td>
                            <td class="align-middle">{{$jugador->nombre}}</td>
                            <td class="align-middle">{{$jugador->posicion}}</td>
                            <td class="align-middle">{{$jugador->numero}}</td>
                            <td>
                                <a href="#" class="btn btn-sm btn-danger pb-0" data-bs-toggle="tooltip"
                                    data-bs-title="Borrar Equipo {{$jugador->nombre}}">
                                    <span class="material-icons">delete</span>
                                </a>
                                <a href="#" class="btn btn-sm btn-warning pb-0 text-white" data-bs-toggle="tooltip"
                                    data-bs-title="Editar Equipo {{$jugador->nombre}}">
                                    <span class="material-icons">edit</span>
                                </a>
                            </td>
                        </tr>
                        
                        @endforeach
                    </tbody>
                </table>
            </div>
            <!-- form agregar jugador -->
            <div class="col-12 col-lg-4 order-first order-lg-last">
                <div class="card">
                    <div class="card-header bg-dark text-white">Agregar Jugador</div>
                    <div class="card-body">
                        <form method="POST" action="{{route('jugadores.store')}}">
                            @csrf
                            <div class="mb-3">
                                <label for="apellido" class="form-label">Apellido</label>
                                <input type="text" id="apellido" class="form-control" name="apellido">
                            </div>
                            <div class="mb-3">
                                <label for="nombre" class="form-label">Nombre</label>
                                <input type="text" id="nombre" class="form-control" name="nombre">
                            </div>
                            <div class="mb-3">
                                <label for="posicion" class="form-label">Posicion</label>
                                <div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" id="pos-arquero" name="posicion" value="Arquero">
                                        <label class="form-check-label" for="pos-arquero">Arquero</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" id="pos-defensa" name="posicion" value="Defensa">
                                        <label class="form-check-label" for="pos-defensa">Defensa</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" id="pos-volante" name="posicion" value="Volante">
                                        <label class="form-check-label" for="pos-volante">Volante</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" id="pos-delantero" name="posicion" value="Delantero">
                                        <label class="form-check-label" for="pos-delantero">Delantero</label>
                                    </div>
                                    <div class="form-group">
                                        <label for="numero">Numero de Camiseta:</label>
                                        <input id="numero" type="number" class="form-control" min="1" max="99" name="numero">
                                    </div>
                                    <div class="form-group">
                                        <label for="equipo">Equipo</label>                    
                                        <select class="form-control" id="equipo" name="equipo">
                                            @foreach ($equipos as $equipo)
                                                <option value="{{$equipo->id}}">{{$equipo->nombre}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="mb-3 d-grid gap-2 d-lg-block">
                                <button type="reset" class="btn btn-warning">Cancelar</button>
                                <button type="submit" class="btn btn-success">Agregar Jugador</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection