<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Authors') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                {{-- <div class="p-6 text-gray-900 dark:text-gray-100">
                    {{ __("You're logged innnnnnnnnnnnnnn!") }}
                </div> --}}
            </div>

                @if(session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
                @elseif (session('update'))
                <div class="alert alert-info">
                    {{ session('update') }}
                </div>
                @elseif (session('remove'))
                <div class="alert alert-error">
                    {{ session('remove') }}
                </div>
            @endif
            <a href="{{ route('authors.create') }}"><button class="btn btn-neutral mt-10 mb-6">Add Authors</button></a>
            <div class="overflow-x-auto">
                <table class="table">
                  <!-- head -->
                  <thead>
                    <tr>
                      <th>Name</th>
                      <th>Photo</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  @forelse ($authors as $author )
                  <tbody>
                    <!-- row 1 -->
                    <tr>
                      <td>{{ $author->name_authors }}</td>
                      <td><img src="{{ asset('storage/authors/' . basename($author->photo)) }}" width="150px" height="150px"></td>
                      <td> 

                        <form action="{{ route('authors.edit', $author->id) }}" method="get" style="display: inline;">
                        @csrf
                        <button class="btn btn-outline btn-warning">Update</button>
                        </form>

                        <form action="{{ route('authors.destroy', $author->id) }}" method="post" style="display: inline;">
                        @csrf
                        @method('delete')
                        <button class="btn btn-outline btn-error">Remove</button>
                        </form>
                        
                      </td>
                      @empty
                      <div class="py-8 flex justify-center">Data Kosong</div>
                    </tr>
                    @endforelse
                  </tbody>
                </table>
              </div>
        </div>
    </div>
</x-app-layout>
