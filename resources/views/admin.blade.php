@extends('layouts.app2')
@section('header')
<div class="d-none d-md-flex flex w-auto my-auto ml-10 justify-between items-center">
  <div class="">
    <h2 class="text-motion z-1 glow font-semibold text-sm m-0 text-gray-800 leading-tight">
      @if (Session::has('year_name')) Année academique {{ Session::get('year_name') }}@endif |
      @if (Session::has('semester_name')) Semestre {{ Session::get('semester_name') }}@endif
    </h2>
  </div>
  <div class="mx-2.5">
    <button id="dropdownRadioBgHoverButton" data-dropdown-toggle="dropdownRadioBgHover" class="flex items-center whitespace-nowrap rounded bg-primary-100 px-6 pb-1 pt-1.5 text-xs font-medium uppercase leading-normal text-neutral-800 shadow-[0_4px_9px_-4px_#fbfbfb] transition duration-150 ease-in-out hover:bg-neutral-100 hover:shadow-[0_8px_9px_-4px_rgba(251,251,251,0.3),0_4px_18px_0_rgba(251,251,251,0.2)] focus:bg-neutral-100 focus:shadow-[0_8px_9px_-4px_rgba(251,251,251,0.3),0_4px_18px_0_rgba(251,251,251,0.2)] focus:outline-none focus:ring-0 active:bg-neutral-200 active:shadow-[0_8px_9px_-4px_rgba(251,251,251,0.3),0_4px_18px_0_rgba(251,251,251,0.2)] motion-reduce:transition-none" type="button">
      Changer Année
      <svg class="w-2.5 h-2.5 ms-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 4 4 4-4" />
      </svg>
    </button>

    <!-- Dropdown menu -->
    <div id="dropdownRadioBgHover" class="z-10 hidden w-48 bg-white divide-y divide-gray-100 rounded-lg shadow dark:bg-gray-700 dark:divide-gray-600">
      @if(request()->path()=='admin')
      <form action="{{ route('admin', ['year_id' => Session::get('year_id'), 'semester_id' => Session::get('semester_id')]) }}" method="get">
        @else
        <form action="{{ route('students.index', ['year_id' => Session::get('year_id'), 'semester_id' => Session::get('semester_id')]) }}" method="get">
          @endif
          <ul class="p-3 space-y-1 text-sm text-gray-700 dark:text-gray-200" aria-labelledby="dropdownRadioBgHoverButton">
            @isset($academic_years)
            @foreach($academic_years as $academic_year)
            <li>
              <div class="flex items-center p-2 rounded hover:bg-gray-100 dark:hover:bg-gray-600">
                <input id="{{ $academic_year->id }}" type="radio" value="{{ $academic_year->id }}" name="year_id" onclick="this.form.submit()" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-700 dark:focus:ring-offset-gray-700 focus:ring-2 dark:bg-gray-600 dark:border-gray-500">
                <label for="{{ $academic_year->id }}" class="w-full ms-2 text-sm font-medium text-gray-900 rounded dark:text-gray-300">{{ $academic_year->name }}</label>
              </div>
            </li>
            @endforeach
            @endisset
          </ul>
        </form>

        <div class="p-3" data-te-select-custom-content-ref>
          <!-- Button trigger modal -->
          <a href="{{ route('academic_years') }}">
            <button type="button" class="inline-block rounded uppercase bg-primary p-1 text-xs font-medium leading-normal text-white shadow-[0_4px_9px_-4px_#3b71ca] transition duration-150 ease-in-out hover:bg-primary-600 hover:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.3),0_4px_18px_0_rgba(59,113,202,0.2)] focus:bg-primary-600 focus:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.3),0_4px_18px_0_rgba(59,113,202,0.2)] focus:outline-none focus:ring-0 active:bg-primary-700 active:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.3),0_4px_18px_0_rgba(59,113,202,0.2)] dark:shadow-[0_4px_9px_-4px_rgba(59,113,202,0.5)] dark:hover:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.2),0_4px_18px_0_rgba(59,113,202,0.1)] dark:focus:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.2),0_4px_18px_0_rgba(59,113,202,0.1)] dark:active:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.2),0_4px_18px_0_rgba(59,113,202,0.1)]" data-te-ripple-init data-te-ripple-color="light">
              Debuter une nouvelle annee
            </button>
          </a>
        </div>
    </div>
    <!-- Modal -->
    <div data-te-modal-init class="fixed left-0 top-0 z-[1055] hidden h-full w-full overflow-y-auto overflow-x-hidden outline-none" id="exampleModal1" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div data-te-modal-dialog-ref class="pointer-events-none relative w-auto translate-y-[-50px] opacity-0 transition-all duration-300 ease-in-out min-[576px]:mx-auto min-[576px]:mt-7 min-[576px]:max-w-[500px]">
        <div class="min-[576px]:shadow-[0_0.5rem_1rem_rgba(#000, 0.15)] pointer-events-auto relative flex w-full flex-col rounded-md border-none bg-white bg-clip-padding text-current shadow-lg outline-none dark:bg-neutral-600">
          <div class="flex flex-shrink-0 items-center justify-between rounded-t-md border-b-2 border-neutral-100 border-opacity-100 p-4 dark:border-opacity-50">
            <!--Modal title-->
            <h5 class="text-xl font-medium leading-normal text-neutral-800 dark:text-neutral-200" id="exampleModalLabel">
              Creer une annee academic
            </h5>
            <!--Close button-->
            <button type="button" class="box-content rounded-none border-none hover:no-underline hover:opacity-75 focus:opacity-100 focus:shadow-none focus:outline-none" data-te-modal-dismiss aria-label="Close">
              <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="h-6 w-6">
                <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
              </svg>
            </button>
          </div>

          <!--Modal body-->
          <form method="POST" action="">
            @csrf
            <div class="relative flex-auto p-4" data-te-modal-body-ref>
              <div class="relative mb-3" data-te-input-wrapper-init>
                <input name="name" type="text" class="peer block min-h-[auto] w-full rounded border-0 bg-transparent px-3 py-[0.32rem] leading-[1.6] outline-none transition-all duration-200 ease-linear focus:placeholder:opacity-100 peer-focus:text-primary data-[te-input-state-active]:placeholder:opacity-100 motion-reduce:transition-none dark:text-neutral-200 dark:placeholder:text-neutral-200 dark:peer-focus:text-primary [&:not([data-te-input-placeholder-active])]:placeholder:opacity-0" id="exampleFormControlInputText" placeholder="Example label" />
                <label for="exampleFormControlInputText" class="pointer-events-none absolute left-3 top-0 mb-0 max-w-[90%] origin-[0_0] truncate pt-[0.37rem] leading-[1.6] text-neutral-500 transition-all duration-200 ease-out peer-focus:-translate-y-[0.9rem] peer-focus:scale-[0.8] peer-focus:text-primary peer-data-[te-input-state-active]:-translate-y-[0.9rem] peer-data-[te-input-state-active]:scale-[0.8] motion-reduce:transition-none dark:text-neutral-200 dark:peer-focus:text-primary">Nom de l'annee: par example 2023-2024
                </label>
              </div>
              <div class="grid grid-cols-2 gap-2">
                <div class="relative mb-3" data-te-datepicker-init data-te-input-wrapper-init>
                  <input name="start_date" type="text" class="peer block min-h-[auto] w-full rounded border-0 bg-transparent px-3 py-[0.32rem] leading-[1.6] outline-none transition-all duration-200 ease-linear focus:placeholder:opacity-100 peer-focus:text-primary data-[te-input-state-active]:placeholder:opacity-100 motion-reduce:transition-none dark:text-neutral-200 dark:placeholder:text-neutral-200 dark:peer-focus:text-primary [&:not([data-te-input-placeholder-active])]:placeholder:opacity-0" placeholder="Select a date" />
                  <label for="floatingInput" class="pointer-events-none absolute left-3 top-0 mb-0 max-w-[90%] origin-[0_0] truncate pt-[0.37rem] leading-[1.6] text-neutral-500 transition-all duration-200 ease-out peer-focus:-translate-y-[0.9rem] peer-focus:scale-[0.8] peer-focus:text-primary peer-data-[te-input-state-active]:-translate-y-[0.9rem] peer-data-[te-input-state-active]:scale-[0.8] motion-reduce:transition-none dark:text-neutral-200 dark:peer-focus:text-primary">Début</label>
                </div>
                <div class="relative mb-3" data-te-datepicker-init data-te-input-wrapper-init>
                  <input name="end_date" type="text" class="peer block min-h-[auto] w-full rounded border-0 bg-transparent px-3 py-[0.32rem] leading-[1.6] outline-none transition-all duration-200 ease-linear focus:placeholder:opacity-100 peer-focus:text-primary data-[te-input-state-active]:placeholder:opacity-100 motion-reduce:transition-none dark:text-neutral-200 dark:placeholder:text-neutral-200 dark:peer-focus:text-primary [&:not([data-te-input-placeholder-active])]:placeholder:opacity-0" placeholder="Select a date" />
                  <label for="floatingInput" class="pointer-events-none absolute left-3 top-0 mb-0 max-w-[90%] origin-[0_0] truncate pt-[0.37rem] leading-[1.6] text-neutral-500 transition-all duration-200 ease-out peer-focus:-translate-y-[0.9rem] peer-focus:scale-[0.8] peer-focus:text-primary peer-data-[te-input-state-active]:-translate-y-[0.9rem] peer-data-[te-input-state-active]:scale-[0.8] motion-reduce:transition-none dark:text-neutral-200 dark:peer-focus:text-primary">Echéance</label>
                </div>
              </div>
            </div>

            <!--Modal footer-->
            <div class="flex flex-shrink-0 flex-wrap items-center justify-end rounded-b-md border-t-2 border-neutral-100 border-opacity-100 p-4 dark:border-opacity-50">
              <button type="button" class="inline-block rounded bg-primary-100 px-6 pb-2 pt-2.5 text-xs font-medium uppercase leading-normal text-primary-700 transition duration-150 ease-in-out hover:bg-primary-accent-100 focus:bg-primary-accent-100 focus:outline-none focus:ring-0 active:bg-primary-accent-200" data-te-modal-dismiss data-te-ripple-init data-te-ripple-color="light">
                Close
              </button>
              <button type="submit" class="ml-1 inline-block rounded bg-primary px-6 pb-2 pt-2.5 text-xs font-medium uppercase leading-normal text-white shadow-[0_4px_9px_-4px_#3b71ca] transition duration-150 ease-in-out hover:bg-primary-600 hover:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.3),0_4px_18px_0_rgba(59,113,202,0.2)] focus:bg-primary-600 focus:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.3),0_4px_18px_0_rgba(59,113,202,0.2)] focus:outline-none focus:ring-0 active:bg-primary-700 active:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.3),0_4px_18px_0_rgba(59,113,202,0.2)] dark:shadow-[0_4px_9px_-4px_rgba(59,113,202,0.5)] dark:hover:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.2),0_4px_18px_0_rgba(59,113,202,0.1)] dark:focus:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.2),0_4px_18px_0_rgba(59,113,202,0.1)] dark:active:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.2),0_4px_18px_0_rgba(59,113,202,0.1)]" data-te-ripple-init data-te-ripple-color="light">
                Save
              </button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
  <div>

    <button id="dropdownRadioButton" data-dropdown-toggle="dropdownDefaultRadio" class="flex items-center whitespace-nowrap rounded bg-primary-100 px-6 pb-1 pt-1.5 text-xs font-medium uppercase leading-normal text-neutral-800 shadow-[0_4px_9px_-4px_#fbfbfb] transition duration-150 ease-in-out hover:bg-neutral-100 hover:shadow-[0_8px_9px_-4px_rgba(251,251,251,0.3),0_4px_18px_0_rgba(251,251,251,0.2)] focus:bg-neutral-100 focus:shadow-[0_8px_9px_-4px_rgba(251,251,251,0.3),0_4px_18px_0_rgba(251,251,251,0.2)] focus:outline-none focus:ring-0 active:bg-neutral-200 active:shadow-[0_8px_9px_-4px_rgba(251,251,251,0.3),0_4px_18px_0_rgba(251,251,251,0.2)] motion-reduce:transition-none" type="button">
      Changer Semestre
      <svg class="w-2.5 h-2.5 ms-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 4 4 4-4" />
      </svg>
    </button>

    <!-- Dropdown menu -->
    <div id="dropdownDefaultRadio" class="z-10 hidden w-48 bg-white divide-y divide-gray-100 rounded-lg shadow dark:bg-gray-700 dark:divide-gray-600">
      <form action="{{ route('admin', ['year_id' => Session::get('year_id'), 'semester_id' => Session::get('semester_id')]) }}" method="get">
        <ul class="p-3 space-y-1 text-sm text-gray-700 dark:text-gray-200" aria-labelledby="dropdownRadioBgHoverButton">
          @isset($semesters)
          @foreach($semesters as $semester)
          <li>
            <div class="flex items-center p-2 rounded hover:bg-gray-100 dark:hover:bg-gray-600">
              <input id="{{ $semester->id }}" type="radio" name="semester_id" value="{{ $semester->id }}" onclick="this.form.submit()" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-700 dark:focus:ring-offset-gray-700 focus:ring-2 dark:bg-gray-600 dark:border-gray-500">
              <label for="{{ $semester->id }}" class="w-full ms-2 text-sm font-medium text-gray-900 rounded dark:text-gray-300">Semestre {{ $semester->name }}</label>
            </div>
          </li>
          @endforeach
          @endisset
        </ul>
      </form>

      <div class="p-3" data-te-select-custom-content-ref>
        <!-- Button trigger modal -->
        <button type="button" class="inline-block rounded bg-primary uppercase p-1 text-xs font-medium leading-normal text-white shadow-[0_4px_9px_-4px_#3b71ca] transition duration-150 ease-in-out hover:bg-primary-600 hover:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.3),0_4px_18px_0_rgba(59,113,202,0.2)] focus:bg-primary-600 focus:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.3),0_4px_18px_0_rgba(59,113,202,0.2)] focus:outline-none focus:ring-0 active:bg-primary-700 active:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.3),0_4px_18px_0_rgba(59,113,202,0.2)] dark:shadow-[0_4px_9px_-4px_rgba(59,113,202,0.5)] dark:hover:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.2),0_4px_18px_0_rgba(59,113,202,0.1)] dark:focus:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.2),0_4px_18px_0_rgba(59,113,202,0.1)] dark:active:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.2),0_4px_18px_0_rgba(59,113,202,0.1)]" data-te-toggle="modal" data-te-target="#exampleModal" data-te-ripple-init data-te-ripple-color="light">
          Creer
        </button>
      </div>
    </div>
    <!--Semester modal-->
    <div data-te-modal-init class="fixed left-0 top-0 z-[1055] hidden h-full w-full overflow-y-auto overflow-x-hidden outline-none" id="exampleModal" tabindex="1" aria-labelledby="exampleModalLabel" aria-modal="true">
      <div data-te-modal-dialog-ref class="pointer-events-none relative w-auto translate-y-[-50px] opacity-0 transition-all duration-300 ease-in-out min-[576px]:mx-auto min-[576px]:mt-7 min-[576px]:max-w-[300px]">
        <div class="pointer-events-auto relative flex w-full flex-col rounded-md border-none bg-white bg-clip-padding text-current shadow-lg outline-none dark:bg-neutral-600">
          <div class="flex flex-shrink-0 items-center justify-between rounded-t-md border-b-2 border-neutral-100 border-opacity-100 py-1 px-2 dark:border-opacity-50">
            <!--Modal title-->
            <h5 class="text-xl font-medium leading-normal text-neutral-800 dark:text-neutral-200" id="semesterModalSmLabel">
              Creer le Semestre
            </h5>
            <!--Close button-->
            <button type="button" class="box-content rounded-none border-none hover:no-underline hover:opacity-75 focus:opacity-100 focus:shadow-none focus:outline-none" data-te-modal-dismiss aria-label="Close">
              <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="h-6 w-6">
                <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
              </svg>
            </button>
          </div>

          <!--Modal body-->
          <form method="POST" action="{{ route('levels.store') }}">
            @csrf
            <div class="relative p-4">

              <!-- Semester Name -->
              <div class="relative" data-te-input-wrapper-init>
                <input type="number" name="semester" class="peer block min-h-[auto] w-full rounded border-0 bg-transparent px-3 py-[0.32rem] leading-[1.6] outline-none transition-all duration-200 ease-linear focus:placeholder:opacity-100 peer-focus:text-primary data-[te-input-state-active]:placeholder:opacity-100 motion-reduce:transition-none dark:text-neutral-200 dark:placeholder:text-neutral-200 dark:peer-focus:text-primary [&:not([data-te-input-placeholder-active])]:placeholder:opacity-0" id="exampleFormControlInput1" placeholder="Example label" />
                <label for="exampleFormControlInput1" class="pointer-events-none absolute left-3 top-0 mb-0 max-w-[90%] origin-[0_0] truncate pt-[0.37rem] leading-[1.6] text-neutral-500 transition-all duration-200 ease-out peer-focus:-translate-y-[0.9rem] peer-focus:scale-[0.8] peer-focus:text-primary peer-data-[te-input-state-active]:-translate-y-[0.9rem] peer-data-[te-input-state-active]:scale-[0.8] motion-reduce:transition-none dark:text-neutral-200 dark:peer-focus:text-primary">Par example: 1,2 ou 3...
                </label>
              </div>

            </div>

            <!--Modal footer-->
            <div class="flex flex-shrink-0 flex-wrap items-center justify-end rounded-b-md border-t-2 border-neutral-100 border-opacity-100 p-2 dark:border-opacity-50">
              <button type="button" class="inline-block rounded bg-primary-100  text-xs px-2 py-1 font-medium uppercase leading-normal text-primary-700 transition duration-150 ease-in-out hover:bg-primary-accent-100 focus:bg-primary-accent-100 focus:outline-none focus:ring-0 active:bg-primary-accent-200" data-te-modal-dismiss data-te-ripple-init data-te-ripple-color="light">
                Fermer
              </button>
              <button type="submit" class="ml-1 inline-block rounded bg-primary text-xs px-2 py-1 font-medium uppercase leading-normal text-white shadow-[0_4px_9px_-4px_#3b71ca] transition duration-150 ease-in-out hover:bg-primary-600 hover:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.3),0_4px_18px_0_rgba(59,113,202,0.2)] focus:bg-primary-600 focus:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.3),0_4px_18px_0_rgba(59,113,202,0.2)] focus:outline-none focus:ring-0 active:bg-primary-700 active:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.3),0_4px_18px_0_rgba(59,113,202,0.2)] dark:shadow-[0_4px_9px_-4px_rgba(59,113,202,0.5)] dark:hover:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.2),0_4px_18px_0_rgba(59,113,202,0.1)] dark:focus:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.2),0_4px_18px_0_rgba(59,113,202,0.1)] dark:active:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.2),0_4px_18px_0_rgba(59,113,202,0.1)]" data-te-ripple-init data-te-ripple-color="light">
                Creer
              </button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
