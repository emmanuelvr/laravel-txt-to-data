@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-sm-6 offset-3">
            <div class="card">
                <div class="card-header bg-info">
                    <h4 class="text-white">@lang('general.login')</h4>
                </div>
                <div class="card-body">
                    {!! Form::open(['route' => 'login', 'method' => 'POST']) !!}
                        <div class="row">
                            <div class="col-sm-12">
                                @if($errors->has('email'))
                                    <div class="alert alert-danger">
                                        <span class="text-danger mt-4">{{ $errors->first('email') }}</span>
                                    </div>
                                @endif
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-6 offset-sm-3 form-group justify-content-center">
                                {!! Form::label('email', __('user.email')) !!}
                                {!! Form::email('email', null, ['class' => 'form-control']) !!}
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-6 offset-sm-3 form-group justify-content-center">
                                {!! Form::label('password', __('user.password')) !!}
                                {!! Form::password('password', ['class' => 'form-control']) !!}
                            </div>
                        </div>
                        <div class="form-group" align="center">
                            <button type="submit" class="btn btn-info">
                                Login
                            </button>
                        </div>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
