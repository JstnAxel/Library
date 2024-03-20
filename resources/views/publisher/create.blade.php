<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Create Publisher') }}
        </h2>
    </x-slot>
    @if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
    @endif
    <div class="py-8 flex justify-center">
    <form action="{{ route('publisher.store') }}" method="post">
        @csrf
        <input type="text" placeholder="Name" class="input input-bordered w-full max-w-xs" name="name_publisher"/><br>
        <input type="text" placeholder="Address" class="input input-bordered w-full max-w-xs mt-16" name="address"/>
        <br>
        <button class="btn btn-outline btn-success mt-16" type="submit">Create Publisher</button>
    </form>
    </div>
</x-app-layout>
