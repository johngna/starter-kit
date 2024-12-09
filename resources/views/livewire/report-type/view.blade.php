<div>

  <div
    class="d-flex flex-column flex-md-row justify-content-between align-items-start align-items-md-center mb-6 row-gap-4">
    <div class="d-flex flex-column justify-content-center">
      <h4 class="mb-1">Tipos de Denúncia</h4>
      {{-- <p class="mb-0"> tipo de denúncia</p> --}}
    </div>
    <div class="d-flex align-content-center flex-wrap gap-4">

      <a href="{{route('reportTypeForm', 'create')}}" class="btn btn-primary" form="category_form">Novo</a>
    </div>
  </div>


  <div class="row mb-6">

    @foreach ($reportTypes as $type)

    <div class="col-12 col-sm-6 col-lg-4 mb-6 d-flex align-items-stretch">
      <div class="card w-100 d-flex flex-column">
        <div class="card-body text-center flex-grow-1">
          <i class="mb-4 text-heading ti ti-{{$type->icon ?? 'category'}} text-primary" style="font-size: 64px"></i>
          <h5>{{$type->name}}</h5>
          <div style="text-align: left !important">
            <p>{!!$type->description!!}</p>
          </div>
        </div>
        <div class="card-footer mt-auto text-center">
          <a href="{{route('reportTypeForm', $type->id)}}" class="btn btn-secondary">Editar</a>
          <a href="{{route('reportForm', $type->id)}}" class="btn btn-primary">Selecionar</a>
        </div>
      </div>
    </div>

    @endforeach

  </div>
</div>