<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Create Books') }}
        </h2>
    </x-slot>
    @if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
    @endif
    <div class="py-8 flex justify-center">
    <form action="{{ route('books.store') }}" method="post" enctype="multipart/form-data">
    @csrf
        <input type="text" placeholder="Title" class="input input-bordered w-full max-w-xs" name="title"/><br>
        <input type="file" placeholder="Cover" class="input input-bordered w-full max-w-xs mt-6" name="cover"/><br>
        <input type="number" placeholder="Year" class="input input-bordered w-full max-w-xs mt-6" name="year"/><br>
        {{-- <label for="publisher_id">Publisher:</label> --}}
            <select name="publisher_id" class="select select-bordered w-full max-w-xs" required>
                <option disabled selected>Choose Publisher</option>
            @foreach($publisher as $publish)
            <option value="{{ $publish->id }}">{{ $publish->name_publisher }}</option>
            @endforeach
            </select> <br>
        {{-- <label for="authors_id">Authors:</label> --}}
            <select name="authors_id" class="select select-bordered w-full max-w-xs" required>
                <option disabled selected>Choose Author</option>
             @foreach($authors as $author)
            <option value="{{ $author->id }}">{{ $author->name_authors }}</option>
            @endforeach
            </select>
        <button class="btn btn-outline btn-success mt-16" type="submit">Create Books</button>
    </form>
    </div>
</x-app-layout>
