<x-mymodal form-action="update">
    <x-slot name="title">
        <div class="uppercase">
            deliberation 
        </div>
    </x-slot>

    <x-slot name="content">
        <div>
            <label for="email" class="block text-sm font-medium text-gray-700">Niveau</label>
            <select wire:model="level_id" mul wire:change="" class="mt-1 block w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm !important">
                @isset($levels)
                @foreach($levels as $level)
                <option value="{{ $level->id }}">Niveau {{ $level->name }}</option>
                @endforeach
                @endisset
            </select>
        </div>
        <div class="grid grid-cols-2 gap-1">
            <div>
                <label for="email" class="block text-sm font-medium text-gray-700">Cycle</label>
                <select wire:model="cycle_id" mul wire:change="updateSpecialties" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                    @isset($cycles)
                    @foreach($cycles as $cycle)
                    <option value="{{ $cycle->id }}">{{ $cycle->name }} | {{ $cycle->code }}</option>
                    @endforeach
                    @endisset
                </select>
            </div>
            <div>
                <label for="email" class="block text-sm font-medium text-gray-700">Specialite</label>
                <select wire:model="specialty_id" mul wire:change="" class="mt-1 block w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm !important">
                    @isset($specialties)
                    @foreach($specialties as $specialty)
                    <option value="{{ $specialty->id }}">{{ $specialty->name }} | {{ $specialty->code }}</option>
                    @endforeach
                    @endisset
                </select>
            </div>
        </div>
        <div class="">
            <label for="name" class="block text-sm font-medium text-gray-700">Note Semestriel a Deliberer</label>
            <input type="number" id="name" wire:model="noteDeliberation" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
        </div>

    </x-slot>

    <x-slot name="buttons">
        <button wire:click="$dispatch('closeModal')" type="button" class="inline-block rounded bg-primary-100 px-6 pb-2 pt-2.5 text-xs font-medium uppercase leading-normal text-primary-700 transition duration-150 ease-in-out hover:bg-primary-accent-100 focus:bg-primary-accent-100 focus:outline-none focus:ring-0 active:bg-primary-accent-200" data-te-ripple-init data-te-ripple-color="light">
            Fermer
        </button>
        <button type="submit" class="ml-1 inline-block rounded bg-primary px-6 pb-2 pt-2.5 text-xs font-medium uppercase leading-normal text-white shadow-[0_4px_9px_-4px_#3b71ca] transition duration-150 ease-in-out hover:bg-primary-600 hover:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.3),0_4px_18px_0_rgba(59,113,202,0.2)] focus:bg-primary-600 focus:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.3),0_4px_18px_0_rgba(59,113,202,0.2)] focus:outline-none focus:ring-0 active:bg-primary-700 active:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.3),0_4px_18px_0_rgba(59,113,202,0.2)] dark:shadow-[0_4px_9px_-4px_rgba(59,113,202,0.5)] dark:hover:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.2),0_4px_18px_0_rgba(59,113,202,0.1)] dark:focus:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.2),0_4px_18px_0_rgba(59,113,202,0.1)] dark:active:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.2),0_4px_18px_0_rgba(59,113,202,0.1)]" data-te-ripple-init data-te-ripple-color="light">
            Deliberer
        </button>
    </x-slot>
</x-mymodal>