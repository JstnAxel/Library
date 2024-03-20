<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Create Authors') }}
        </h2>
    </x-slot>
    @if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
    @endif
    <div class="py-8 flex justify-center">
    <form action="{{ route('authors.store') }}" method="post" enctype="multipart/form-data">
        @csrf
        <input type="text" placeholder="Type here" class="input input-bordered w-full max-w-xs" name="name_authors"/><br>
        <input type="file" placeholder="Input here" class="input input-bordered w-full max-w-xs mt-16" name="photo"/>
        <br>
        <button class="btn btn-outline btn-success mt-16" type="submit">Create Authors</button>
    </form>
    </div>
</x-app-layout>
