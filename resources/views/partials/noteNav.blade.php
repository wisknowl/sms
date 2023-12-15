<div class="flex justify-between mb-5 items-center">
    <div class="flex items-center">
        <div class="hidden space-x-8 sm:-my-px sm:ms-10 sm:flex uppercase p-3">
            <x-nav-link :href="route('notes.index')" :active="request()->routeIs('notes.index')">
                {{ __('Saisie De Notes') }}
            </x-nav-link>
        </div>
        <div class="hidden space-x-8 sm:-my-px sm:ms-10 sm:flex uppercase p-3">
            <x-nav-link>
                {{ __('Impression Des Relever') }}
            </x-nav-link>
        </div>
        
    </div>
    <div class="flex text-center items-center">
        <!-- @if (session()->has('success'))
        <div>
            {{ session()->get('success') }}
        </div>
        @endif -->
    </div>
</div>