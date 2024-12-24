@extends('layouts.app2')

@section('content')
@livewire('specialty-detail', ['specialtyId' => $specialty['id']])
@endsection