<div>

    <div wire:click="refreshListProject" class="mb-3">
        <svg wire:loading.class="animate-spin" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
            stroke-width="1.5" stroke="currentColor" class="size-6" wire:target="refreshListProject">
            <path stroke-linecap="round" stroke-linejoin="round"
                d="M16.023 9.348h4.992v-.001M2.985 19.644v-4.992m0 0h4.992m-4.993 0 3.181 3.183a8.25 8.25 0 0 0 13.803-3.7M4.031 9.865a8.25 8.25 0 0 1 13.803-3.7l3.181 3.182m0-4.991v4.99" />
        </svg>
    </div>

    @forelse ($listProjects as $project)
        <div
            class="scale-100 p-10 bg-white dark:bg-gray-800/50 dark:bg-gradient-to-bl from-gray-700/50 via-transparent dark:ring-1 dark:ring-inset dark:ring-white/5 rounded-lg shadow-2xl shadow-gray-500/20 dark:shadow-none flex motion-safe:hover:scale-[1.01] transition-all duration-250 focus:outline focus:outline-2 focus:outline-red-500">
            <div class="mx-20">
                <div class="h-16 w-16 bg-red-50 dark:bg-red-800/20 flex items-center justify-center rounded-full">
                    @if ($project->category == 'WEBSITE')
                        <span
                            class="bg-green-100 text-green-800 text-xs font-medium me-2 px-2.5 py-0.5 rounded-sm dark:bg-gray-700 dark:text-green-400 border border-green-400">{{ $project->category }}</span>
                    @elseif ($project->category == 'MOBILE')
                        <span
                            class="bg-yellow-100 text-yellow-800 text-xs font-medium me-2 px-2.5 py-0.5 rounded-sm dark:bg-gray-700 dark:text-yellow-300 border border-yellow-300">{{ $project->category }}</span>
                    @elseif ($project->category == 'DESKTOP')
                        <span
                            class="bg-indigo-100 text-indigo-800 text-sm font-medium me-2 px-2.5 py-0.5 rounded-sm dark:bg-indigo-900 dark:text-indigo-300">{{ $project->category }}</span>
                    @endif
                </div>

                <h2 class="mt-6 text-xl font-semibold text-gray-900 dark:text-white">{{ $project->name }}

                </h2>

                <p class="mt-4 text-gray-500 dark:text-gray-400 text-sm leading-relaxed">
                    {{ $project->description }}
                </p>
                <form wire:submit="sendSubmission({{ $project->id }})">
                    <button type="submit">Send Submission</button>
                </form>
            </div>
        </div>
        <br>
    @empty
        <div class="p-4 mb-4 text-sm text-yellow-800 rounded-lg bg-yellow-50 dark:bg-gray-800 dark:text-yellow-300"
            role="alert">
            <span class="font-medium">Warning alert!</span> GAK ADA Project!
        </div>
    @endforelse
</div>
