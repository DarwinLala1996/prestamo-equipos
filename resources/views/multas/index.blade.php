@extends('layouts.app')

@section('template_title')
    Prestamo
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-6">
                <div class="card text-dark bg-warning mb-3 text-center">
                    <div class="card-header">  
                        <form action="{{ route('multas.index') }}" method="POST">
                            @csrf
                            <div class="col mt-2" style = "float: left; margin: 8px;">
                                <label for="fechaInicio" class="form-label">Fecha Inicio</label>
                                <input type="date" class="form-control" name="fecha_inicio" id="fecha_inicio" style = "background-color: #959595;">
                            </div>
    
                            <div class="col mt-2" style = "float: left; margin: 8px;">
                                <label for="fechaFin" class="form-label">Fecha Fin</label>
                                <input type="date" class="form-control" name="fecha_fin" id="fecha_fin" style = "background-color: #959595;">
                            </div>
                            
                            <div class="col mt-2" style = "float: left; margin: 50px;">
                                <button type="submit" class="btn btn-outline-dark"> Calcular </button>
                            </div>
                                
                        </form>       
                    </div>

                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered border-dark table-hover">
                                <thead class="thead">
                                    <tr>
                                        
										<th>Equipo Id</th>
										<th>Usuario</th>
										<th>Multa</th>

                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($prestamos as $prestamo)
                                        @if ($prestamo->multa > 0)
                                        
                                        <tr>  

											<td>{{ $prestamo->equipo_id }}</td>
											<td>{{ $prestamo->usuario }}</td>
                                            <td>{{ $prestamo->multa }}</td>  

                                        </tr>
                                        
                                        @endif
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection