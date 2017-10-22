@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header bg-info d-flex">
                        <h4 class="text-white mr-auto">@lang('navbar.users')</h4>
                        <a href="{{ route('users.create') }}" class="btn btn-light">@lang('user.create')</a>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="table-responsive">
                                    <table class="table table-bordered table-striped table-hover">
                                        <thead>
                                            <th>@lang('user.type')</th>
                                            <th>@lang('user.name')</th>
                                            <th>@lang('user.email')</th>
                                            <th>@lang('general.actions')</th>
                                        </thead>
                                        <tbody>
                                            @foreach($users as $user)
                                            <tr>
                                                <td align="center">
                                                    @if($user->type == 'admin')
                                                        <span class="badge bg-info text-white">{{ $user->type }}</span>
                                                    @else
                                                        <span class="badge badge-secondary">{{ $user->type }}</span>
                                                    @endif
                                                </td>
                                                <td>{{ $user->name }}</td>
                                                <td>{{ $user->email }}</td>
                                                <td align="center" class="d-flex">
                                                    <a href="{{ route('users.edit', $user->id) }}" class="btn btn-primary mr-2"><i class="fa fa-edit"></i></a>
                                                    {!! Form::open(['route' => ['users.destroy', $user->id], 'method' => 'DELETE']) !!}
                                                        <button type="submit" class="btn btn-danger"><i class="fa fa-remove"></i></button>
                                                    {!! Form::close() !!}
                                                </td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
