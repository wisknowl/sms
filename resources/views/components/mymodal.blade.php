@props(['formAction' => false])

<div>
    @if($formAction)
    <form wire:submit.prevent="{{ $formAction }}">
        @endif
        <div class="bg-white p-4 sm:px-6 sm:py-4 border-b border-gray-150">
            <div class="flex flex-shrink-0 items-center justify-between">

                @if(isset($title))
                <h3 class="text-lg leading-6 font-medium text-gray-900">
                    {{ $title }}
                </h3>
                @endif
                <button wire:click="$dispatch('closeModal')" type="button" class="box-content rounded-none border-none hover:no-underline hover:opacity-75 focus:opacity-100 focus:shadow-none focus:outline-none" data-te-modal-dismiss aria-label="Close">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="h-6 w-6">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
        <div class="bg-white px-4 sm:p-6">
            <div class="space-y-6">
                {{ $content }}
            </div>
        </div>

        <div class="flex flex-shrink-0 flex-wrap items-center justify-end rounded-b-md border-t-2 border-neutral-100 border-opacity-100 p-4 dark:border-opacity-50">
            {{ $buttons }}
        </div>
        @if($formAction)
    </form>
    @endif
</div>