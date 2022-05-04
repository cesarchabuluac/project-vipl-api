@extends('layouts.app')

@section('content')
<!-- Main Content -->
<div class="main-content">
    <section class="section">
        <div class="section-body">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>Users</h4>
                            <!-- <div class="text-right">
                                <a href="{{route('user-mobile.create')}}" class="btn btn-sm btn-primary">Nuevo</a>
                            </div> -->
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-hover" id="tableExport" class="table table-striped" id="table-1" style="width:100%;">
                                    <thead>
                                        <tr>
                                            <th>Name</th>
                                            <th>Email</th>
                                            <th>Phone</th>
                                            <th>Date of birth</th>
                                            <th>Date register</th>
                                            <th>Type Login</th>
                                            <th>Active</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($users as $user)
                                        <tr>
                                            <td>{{$user->name}}</td>
                                            <td>{{$user->email}}</td>
                                            <td>{{$user->phone}}</td>
                                            <td>{{$user->date_of_birth}}</td>
                                            <td>{{$user->date_register}}</td>
                                            <td>{{$user->type_login}}</td>
                                            <td>
                                                @if ($user->active)
                                                <div class='badge badge-success'>Active</div>
                                                @else
                                                <div class='badge badge-danger'>Disabled</div>
                                                @endif
                                            </td>
                                            <td>
                                                @if ($user->active)
                                                    <a href="#" data-toggle="modal" data-target="#user-{{$user->id}}" title="disable user" class="btn btn-sm btn-danger">
                                                        <i class="fa fa-thumbs-down"></i>                                                        
                                                    </a>
                                                @else
                                                <a href="#" data-toggle="modal" data-target="#user-{{$user->id}}" title="enable user" class="btn btn-sm btn-warning">
                                                    <i class="fa fa-thumbs-up"></i></a>
                                                @endif
                                            </td>
                                        </tr>
                                        @include('users.enable-disable')
                                        @empty
                                        <tr>
                                            <td colspan="8" class="text-center">No data available in table</td>
                                        </tr>
                                        @endforelse
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection