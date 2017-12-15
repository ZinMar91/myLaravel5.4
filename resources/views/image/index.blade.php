@extends('layouts.app')
@section('title', 'Image | Resize')
@section('content')
    <div class="container">
        <h1>Resize Image Uploading Demo:</h1>
        @if(count($errors) > 0)
            <div class="alert alert-danger">
                <strong>Whoops!</strong> There were some problems with your input.<br><br>
                @foreach($errors->all() as $error)
                    {{ $error }}
                @endforeach
            </div>
        @endif

        @if($message = Session::get('success'))
            <div class="alert alert-success alert-block">
                <button type="button" class="close" data-dismiss="alert">
                    x
                </button>
                <strong>{{ $message }}</strong>
            </div>
            <div class="row">
                <div class="col-md-4">
                    <strong>Original Image:</strong><br>
                    <img src="/images/{{ Session::get('imageName') }}" alt="">
                </div>
                <div class="col-md-4">
                    <strong>Thumbnail Image:</strong><br>
                    <img src="/thumbnail/{{ Session::get('imageName') }}" alt="">
                </div>
            </div>
        @endif

        {{ Form::open(array('route'=>'resizeImage', 'method'=>'post', 'enctype'=>'multipart/form-data')) }}
            <div class="row">
                <div class="col-md-4">
                    <br>{{ Form::text('title', null, array('class'=>'form-control','placeholder'=>'Add title')) }}
                </div>
                <div class="col-md-12">
                    <br>{{ Form::file('image', array('class'=>'image')) }}
                </div>
                <div class="col-md-12">
                    <br><button class="btn btn-success">Upload Image</button>
                </div>
            </div>
        {{ Form::close() }}
    </div>
@endsection