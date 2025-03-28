<x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        MANAGE POST
    </h2>
</x-slot>

<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg px-4 py-4">
            
            <!-- ini bagian peringtan -->
            @if (session()->has('message'))
                <div class="bg-teal-100 border-t-4 border-teal-500 rounded-b text-teal-900 px-4 py-3 shadow-md my-3" role="alert">
                    <div class="flex">
                        <div>
                            <p class="text-sm">{{ session('message') }}</p>
                        </div>
                    </div>
                </div>
            @endif

            <button wire:click="create()" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded my-3">
                Tambahkan Post Baru
            </button>

            @if($isOpen)
                @include('livewire.create')
            @endif

            <table class="table-fixed w-full ">
                <thead>
                    <tr class="bg-gray-100">
                        <th class="border px-4 py-2 w-20">No.</th>
                        <th class="border px-4 py-2">Name</th>
                        <th class="border px-4 py-2">Gender</th>
                        <th class="border px-4 py-2">Email</th>
                        <th class="border px-4 py-2">Phone</th>
                        <th class="border px-4 py-2">Grade</th>
                        <th class="border px-4 py-2">Action</th>
                    </tr>
                </thead>
                
                <tbody>
                    @foreach($posts as $post)
                        <tr>
                            <td class="border px-4 py-2">{{ $post->id }}</td>
                            <td class="border px-4 py-2">{{ $post->name }}</td>
                            <td class="border px-4 py-2">{{ $post->gender }}</td>
                            <td class="border px-4 py-2">{{ $post->email }}</td>
                            <td class="border px-4 py-2">{{ $post->phone }}</td>
                            <td class="border px-4 py-2">{{ $post->grade }}</td>
                            <td class="border px-4 py-2">
                                <button wire:click="edit({{ $post->id }})" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                                    Edit
                                </button>
                                <button wire:click="delete({{ $post->id }})" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded">
                                    Hapus
                                </button>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>