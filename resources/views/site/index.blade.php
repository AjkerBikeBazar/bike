@extends('layouts.app')

@push('page-title')
    HomePage
@endpush

@push('css')

@endpush


@section('content')
<div class="jumbotron">
  <h1 class="display-4">Hello, world!</h1>
  <p class="lead">This is a simple hero unit, a simple jumbotron-style component for calling extra attention to featured content or information.</p>
  <hr class="my-4">
  <p>It uses utility classes for typography and spacing to space content out within the larger container.</p>
  <a class="btn btn-primary btn-lg" href="#" role="button">Learn more</a>
</div>

<h1 class="text-center mb-4" style="border: 4px solid whitesmoke; padding-bottom: 5px">Recent Bikes in Bangladesh</h1>
<div class="row">
    @foreach($recentbikes as $bike)
    <div class="col-md-3 mb-4">
        <div class="card">
            <img src="{{asset('storage/gallery/'.$bike->thumbnail)}}" width="174" height="203" class="card-img-top" alt="{{$bike->name}}">
            <div class="card-body text-center">
                <h5 class="card-title">{{$bike->name}}</h5>
                <div class="bike-engine">
                    engine : {{$bike->capacity->name}}
                </div>
                <div class="bike-speed">
                    Top Speed : {{$bike->top_speed}} Kmph
                </div>
                <div class="bike-mileage">
                    Mileage : {{$bike->mileage}} Kmph
                </div>
                <div class="bike-price">
                    Price : {{number_format($bike->price), 2}} BDT
                </div>
                <a href="{{route('site.bike', $bike->slug)}}" class="btn btn-primary"><i class="fas fa-motorcycle fa-fw"></i> More Details</a>
            </div>
        </div>
    </div>
    @endforeach
</div>
@endsection


@push('js')

@endpush