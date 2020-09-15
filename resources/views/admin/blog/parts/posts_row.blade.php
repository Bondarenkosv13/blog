<tr>
    <th scope="row">{{ $post->id }}</th>
    <th scope="row">{{ $post->title }}</th>
    <td><img src="{{Storage::url($post->image)}}" width="50"></td>
    <td>{{ $post->small_description }}</td>
    @if($post->is_published === 0)
        <td class="text-center" ><input type="checkbox" disabled></td>
    @else
        <td class="text-center" ><input type="checkbox"  disabled checked><br>Is published</td>
    @endif
    <th  class="text-center" scope="row">{{ $post->published_at }}</th>
    <th class="text-center" scope="row">{{ $post->created_at }}</th>
    <td>
        <div style="display: flex; flex-direction: row; align-items: center; justify-content: center">
            <a href="{{route('admin.post.edit', $post)}}"
               style="margin-right: 12px"
               class="btn btn-warning">{{__('Edit')}}</a>
            <form action="{{route('admin.post.destroy', $post)}}" method="post">
                @csrf
                @method('DELETE')
                <button class="btn btn-danger">{{__('Delete')}}</button>
            </form>
        </div>
    </td>
</tr>
