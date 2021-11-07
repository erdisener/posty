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
                    </div>
                @endforeach
            @else
                <p>Henüz hiçbir gönderi bulunmamaktadır.</p>
            @endif
        </div>
    </div>
@endsection