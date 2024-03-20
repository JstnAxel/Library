<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Edit Authors') }}
        </h2>
    </x-slot>
    @if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
    @endif
    <div class="py-8 flex justify-center">
        <form action="{{ route('authors.update', $authors->id) }}" method="post" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <input type="text" placeholder="Name" class="input input-bordered w-full max-w-xs" name="name_authors" value="{{ $authors->name_authors }}"/><br>
            <input type="file" placeholder="Input Here" class="input input-bordered w-full max-w-xs mt-16" name="photo" value="{{ asset('storage') }}/{{ $authors->photo }}"/>
            <br>
            <button class="btn btn-outline btn-success mt-16" type="submit">Update Publisher</button>
        </form>
    </div>
</x-app-layout>