@section('content')
<!--Section: Minimal statistics cards-->
<section>
  <div class="row">
    <a href="{{ route('students.index') }}" class="col-xl-3 col-sm-6 col-12 mb-4">
      <div>
        <div class="card">
          <div class="card-body">
            <div class="d-flex justify-content-between px-md-1">
              <div>
                <h3 class="text-success">{{ $count }}</h3>
                <p class="mb-0">Etudiant</p>
              </div>
              <div class="align-self-center">
                <!-- <i class="far fa-user text-success fa-3x"></i> -->
                <i class="fas fa-user-graduate text-success fa-3x"></i>
              </div>
            </div>
          </div>
        </div>
      </div>
    </a>
    <a href="{{ route('specialties.index') }}" class="col-xl-3 col-sm-6 col-12 mb-4">
      <div>
        <div class="card">
          <div class="card-body">
            <div class="d-flex justify-content-between px-md-1">
              <div>
                <h3 class="text-warning">{{$specialty_count}}</h3>
                <p class="mb-0">Spécialité</p>
              </div>
              <div class="align-self-center">
                <i class="fas fa-chart-pie text-warning fa-3x"></i>
              </div>
            </div>
          </div>
        </div>
      </div>
    </a>
    <a href="{{ route('uniteEseignements.index') }}" class="col-xl-3 col-sm-6 col-12 mb-4">
      <div>
        <div class="card">
          <div class="card-body">
            <div class="d-flex justify-content-between px-md-1">
              <div>
                <h3 class="text-info">{{$ue_count}}</h3>
                <p class="mb-0">Unite D'enseignement</p>
              </div>
              <div class="align-self-center">
                <i class="far fa-life-ring text-info fa-3x"></i>
              </div>
            </div>
          </div>
        </div>
      </div>
    </a>
    <a href="{{ route('cours.index') }}" class="col-xl-3 col-sm-6 col-12 mb-4">

      <div>
        <div class="card">
          <div class="card-body">
            <div class="d-flex justify-content-between px-md-1">
              <div>
                <h3 class="text-info">{{$course_count}}</h3>
                <p class="mb-0">Cours</p>
              </div>
              <div class="align-self-center">
                <i class="fas fa-book-open text-info fa-3x"></i>
              </div>
            </div>
          </div>
        </div>
      </div>
    </a>
  </div>
