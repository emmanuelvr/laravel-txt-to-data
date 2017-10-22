@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header bg-info d-flex">
                        <h4 class="text-white">Toda la data</h4>
                        <a href="{{ route('data.create') }}" class="btn btn-light ml-auto">Importar data</a>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="row">
                                    <div class="col-sm-12 d-flex">
                                        <span class="mr-auto">Total de registros: {{ $total }}</span>
                                        <form class="form-inline my-2 my-lg-0" method="GET">
                                            <select class="form-control mr-2" name="column">
                                                @foreach($options as $option)
                                                    <option @if(isset($request) && $option === $request->column) selected @endif value="{{ $option }}">{{ ucfirst($option) }}</option>
                                                @endforeach
                                            </select>
                                            <input name="value" class="form-control mr-sm-2" type="search" placeholder="Valor a buscar" aria-label="Buscar" required>
                                            <button class="btn btn-outline-info my-2 my-sm-0" type="submit">Buscar</button>
                                            </form>
                                    </div>
                                </div>
                                <div class="table-responsive mt-4">
                                    <table class="table table-bordered table-hover table-striped">
                                        <thead>
                                            <th>Nombre</th>
                                            <th>Direccion</th>
                                            <th>Ciudad</th>
                                            <th>Telfijo</th>
                                            <th>Celular</th>
                                            <th>Cedula</th>
                                        </thead>
                                        <tbody>
                                            @foreach($rows as $row)
                                                <tr>
                                                    <td>{{ $row->nombre }}</td>
                                                    <td>{{ $row->direccion }}</td>
                                                    <td>{{ $row->ciudad }}</td>
                                                    <td>{{ $row->telfijo }}</td>
                                                    <td>{{ $row->celular }}</td>
                                                    <td>{{ $row->cedula }}</td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                                <div class="row justify-content-center">
                                    <div class="col-auto">
                                        @if($rows instanceof \Illuminate\Pagination\LengthAwarePaginator)
                                            {{ $rows->links('vendor.pagination.bootstrap-4') }}
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
