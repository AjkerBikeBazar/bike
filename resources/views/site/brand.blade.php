@extends('layouts.app')

@push('page-title')
HomePage
@endpush

@push('css')

@endpush


@section('content')
<h1 class="avail text-center">{{$brand->name}} Bike in Bangladesh</h1>
<div class="card mb-4 border-0">

    <div class="card-body" style="background-color: none;">
        {!! $brand->description !!}
   </div>
</div>
<h2 class="avail text-center mb-4">Available {{$brand->name}} Bike in Bangladesh {{date('Y')}}</h2>
<div class="row">
    @foreach($bikes as $bike)
    <div class="col-md-3 mb-4">
        <div class="card">
            <img src="{{asset('storage/gallery/'.$bike->thumbnail)}}" width="174" height="203" class="card-img-top" alt="{{$bike->name}}">
            <div class="card-body text-center">
                <h5 class="card-title">{{$bike->name}}</h5>
                <div class="bike-engine">
                    Engine : {{$bike->capacity->name}}
                </div>
                <div class="bike-speed">
                    Top Speed : {{$bike->top_speed}} Kmph
                </div>
                <div class="bike-mileage">
                    Mileage : {{$bike->mileage}} Kmph
                </div>
                <div class="bike-price">
                    Price : {{number_format($bike->price, 0)}} BDT
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