</section>
<!--Section: Minimal statistics cards-->

<!-- Section: Main chart -->
<section class="mb-4">
  <div class="card">
    <div class="card-header py-3">
      <h5 class="mb-0 text-center"><strong>Analytique</strong></h5>
    </div>
    <div class="flex justify-evenly w-full items-center my-4">
      <div class="w-1/4 overflow-hidden">
        @if($studentValidatedCount != 0 || $studentNotValidatedCount != 0)
        <canvas data-te-chart="doughnut" data-te-dataset-label="Traffic" data-te-labels="['Nombre De Validé', 'Nombre De Non validé']" data-te-dataset-data="[{{$studentValidatedCount}}, {{$studentNotValidatedCount}}]" data-te-dataset-background-color="['rgb(144,238,144)', 'rgba(255,0,0)']">
        </canvas>
        @endif
      </div>
      <div class="w-1/2 overflow-hidden">
        <div>
          <h4 class="text-lg h-8">

          </h4>
        </div>
        <canvas id="chart-options-example"></canvas>
      </div>
    </div>
  </div>
</section>
<!-- Section: Main chart -->

<!--Section: Sales Performance KPIs-->
<!-- <section class="mb-4">
  <div class="card">
    <div class="card-header text-center py-3">
      <h5 class="mb-0 text-center">
        <strong>Sales Performance KPIs</strong>
      </h5>
    </div>
    <div class="card-body">
      <div class="table-responsive">
        <table class="table table-hover text-nowrap">
          <thead>
            <tr>
              <th scope="col"></th>
              <th scope="col">Product Detail Views</th>
              <th scope="col">Unique Purchases</th>
              <th scope="col">Quantity</th>
              <th scope="col">Product Revenue</th>
              <th scope="col">Avg. Price</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <th scope="row">Value</th>
              <td>18,492</td>
              <td>228</td>
              <td>350</td>
              <td>$4,787.64</td>
              <td>$13.68</td>
            </tr>
            <tr>
              <th scope="row">Percentage change</th>
              <td>
                <span class="text-danger">
                  <i class="fas fa-caret-down me-1"></i><span>-48.8%%</span>
                </span>
              </td>
              <td>
                <span class="text-success">
                  <i class="fas fa-caret-up me-1"></i><span>14.0%</span>
                </span>
              </td>
              <td>
                <span class="text-success">
                  <i class="fas fa-caret-up me-1"></i><span>46.4%</span>
                </span>
              </td>
              <td>
                <span class="text-success">
                  <i class="fas fa-caret-up me-1"></i><span>29.6%</span>
                </span>
              </td>
              <td>
                <span class="text-danger">
                  <i class="fas fa-caret-down me-1"></i><span>-11.5%</span>
                </span>
              </td>
            </tr>
            <tr>
              <th scope="row">Absolute change</th>
              <td>
                <span class="text-danger">
                  <i class="fas fa-caret-down me-1"></i><span>-17,654</span>
                </span>
              </td>
              <td>
                <span class="text-success">
                  <i class="fas fa-caret-up me-1"></i><span>28</span>
                </span>
              </td>
              <td>
                <span class="text-success">
                  <i class="fas fa-caret-up me-1"></i><span>111</span>
                </span>
              </td>
              <td>
                <span class="text-success">
                  <i class="fas fa-caret-up me-1"></i><span>$1,092.72</span>
                </span>
              </td>
              <td>
                <span class="text-danger">
                  <i class="fas fa-caret-down me-1"></i><span>$-1.78</span>
                </span>
              </td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</section> -->
