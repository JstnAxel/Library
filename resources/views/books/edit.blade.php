<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Edit Book') }}
        </h2>
    </x-slot>
    @if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
    @endif
    <div class="py-8 flex justify-center">
        <form action="{{ route('books.update', $books->id) }}" method="post" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <input type="text" placeholder="Name" class="input input-bordered w-full max-w-xs" name="title" value="{{ $books->title}}"/><br>
            <input type="number" placeholder="Name" class="input input-bordered w-full max-w-xs" name="year" value="{{ $books->year }}"/><br>
            <input type="file" placeholder="Input Here" class="input input-bordered w-full max-w-xs mt-16" name="cover" value="{{ asset('storage') }}/{{ $books->cover }}"/>
            <br>
            <select name="publisher_id" class="select select-bordered w-full max-w-xs" required>
                @foreach($publisher as $publish)
                    <option value="{{ $publish->id }}" {{ $publish->id == $books->publisher_id ? 'selected' : '' }}>
                        {{ $publish->name_publisher }}
                    </option>
                @endforeach
            </select>
            <select name="authors_id" class="select select-bordered w-full max-w-xs" required>
                @foreach($authors as $author)
                    <option value="{{ $author->id }}" {{ $author->id == $books->authors_id ? 'selected' : '' }}>
                        {{ $author->name_authors }}
                    </option>
                @endforeach
            </select>
            <button class="btn btn-outline btn-success mt-16" type="submit">Update Book</button>
        </form>
    </div>
</x-app-layout>
