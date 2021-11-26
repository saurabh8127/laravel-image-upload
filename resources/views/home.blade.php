@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                   <form method="POST" action="{{ route('upload_image') }}" enctype="multipart/form-data">
                        @csrf

                        <div class="mb-3">
                            <label for="image_title" class="form-label">Name of the image</label>
                            <input type="text" class="form-control" id="image_title" name="image_title">
                        </div>

                        <div class="input-group mb-3">
                            <div class="custom-file">
                              <input type="file" class="custom-file-input" id="image" name="image">
                              <label class="custom-file-label" for="image">Choose file</label>
                            </div>
                        </div>

                        <button type="submit" class="btn btn-primary">Upload Image</button>
                    </form>
  
//SHOW THE IMAGEAT IN PAGE
                    <div class="row mt-5">
                        @foreach ($images as $image)
                            <div class="col-4">
                                <div class="card">
                                    <img src="/uploads/{{ $image->image_path }}" />
                                    <div class="card-head">
                                        <h3 class="m-0">
                                            {{ $image->name }}
                                        </h3>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
