@props(['post' => $post])

<div class="mb-4">
    <a href="{{ route('users.posts', $post->user) }}" class="font-bold"> {{$post->user->name}} </a> <span class="text-gray-600 text-sm"> {{$post->created_at->diffForHumans() }} </span>
    <p class="mb-2"> {{ $post->body }} </p>
   
    @can('delete', $post)
        <form action="{{ route('posts.destroy', $post) }}" method="post">
            @csrf
            @method('DELETE')
            <button type="submit" class="text-blue-500">Sil</button>
        </form>
    @endcan               

    <div class="flex item-center">
        @auth
        @if (!$post->likedBy(auth()->user()))
        <form action="{{ route('posts.likes', $post) }}" method="POST" class="mr-1">
            @csrf
            <button type="submit" class="text-blue-500">Beğen</button>
        </form>
        @else
        <form action="{{ route('posts.likes', $post) }}" method="POST" class="mr-1">
            @csrf
            @method('DELETE')
            <button type="submit" class="text-blue-500">Beğenme</button>
        </form>
        @endif

        

        @endauth
        
        <span class="ml-1">{{ $post->likes->count() }} Beğeni</span>
    </div>


</div>