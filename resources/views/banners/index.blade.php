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
                            <h4>Banners</h4>
                            <div class="text-right">
                                <a href="{{route('banners.create')}}" class="btn btn-sm btn-primary">New Banner</a>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-hover" id="tableExport" class="table table-striped" id="table-1" style="width:100%;">
                                    <thead>
                                        <tr>
                                            <th>Id</th>
                                            <th>Title</th>
                                            <th>Description</th>
                                            <th>Image</th>
                                            <th>Active</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($banners as $banner)
                                        <tr>
                                            <td>{{$banner->id}}</td>
                                            <td>{{$banner->title}}</td>
                                            <td>{{$banner->description}}</td>
                                            <td>
                                                <img src="{{asset('storage/banners/' .$banner->image)}}" height="100" alt="{{$banner->image}}">
                                            </td>
                                            <td>
                                                @if (!$banner->deleted_at)
                                                <div class='badge badge-success'>Active</div>
                                                @else
                                                <div class='badge badge-danger'>Disabled</div>
                                                @endif
                                            </td>
                                            <td>
                                                @if (!$banner->deleted_at)
                                                <a href="#" data-toggle="modal" data-target="#banner-{{$banner->id}}" title="Disable banner" class="btn btn-sm btn-danger">
                                                    <i class="fa fa-thumbs-down"></i>
                                                </a>
                                                <a href="{{route('banners.edit', $banner->id)}}" class="btn btn-sm btn-primary">
                                                    <i class="fa fa-edit"></i>
                                                </a>
                                                @else
                                                <a href="#" data-toggle="modal" data-target="#banner-{{$banner->id}}" title="Enable banner" class="btn btn-sm btn-warning">
                                                    <i class="fa fa-thumbs-up"></i></a>
                                                @endif
                                            </td>
                                        </tr>
                                        @include('banners.enable-disable')
                                        @empty
                                        <tr>
                                            <td colspan="6" class="text-center">No data available in table</td>
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