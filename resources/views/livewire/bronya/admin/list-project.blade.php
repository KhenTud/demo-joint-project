<div x-data="{
    deleteConfirmation(id) {
        let confirm = window.confirm('yakin ingin menghapus project?');
        if (confirm) {
            {{-- true condition --}}
            $wire.deleteProject(id);
        }
        {{-- false condition --}}
        return;
    }
}">

    <div>
        <div class=" mt-2 relative overflow-x-auto shadow-md sm:rounded-lg">
            <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                    <tr>
                        <th scope="col" class="px-6 py-3">
                            #
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Nama Project
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Deskripsi
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Status
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Kategori
                        </th>

                        {{-- <th scope="col" class="px-6 py-3">
                        Kategori
                    </th> --}}

                        <th scope="col" class="px-6 py-3">
                            Action
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($projects as $post)
                        <tr
                            class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                            <th scope="row"
                                class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                {{ $loop->iteration }}
                            </th>
                            <td class="px-6 py-4">
                                {{ $post->name }}
                            </td>
                            <td class="px-6 py-4">
                                {{ $post->description }}
                            </td>

                            @if ($post->status == 'PENDING')
                                <td>
                                    <span
                                        class="inline-block px-3 py-1 text-sm font-semibold text-gray-600 bg-gray-100 rounded-full">
                                        {{ $post->status }}
                                    </span>
                                @elseif ($post->status == 'DRAFTED')
                                <td>
                                    <span
                                        class="inline-block px-3 py-1 text-sm font-semibold text-blue-700 bg-blue-100 rounded-full">
                                        {{ $post->status }}
                                    </span>
                                @elseif ($post->status == 'INPROGRESS')
                                <td>
                                    <span
                                        class="inline-block px-3 py-1 text-sm font-semibold text-yellow-400 bg-yellow-100 rounded-full">
                                        {{ $post->status }}
                                    </span>
                                    @elseif ($post->status == 'PUBLISHED')
                                <td>
                                    <span
                                        class="inline-block px-3 py-1 text-sm font-semibold text-red-600 bg-red-200 rounded-full">
                                        {{ $post->status }}
                                    </span>
                                @elseif ($post->status == 'ARCHIEVED')
                                <td>
                                    <span
                                        class="inline-block px-3 py-1 text-sm font-semibold text-pink-600 bg-pink-100 rounded-full">
                                        {{ $post->status }}
                                    </span>
                            @endif

                            </td>
                            <td class="px-6 py-4">
                                {{ $post->category }}
                            </td>

                            <td class="px-6 py-4">
                                <button @click="deleteConfirmation( {{ $post->id }} )" class="text-red-600"> Delete
                                </button>
                            </td>

                        @empty
                            <div class="p-4 mb-4 text-sm text-yellow-800 rounded-lg bg-yellow-50 dark:bg-gray-800 dark:text-yellow-300"
                                role="alert">
                                <span class="font-medium">Warning alert!</span> GAK ADA Project!
                            </div>
                    @endforelse


                    </tr>
                </tbody>
            </table>
        </div>
