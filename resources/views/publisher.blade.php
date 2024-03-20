<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Publisher') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                {{-- <div class="p-6 text-gray-900 dark:text-gray-100">
                    {{ __("You're logged innn!") }}
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
            <a href="{{ route('publisher.create') }}"><button class="btn btn-neutral mt-10 mb-6">Add Publisher</button></a>
            <div class="overflow-x-auto">
                <table class="table">
                  <!-- head -->
                  <thead>
                    <tr>
                      <th>Name</th>
                      <th>Adress</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  @forelse ( $publisher as $publish )
                  <tbody>
                    <!-- row 1 -->
                    <tr>
                      <td>{{ $publish->name_publisher }}</td>
                      <td>{{ $publish->address }}</td>
                      <td> <form action="{{ route('publisher.edit', $publish->id) }}" method="get" style="display: inline;">
                        @csrf
                        <button class="btn btn-outline btn-warning">Update</button>
                            </form>
                    <form action="{{ route('publisher.destroy', $publish->id) }}" method="post" style="display: inline;">
                        @csrf
                        @method('delete')
                        <button class="btn btn-outline btn-error">Remove</button>
                    </form></td>
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
