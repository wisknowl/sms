<!-- Sidebar -->
<nav id="sidebarMenu" class=" d-lg-block sidebar bg-white">
    <div class="position-sticky">
        <div class="list-group list-group-flush mx-3 mt-4">
            @php
            use Illuminate\Support\Str;

            $structureActiveRoutes = ['specialties', 'uniteEseignements', 'cours', 'bts_blanc'];
            $studentActiveRoutes = ['students','facture'];
            $NoteActiveRoutes =['notes', 'proces_verbal', 'relever'];

            $currentPath = request()->path();
            $isActive = false;

            foreach ($structureActiveRoutes as $route) {
            if (Str::startsWith($currentPath, $route)) {
            $isActive = true;
            break;
            }
            }

            @endphp
            <a href="{{route('admin')}}" class="list-group-item list-group-item-action py-2 ripple {{ request()->is('admin') ? 'active' : '' }}" aria-current="true">
                <i class="fas fa-tachometer-alt fa-fw me-3"></i><span>{{ __('side_nav.dashboard') }}</span>
            </a>
            <a href="#" class="list-group-item list-group-item-action py-2 ripple text-nowrap {{ $isActive ? 'active' : '' }}" data-dropdown-toggle="dropdownRight" data-dropdown-placement="right">
                <i class="fas fa-university fa-fw me-3"></i><span>{{ __('side_nav.structure') }}</span>
            </a>

            <!-- Dropdown menu -->
            <div id="dropdownRight" class="z-10 hidden bg-white divide-y divide-gray-100 rounded-lg shadow w-44 dark:bg-gray-700">
                <ul class="py-2 text-sm text-gray-700 dark:text-gray-200" aria-labelledby="dropdownRightButton">
                    <li>
                        <a href="{{route('specialties.index')}}" class="{{ request()->is('specialties') ? 'bg-blue-500 text-neutral-900' : '' }} block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">
                            {{ __('Specialité') }}
                        </a>
                    </li>
                    <li>
                        <a href="{{route('uniteEseignements.index')}}" class="{{ request()->is('uniteEseignements') ? 'bg-blue-500 text-neutral-900' : '' }} block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white text-nowrap">
                            {{ __('Unité D\'enseignement') }}
                        </a>
                    </li>
                    <li>
                        <a href="{{route('cours.index')}}" class="{{ request()->is('cours') ? 'bg-blue-500 text-neutral-900' : '' }} block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white text-nowrap">
                            {{ __('Elements Constitutif') }}
                        </a>
                    </li>
                    <li>
                        <a href="{{route('bts_blanc.index')}}" class="{{ request()->is('bts_blanc') ? 'bg-blue-500 text-neutral-900' : '' }} block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">
                            {{ __('Matiere-BTS Blanc') }}
                        </a>
                    </li>
                </ul>
            </div>

            <a href="#" class="list-group-item list-group-item-action py-2 ripple {{ in_array(request()->path(), $studentActiveRoutes) ? 'active' : '' }}" data-dropdown-toggle="dropdownRight1" data-dropdown-placement="right">
                <i class="fas fa-user-graduate fa-fw me-3"></i><span>{{ __('side_nav.student') }}</span>
            </a>
            <!-- Dropdown menu -->
            <div id="dropdownRight1" class="z-10 hidden bg-white divide-y divide-gray-100 rounded-lg shadow w-44 dark:bg-gray-700">
                <ul class="py-2 text-sm text-gray-700 dark:text-gray-200" aria-labelledby="dropdownRightButton2">
                    <li>
                        <a href="{{route('students.index')}}" class="{{ request()->is('students') ? 'bg-blue-500 text-neutral-900' : '' }} block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">
                            {{ __('Etudiant') }}
                        </a>
                    </li>
                    <li>
                        <a href="{{route('facture.index')}}" class="{{ request()->is('facture') ? 'bg-blue-500 text-neutral-900' : '' }} block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white text-nowrap">
                            {{ __('Facturation') }}
                        </a>
                    </li>
                    <li>
                        <a href="#" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">
                            {{ __('Plus') }}
                        </a>
                    </li>
                </ul>
            </div>

            <a href="#" class="list-group-item list-group-item-action py-2 ripple">
                <i class="fas fa-chalkboard-teacher fa-fw me-3"></i><span>{{ __('side_nav.lecturer') }}</span>
            </a>
            <!-- <a href="#" class="list-group-item list-group-item-action py-2 ripple " data-dropdown-toggle="dropdownRight3" data-dropdown-placement="right">
                <i class="fas fa-file-alt fa-fw me-3"></i><span>{{ __('Examen') }}</span>
            </a> -->
            <!-- Dropdown menu -->
            <div id="dropdownRight3" class="z-10 hidden bg-white divide-y divide-gray-100 rounded-lg shadow w-44 dark:bg-gray-700">
                <ul class="py-2 text-sm text-gray-700 dark:text-gray-200" aria-labelledby="dropdownHoverButtonNotes">
                    <li>
                        <a href="{{route('notes.index')}}" class=" {{ request()->is('notes') ? 'bg-blue-500 text-neutral-900' : '' }} block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">
                            {{ __('') }}
                        </a>
                    </li>
                    <li>
                        <a href="{{route('proces_verbal.index')}}" class="{{ request()->is('proces_verbal') ? 'bg-blue-500 text-neutral-900' : '' }} block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">
                            {{ __('Proces verbal') }}
                        </a>
                    </li>
                    <li>
                        <a href="{{route('relever.index')}}" class="{{ request()->is('relever') ? 'bg-blue-500 text-neutral-900' : '' }} block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">
                            {{ __('Relever') }}
                        </a>
                    </li>
                </ul>
            </div>
            <a href="#" class="list-group-item list-group-item-action py-2 ripple {{ in_array(request()->path(), $NoteActiveRoutes) ? 'active' : '' }}" data-dropdown-toggle="dropdownRight2" data-dropdown-placement="right">
                <i class="fas fa-file-alt fa-fw me-3"></i><span>{{ __('side_nav.notes') }}</span>
            </a>

            <!-- Dropdown menu -->
            <div id="dropdownRight2" class="z-10 hidden bg-white divide-y divide-gray-100 rounded-lg shadow w-44 dark:bg-gray-700">
                <ul class="py-2 text-sm text-gray-700 dark:text-gray-200" aria-labelledby="dropdownHoverButtonNotes">
                    <li>
                        <a href="{{route('notes.index')}}" class=" {{ request()->is('notes') ? 'bg-blue-500 text-neutral-900' : '' }} block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">
                            {{ __('Saisie De Notes') }}
                        </a>
                    </li>
                    <li>
                        <a href="{{route('proces_verbal.index')}}" class="{{ request()->is('proces_verbal') ? 'bg-blue-500 text-neutral-900' : '' }} block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">
                            {{ __('Proces verbal') }}
                        </a>
                    </li>
                    <li>
                        <a href="{{route('relever.index')}}" class="{{ request()->is('relever') ? 'bg-blue-500 text-neutral-900' : '' }} block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">
                            {{ __('Relever') }}
                        </a>
                    </li>
                </ul>
            </div>
            <a href="#" class="list-group-item list-group-item-action py-2 ripple">
                <i class="fas fa-calendar fa-fw me-3"></i><span>{{ __('side_nav.time_table') }}</span>
            </a>
            <a href="#" class="list-group-item list-group-item-action py-2 ripple">
                <i class="fas fa-users fa-fw me-3"></i><span>{{ __('side_nav.users') }}</span>
            </a>
        </div>
    </div>
</nav>
<!-- Sidebar -->
