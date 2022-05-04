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
                            <h4>Create Banner</h4>
                            <div class="text-right">
                                <a href="{{route('banners.index')}}" class="btn btn-sm btn-danger">Back</a>
                            </div>
                        </div>
                        <div class="card-body">
                        @if ($errors->any())
                            @foreach ($errors->all() as $error)
                                <div class="text-danger">{{$error}}</div>
                            @endforeach
                        @endif
                            <form action="{{route('banners.store')}}" method="post" class="needs-validation" novalidate="" enctype="multipart/form-data">
                                @csrf
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="title">Title</label>
                                        <input id="title" type="text" class="form-control" name="title" tabindex="1" required autofocus 
                                        placeholder="Enter your banner title" value="{{old('title')}}">
                                        <div class="invalid-feedback">
                                            Please enter your banner tittle
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="description">Description</label>
                                        <textarea id="description" name="description" rows="3" tabindex="2" class="form-control" placeholder="Enter your banner description">{{old('description')}}</textarea>
                                        <div class="invalid-feedback">
                                            Please enter your banner description
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="description">Image</label>
                                        <input type="file" name="image" id="image" class="form-control" tabindex="3" required>
                                        <div class="invalid-feedback">
                                            Please choose an image
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <button type="submit" class="btn btn-primary btn-lg btn-block" tabindex="4">
                                            Save
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection