@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header bg-info">
                        <h4 class="text-white">@lang('user.edit')</h4>
                    </div>
                    {!! Form::model($user, ['route' => ['users.update', $user->id], 'method' => 'PUT']) !!}
                    <div class="card-body">
                        <div class="container">
                            <div class="row">
                                <div class="form-group col-sm-8">
                                    {!! Form::label('name', __('user.name')) !!}
                                    {!! Form::text('name', null, ['class' => 'form-control', 'placeholder' => __('user.name')]) !!}
                                    @if($errors->has('name')) <span class="text-danger">{{ $errors->first('name') }}</span> @endif
                                </div>
                                <div class="form-group col-sm-4">
                                    {!! Form::label('type', __('user.type')) !!}
                                    {!! Form::select('type', ['member' => 'member', 'admin' => 'admin'], null, ['class' => 'form-control']) !!}
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-sm-12">
                                    {!! Form::label('email', __('user.email')) !!}
                                    {!! Form::email('email', null, ['class' => 'form-control', 'placeholder' => 'example@mail.com']) !!}
                                    @if($errors->has('email')) <span class="text-danger mt-4">{{ $errors->first('email') }}</span> @endif
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-sm-6">
                                    {!! Form::label('password', __('user.password')) !!}
                                    {!! Form::password('password', ['class' => 'form-control', 'placeholder' => '*******']) !!}
                                    @if($errors->has('password')) <span class="text-danger">{{ $errors->first('password') }}</span> @endif
                                </div>
                                <div class="form-group col-sm-6">
                                    {!! Form::label('password_confirmation', __('user.password_confirmation')) !!}
                                    {!! Form::password('password_confirmation', ['class' => 'form-control', 'placeholder' => '*******']) !!}
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer">
                        <div class="form-group text-center">
                            <button type="submit" class="btn btn-primary">@lang('general.update')</button>
                            <a href="{{ route('users.index') }}" class="btn btn-secondary">@lang('general.cancel')</a>
                        </div>
                    </div>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
@endsection