<!--Section: Sales Performance KPIs-->


<!--Section: Statistics with subtitles-->
<!-- <section>
  <div class="row">
    <div class="col-xl-6 col-md-12 mb-4">
      <div class="card">
        <div class="card-body">
          <div class="d-flex justify-content-between p-md-1">
            <div class="d-flex flex-row">
              <div class="align-self-center">
                <i class="fas fa-pencil-alt text-info fa-3x me-4"></i>
              </div>
              <div>
                <h4>Total Posts</h4>
                <p class="mb-0">Monthly blog posts</p>
              </div>
            </div>
            <div class="align-self-center">
              <h2 class="h1 mb-0">18,000</h2>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="col-xl-6 col-md-12 mb-4">
      <div class="card">
        <div class="card-body">
          <div class="d-flex justify-content-between p-md-1">
            <div class="d-flex flex-row">
              <div class="align-self-center">
                <i class="far fa-comment-alt text-warning fa-3x me-4"></i>
              </div>
              <div>
                <h4>Total Comments</h4>
                <p class="mb-0">Monthly blog posts</p>
              </div>
            </div>
            <div class="align-self-center">
              <h2 class="h1 mb-0">84,695</h2>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="row">
    <div class="col-xl-6 col-md-12 mb-4">
      <div class="card">
        <div class="card-body">
          <div class="d-flex justify-content-between p-md-1">
            <div class="d-flex flex-row">
              <div class="align-self-center">
                <h2 class="h1 mb-0 me-4">$76,456.00</h2>
              </div>
              <div>
                <h4>Total Sales</h4>
                <p class="mb-0">Monthly Sales Amount</p>
              </div>
            </div>
            <div class="align-self-center">
              <i class="far fa-heart text-danger fa-3x"></i>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="col-xl-6 col-md-12 mb-4">
      <div class="card">
        <div class="card-body">
          <div class="d-flex justify-content-between p-md-1">
            <div class="d-flex flex-row">
              <div class="align-self-center">
                <h2 class="h1 mb-0 me-4">$36,000.00</h2>
              </div>
              <div>
                <h4>Total Cost</h4>
                <p class="mb-0">Monthly Cost</p>
              </div>
            </div>
            <div class="align-self-center">
              <i class="fas fa-wallet text-success fa-3x"></i>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section> -->

<!--Section: Statistics with subtitles-->
@endsection