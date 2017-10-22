@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="card">
            <div class="card-header bg-info">
                <h4 class="text-white">Importar data desde txt</h4>
            </div>
            <form action="{{ route('data.store') }}" method="POST" enctype="multipart/form-data">
                {{ csrf_field() }}
                <div class="card-body">
                    <div class="row">
                        <div class="col-sm-8 offset-sm-2">
                                <div class="form-group">
                                    <label for="data">Cargar un archivo de texto</label>
                                    <input type="file" name="data" id="data" class="form-control-file">
                                </div>
                            {{-- {!! Form::open(['action' => 'DataController@store', 'method' => 'POST', 'files' => true]) !!}
                            {!! Form::close() !!} --}}
                        </div>
                    </div>
                </div>
                <div class="card-footer">
                    <div class="d-flex justify-content-center">
                        <div class="col-auto">
                            <button type="submit" class="btn btn-primary">Cargar</button>
                            <button type="button" class="btn btn-secondary">Cancelar</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
