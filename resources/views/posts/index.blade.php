@extends('layouts.app')

@section('content')
    <div class="flex justify-center">
        <div class="w-8/12 bg-white p-6 rounded-lg">
            <form class="mb-4" action=" {{ route('posts') }} " method="post" >
                @csrf
                <div class="mb-4">
                    <label for="body" class="sr-only">Gönderi</label>
                    <textarea name="body" id="body" cols="30" rows="4" class="bg-gray-100 border-2 w-full p-4 rounded-lg @error('body') border-red-500 @enderror" placeholder="Gönderi giriniz!"></textarea>

                    @error('body')
                        <div class="text-red-500 mt-2 text-sm">
                            {{ $message }}
                        </div>    
                    @enderror
                </div>
                <div class="grid justify-items-end">
                    <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded font-medium">Gönder</button>
                </div>

            </form>

            @if ($posts->count())
                @foreach ($posts as $post)
                    <div class="mb-4">
                        <a href="" class="font-bold"> {{$post->user->name}} </a> <span class="text-gray-600 text-sm"> {{$post->created_at->diffForHumans() }} </span>
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
                @endforeach

                {{ $posts->links() }}

            @else
                <p>Henüz hiçbir gönderi bulunmamaktadır.</p>
            @endif
        </div>
    </div>
@endsection