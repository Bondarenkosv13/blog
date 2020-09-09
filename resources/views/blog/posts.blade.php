@extends('layouts.app')

@section('content')

    <table>
        @foreach($posts as $post)
            <tr>
                <td>{{$post->title}}</td>
                <td>{{$post->description}}</td>
            </tr>
        @endforeach
    </table>

@endsection