@php
$configData = Helper::appClasses();
@endphp

@extends('layouts/layoutMaster')

@section('title', 'Page 2')


@section('content')

@livewire('report-type.view')

{{-- @livewire('report-type.form') --}}

@endsection
