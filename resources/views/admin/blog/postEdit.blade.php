@extends('admin.layouts.admin')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Creat post</div>
                    <form method="POST" action="{{ route('admin.post.update', $post) }}" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <br>
                        <div class="form-group row">

                            <label for="title" class="col-md-4 col-form-label text-md-right">{{ __('Title') }}</label>

                            <div class="col-md-6">
                                <input id="title"
                                       type="text"
                                       class="form-control @error('title') is-invalid @enderror"
                                       name="title"
                                       value="{{ $post->title ?? '' }}"
                                       required
                                       autofocus
                                >
                                @error('title')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="small_description"
                                   class="col-md-4 col-form-label text-md-right">{{ __('Small Description') }}</label>

                            <div class="col-md-6">
                               <textarea name="small_description"
                                         id="small_description"
                                         class="form-control @error('small_description') is-invalid @enderror"
                                         cols="30"
                                         class="form-control"
                                         rows="10"
                               >{{ $post->small_description ?? '' }}</textarea>

                                @error('small_description')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="old_image"
                                   class="col-md-4 col-form-label text-md-right">{{ __('Old Image') }}</label>
                            <div class="col-md-6">
                                @if(!empty($post->image))
                                    <img name="old_image" src="{{Storage::url( $post->image)}}" width="350">
                                    <br><br>
                                @endif
                            </div>
                            <label for="image" class="col-md-4 col-form-label text-md-right">{{ __('Image') }}</label>
                            <div class="col-md-6">
                                <input id="image"
                                       class=" @error('image') is-invalid @enderror"
                                       type="file"
                                       name="image"
                                       value="{{ old('image') }}"
                                >

                                @error('image')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="description"
                                   class="col-md-4 col-form-label text-md-right">{{ __('Description') }}</label>

                            <div class="col-md-6">
                               <textarea name="description"
                                         class="form-control @error('description') is-invalid @enderror"
                                         id="description"
                                         cols="30"
                                         class="form-control"
                                         rows="10"
                               >{{ $post->description ?? '' }}</textarea>
                                @error('description')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row d-flex h-100">

                            <label for="is_published"
                                   class="col-md-4 col-form-label text-md-right">{{ __('Published') }}</label>

                            <div class=" align-self-center col-md-6">
                                <input id="is_published"
                                       type="checkbox"
                                       name="is_published"
                                       @if($post->is_published !== 0)
                                       checked
                                    @endif
                                >
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Update') }}
                                </button>
                            </div>
                        </div>
                    </form>
                    <div class="card-body">
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
