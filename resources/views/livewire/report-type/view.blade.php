<div>
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
        <a href="{{route('reportTypeForm', $type->id)}}" class="btn btn-primary">Selecionar</a>
      </div>
      </div>
    </div>

    @endforeach

  </div>
</div>
