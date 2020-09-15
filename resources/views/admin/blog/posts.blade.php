@extends('admin.layouts.admin')

@section('content')

    <div class="container" enctype="multipart/form-data">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <table class="table table-hover">
                    <thead>
                    <tr>
                        <th scope="col">{{ __('#') }}</th>
                        <th scope="col">{{ __('Title') }}</th>
                        <th scope="col">{{ __('Image') }}</th>
                        <th scope="col">{{ __('Description') }}</th>
                        <th scope="col">{{ __('Published') }}</th>
                        <th scope="col">{{ __('Date published') }}</th>
                        <th scope="col">{{ __('Date create') }}</th>
                        <th class="text-center" scope="col">{{ __('Action') }}</th>
                    </tr>
                    </thead>
                    <tbody>
                        @each('admin.blog.parts.posts_row', $posts , 'post')

                    </tbody>
                </table>
                <div class="d-flex justify-content-center">{{$posts->links()}}</div>

            </div>
        </div>
    </div>

@endsection