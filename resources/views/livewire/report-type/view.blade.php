<div>
  <div class="row mb-6">

    @foreach ($reportTypes as $type)

    <div class="col-12 col-sm-6 col-lg-4 mb-6">
      <div class="card">
        <div class="card-body text-center">
          <i class="mb-4 text-heading ti ti-{{$type->icon ?? 'category'}} ti-32px"></i>
          <h5>{{$type->name}}</h5>
          <p> {{$type->description}}</p>
          <a href="{{route('reportTypeForm', $type->id)}}" class="btn btn-primary"> Editar
          </a>
        </div>
      </div>
    </div>

    @endforeach

  </div>
</div>
