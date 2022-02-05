@extends('layouts.app')

@section('template_title')
    Prestamo
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-11">
                <div class="card text-dark bg-warning mb-3 text-center">
                    <div class="card-header text-white bg-dark">
                        PRÉSTAMOS
                    </div>
                    @if ($message = Session::get('success'))
                        <div class="alert alert-success">
                            <p>{{ $message }}</p>
                        </div>
                    @endif

                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered border-dark table-hover">
                                <thead class="thead">
                                    <tr>
                                        <th>No</th>
                                        
										<th>Equipo Id</th>
										<th>Usuario</th>
										<th>Estado</th>
										<th>Fecha Inicio</th>
										<th>Fecha Fin</th>
										<th>Fecha Entrega</th>

                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($prestamos as $prestamo)
                                        <tr>
                                            <td>{{ ++$i }}</td>
                                            
											<td>{{ $prestamo->equipo_id }}</td>
											<td>{{ $prestamo->usuario }}</td>
											<td>{{ $prestamo->estado }}</td>
											<td>{{ $prestamo->fecha_inicio }}</td>
											<td>{{ $prestamo->fecha_fin }}</td>
											<td>{{ $prestamo->fecha_fentrega }}</td>

                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                {!! $prestamos->links() !!}
            </div>
        </div>
    </div>
@endsection
