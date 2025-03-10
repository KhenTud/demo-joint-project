<div>
    <div x-data="{
        expanded: false,
        name: $wire.entangle('name').live,
        status: $wire.entangle('status').live,
        project_id: $wire.entangle('project_id').live,
        category: $wire.entangle('category').live,
        closeForm() {
            if (this.name != '' || this.status != '' || this.description != '' || this.category == '') {
                let confirm = window.confirm('yakin menghapus data?')
                if (confirm) {
                    this.expanded = false;
                    $wire.resetForm();
                }
            }
            return;
        }

    }" @project-created.window="expanded = false">

        <div class="flex gap-3">
            <button @click="expanded = ! expanded"
                class="block text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"
                type="button">
                <span x-show="! expanded">Toggle Model</span>
            </button>

            <x-action-message class="me-3" on="project-created">
                {{ __('Created.') }}
            </x-action-message>

        </div>

        <div x-show="expanded">

            <!-- Main modal -->
            <div id="crud-modal" tabindex="-1"
                class="flex fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
                <div class="relative p-4 w-full max-w-md max-h-full">
                    <!-- Modal content -->
                    <div class="relative bg-white rounded-lg shadow-sm dark:bg-gray-700">

                        <!-- Modal body -->
                        <form class="p-4 md:p-5" wire:submit.prevent="sendDataTodo">
                            <div class="grid gap-4 mb-4 grid-cols-2">
                                <div class="col-span-2">
                                    <label for="name"
                                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nama
                                        Todo</label>
                                    <input type="text" wire:model="name" id="name"
                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                        placeholder="Type product name">
                                    <x-input-error :messages="$errors->get('name')" class="mt-2" />
                                </div>

                                <div class="col-span-2 sm:col-span-1">
                                    <label for="price"
                                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nama
                                        Todo </label>
                                    <select id="status" wire:model="status"
                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                                        <option selected="">Select status</option>
                                        @foreach (\App\Helpers\Status::status as $item => $value)
                                            <option value="{{ $value }}">{{ $item }}</option>
                                        @endforeach

                                    </select>
                                    <x-input-error :messages="$errors->get('status')" class="mt-2" />
                                </div>
                                <div class="col-span-2 sm:col-span-1">
                                    <label for="category"
                                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Category</label>
                                    <select id="category" wire:model="category"
                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                                        <option selected="">Select category</option>
                                        @foreach (\App\Helpers\Category::categories as $item => $value)
                                            <option value="{{ $value }}">{{ $item }}</option>
                                        @endforeach
                                    </select>
                                    <x-input-error :messages="$errors->get('category')" class="mt-2" />

                                </div>
                                <div class="col-span-2">
                                    <label for="category"
                                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Project Name</label>
                                    <select id="project_id" wire:model="project_id"
                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                                        <option selected="">Select project</option>
                                        @foreach (\App\Models\Project::all() as $item)
                                            <option value="{{ $item->id }}">{{ $item->name }}</option>
                                        @endforeach
                                    </select>
                                    <x-input-error :messages="$errors->get('project_id')" class="mt-2" />
                                </div>
                            </div>

                            <div class="flex gap-4">
                                <button type="submit"
                                    class="text-white inline-flex items-center bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                                    <svg class="me-1 -ms-1 w-5 h-5" fill="currentColor" viewBox="0 0 20 20"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd"
                                            d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z"
                                            clip-rule="evenodd"></path>
                                    </svg>
                                    Add new product
                                </button>

                                <button @click="closeForm"
                                    class="block text-white bg-gray-700 hover:bg-gray-800 ring:gray-4 focus:outline-none ring:gray-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-gray-700 dark:focus:ring-gray-800"
                                    type="button">
                                    <span x-show="expanded">Cancel</span>
                                </button>

                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
