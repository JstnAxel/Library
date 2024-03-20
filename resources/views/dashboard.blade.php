<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Books') }}
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
                <div id="success-message" class="alert alert-success">
                    {{ session('success') }}
                </div>
                @elseif (session('update'))
                <div id="update-message" class="alert alert-info">
                    {{ session('update') }}
                </div>
                @elseif (session('remove'))
                <div id="remove-message" class="alert alert-error">
                    {{ session('remove') }}
                </div>
            @endif
            <form class="form" method="get" action="{{ route('search') }}">
                <div class="flex items-center gap-2 justify-center">
                    <input type="text" name="search" id="search" class="input input-bordered w-96" placeholder="Masukkan keyword" required>
                    <button type="submit" class="btn btn-primary mb-1">Cari</button>
                </div>
            </form>
            <a href="{{ route('books.create') }}"><button class="btn btn-neutral mt-10 mb-6">Add Books</button></a>
            <div class="overflow-x-auto">
                <table class="table">
                  <!-- head -->
                  <thead>
                    <tr>
                      <th>Title</th>
                      <th>Cover</th>
                      {{-- <th>Publisher</th>
                      <th>Authors</th> --}}
                      <th>Action</th>
                    </tr>
                  </thead>
                  @forelse ( $books as $book )
                  <tbody>
                    <!-- row 1 -->
                    <tr>
                      <td>{{ $book->title }}</td>
                      <td><img src="{{ asset('storage') }}/{{ $book->cover }}" width="150px" height="150px"></td>
                      {{-- <td>{{ $book->publisher->name_publisher }}</td>
                      <td>{{ $book->authors->name_authors }}</td> --}}
                      <td> <form action="{{ route('books.edit', $book->id) }}" method="get" style="display: inline;">
                            @csrf
                            <button class="btn btn-outline btn-warning">Update</button>
                            </form>
                            <form action="{{ route('books.destroy', $book->id) }}" method="post" style="display: inline;">
                             @csrf
                             @method('delete')
                            <button class="btn btn-outline btn-error">Remove</button>
                         </form>
                         <a href="{{ url('/books', $book->id) }}"><button class="btn btn-outline btn-info">Detail</button></a></td>
                        @empty
                      <div class="py-8 flex justify-center">Data Kosong</div>
                    </tr>
                    @endforelse
                  </tbody>
                </table>
              </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

<script>
    // Auto-hide success message after 5 seconds
    $(document).ready(function(){
        setTimeout(function(){
            $("#success-message, #remove-message, #update-message").fadeOut("slow", function(){
                $(this).remove();
            });
        }, 3000); // 5000 milliseconds = 5 seconds
    });
    
</script>

</x-app-layout>
