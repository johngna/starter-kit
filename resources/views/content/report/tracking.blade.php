@extends('layouts/layoutMaster')

@section('title', 'Consulta de Protocolo')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            @livewire('report.tracking.protocol-search')
        </div>
    </div>
</div>
@endsection
