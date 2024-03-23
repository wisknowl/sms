<!-- Sidebar -->
<nav id="sidebarMenu" class=" d-lg-block sidebar bg-white">
    <div class="position-sticky">
        <div class="list-group list-group-flush mx-3 mt-4">
            @php
            $structureActiveRoutes = ['specialties', 'uniteEseignements', 'cours'];
            $studentActiveRoutes = ['students','recu'];
            $NoteActiveRoutes =['notes', 'proces_verbal'];
            @endphp
            <a href="{{route('admin')}}" class="list-group-item list-group-item-action py-2 ripple {{ request()->is('admin') ? 'active' : '' }}" aria-current="true">
                <i class="fas fa-tachometer-alt fa-fw me-3"></i><span>Tableau de bord</span>
            </a>
            <a href="#" class="list-group-item list-group-item-action py-2 ripple text-nowrap {{ in_array(request()->path(), $structureActiveRoutes) ? 'active' : '' }}" data-dropdown-toggle="dropdownRight" data-dropdown-placement="right">
                <i class="fas fa-university fa-fw me-3"></i><span>Structure éducative</span>
            </a>

            <!-- Dropdown menu -->
            <div id="dropdownRight" class="z-10 hidden bg-white divide-y divide-gray-100 rounded-lg shadow w-44 dark:bg-gray-700">
                <ul class="py-2 text-sm text-gray-700 dark:text-gray-200" aria-labelledby="dropdownRightButton">
                    <li>
                        <a href="{{route('specialties.index')}}" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">
                            {{ __('Specialité') }}
                        </a>
                    </li>
                    <li>
                        <a href="{{route('uniteEseignements.index')}}" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white text-nowrap">
                            {{ __('Unité Denseignement') }}
                        </a>
                    </li>
                    <li>
                        <a href="{{route('cours.index')}}" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">
                            {{ __('Cours') }}
                        </a>
                    </li>
                </ul>
            </div>

            <a href="#" class="list-group-item list-group-item-action py-2 ripple {{ in_array(request()->path(), $studentActiveRoutes) ? 'active' : '' }}" data-dropdown-toggle="dropdownRight1" data-dropdown-placement="right">
                <i class="fas fa-user-graduate fa-fw me-3"></i><span>Etudiant</span>
            </a>
            <!-- Dropdown menu -->
            <div id="dropdownRight1" class="z-10 hidden bg-white divide-y divide-gray-100 rounded-lg shadow w-44 dark:bg-gray-700">
                <ul class="py-2 text-sm text-gray-700 dark:text-gray-200" aria-labelledby="dropdownRightButton2">
                    <li>
                        <a href="{{route('students.index')}}" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">
                            {{ __('Inscrire') }}
                        </a>
                    </li>
                    <li>
                        <a href="#" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white text-nowrap">
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
                <i class="fas fa-chalkboard-teacher fa-fw me-3"></i><span>Professeur</span>
            </a>
            <a href="#" class="list-group-item list-group-item-action py-2 ripple {{ in_array(request()->path(), $NoteActiveRoutes) ? 'active' : '' }}" data-dropdown-toggle="dropdownRight2" data-dropdown-placement="right">
                <i class="fas fa-file-alt fa-fw me-3"></i><span>Les Notes</span>
            </a>

            <!-- Dropdown menu -->
            <div id="dropdownRight2" class="z-10 hidden bg-white divide-y divide-gray-100 rounded-lg shadow w-44 dark:bg-gray-700">
                <ul class="py-2 text-sm text-gray-700 dark:text-gray-200" aria-labelledby="dropdownHoverButtonNotes">
                    <li>
                        <a href="{{route('notes.index')}}" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">
                            {{ __('Saisie De Notes') }}
                        </a>
                    </li>
                    <li>
                        <a href="{{route('proces_verbal.index')}}" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">
                            {{ __('Proces verbal') }}
                        </a>
                    </li>
                    <li>
                        <a href="#" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">
                            {{ __('Relever') }}
                        </a>
                    </li>
                </ul>
            </div>
            <a href="#" class="list-group-item list-group-item-action py-2 ripple"><i class="fas fa-calendar fa-fw me-3"></i><span>Emploie de temps</span></a>
            <a href="#" class="list-group-item list-group-item-action py-2 ripple"><i class="fas fa-users fa-fw me-3"></i><span>Utilisateur</span></a>
        </div>
    </div>
</nav>
<!-- Sidebar -->