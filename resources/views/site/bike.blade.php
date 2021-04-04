@extends('layouts.app')

@push('page-title')
HomePage
@endpush

@push('css')
<link href="{{ asset('assets/libs/fancybox/css/jquery.fancybox.css') }}" rel="stylesheet" media="screen">
@endpush


@section('content')
<div class="row mb-4">
  <div class="col-md-6">
    <article class="gallery-wrap">
      <div class="img-big-wrap text-center">
        <div>
          <img id="zoom" src="{{asset('storage/gallery/'.$bike->thumbnail)}}" data-zoom-image="{{asset('storage/gallery/'.$bike->thumbnail)}}" height="280px">
  </div>
</div>
<!-- slider-product.// -->
<div class="img-small-wrap" id="gallery">
  <div class="item-gallery"> <img src="{{asset('storage/gallery/'.$bike->thumbnail)}}" width="60px"></div>
  <div class="item-gallery"> <img src="{{asset('storage/gallery/'.$bike->thumbnail)}}" width="60px"></div>
  <div class="item-gallery"> <img src="{{asset('storage/gallery/'.$bike->thumbnail)}}" width="60px"></div>
  <div class="item-gallery"> <img src="{{asset('storage/gallery/'.$bike->thumbnail)}}" width="60px"></div>
</div>
<!-- slider-nav.// -->
</article>

</div>
<div class="col-md-6">
  <div class="card">
    <h5 class="card-header">Basic Details</h5>
    <div class="card-body row">
      <table class="table table-striped">
        <tbody>
          <tr>
            <td>Name</td>
            <td>:</td>
            <td>{{ $bike->name }}</td>
          </tr>
          <tr>
            <td>Brand</td>
            <td>:</td>
            <td>{{ $bike->brand->name }}</td>
          </tr>
          <tr>
            <td>Capacity</td>
            <td>:</td>
            <td>{{ $bike->capacity->name }}</td>
          </tr>
          <tr>
            <td>Category</td>
            <td>:</td>
            <td>{{ $bike->category->name }}</td>
          </tr>
          <tr>
            <td>Availability</td>
            <td>:</td>
            <td>{{ $bike->product_availability }}</td>
          </tr>
          <tr>
            <td>Launched At</td>
            <td>:</td>
            <td>{{$bike->launched_at}}</td>
          </tr>
          <tr>
            <td>Price</td>
            <td>:</td>
            <td>{{ number_format($bike->price, 0) }} BDT</td>
          </tr>
        </tbody>
      </table>
    </div>
  </div>
</div>
</div>

<div class="row mb-4">
  <div class="col-md-12">
    <h1 class="avail text-center">{{ $bike->name }} Bike Description</h1>
    <div class="card mb-4 border-0">
      <div class="card-body" style="background-color: none;">

        Below you will get updated official Suzuki Bike Price In BD2021 list & all Suzuki motorcycle in Bangladesh showroom address with latest Suzuki motorbikes specifications, images.

        Suzuki Bangladesh is one of the most popular motorcycle companies in our country (Source). Suzuki Gixxer series is the most popular Suzuki bikes in BD. Rancon Motorbikes Ltd – Selling Suzuki bikes in BD from 2014.
      </div>
    </div>
  </div>

  <div class="col-md-12">
    <h1 class="avail text-center">{{ $bike->name }} Bike Specifications</h1>
    <div class="card">
      <h5 class="card-header">Basic Details</h5>
      <div class="card-body row">
        <div class="col-md-8 offset-md-2">
          <table class="table table-striped">
            <tbody>
              <tr>
                <td>Name</td>
                <td>:</td>
                <td>{{ $bike->name }}</td>
              </tr>
              <tr>
                <td>Brand</td>
                <td>:</td>
                <td>{{ $bike->brand->name }}</td>
              </tr>
              <tr>
                <td>Capacity</td>
                <td>:</td>
                <td>{{ $bike->capacity->name }}</td>
              </tr>
              <tr>
                <td>Category</td>
                <td>:</td>
                <td>{{ $bike->category->name }}</td>
              </tr>
              <tr>
                <td>Price</td>
                <td>:</td>
                <td>{{ $bike->price }}</td>
              </tr>
              <tr>
                <td>Availability</td>
                <td>:</td>
                <td>{{ $bike->product_availability }}</td>
              </tr>
              <tr>
                <td>Launched At</td>
                <td>:</td>
                <td>{{$bike->launched_at}}</td>
              </tr>
            </tbody>
          </table>
        </div>

      </div>
    </div>
    <!-- Engine & Transmission -->
    <div class="card">
      <h5 class="card-header">Engine & Transmission</h5>
      <div class="card-body row">
        <div class="col-md-8 offset-md-2">
          <table class="table table-striped">
            <tbody>
              <tr v-if="bike.displacement !== null">
                <td>Displacement</td>
                <td>:</td>
                <td>{{ $bike->displacement }}</td>
              </tr>
              <tr v-if="bike.top_speed !== null">
                <td>Top Speed</td>
                <td>:</td>
                <td>{{ $bike->top_speed }}</td>
              </tr>
              <tr v-if="bike.max_power !== null">
                <td>Max Power</td>
                <td>:</td>
                <td>{{ $bike->max_power }}</td>
              </tr>
              <tr v-if="bike.max_torque !== null">
                <td>Max Torque</td>
                <td>:</td>
                <td>{{ $bike->max_torque }}</td>
              </tr>
              <tr v-if="bike.bore !== null">
                <td>Bore</td>
                <td>:</td>
                <td>{{ $bike->bore }}</td>
              </tr>
              <tr v-if="bike.stroke !== null">
                <td>Stroke</td>
                <td>:</td>
                <td>{{ $bike->stroke }}</td>
              </tr>
              <tr v-if="bike.gear !== null">
                <td>Gear</td>
                <td>:</td>
                <td>{{ $bike->gear }}</td>
              </tr>
              <tr v-if="bike.clutch !== null">
                <td>Clutch</td>
                <td>:</td>
                <td>{{ $bike->clutch }}</td>
              </tr>
              <tr v-if="bike.cooling_system !== null">
                <td>Cooling System</td>
                <td>:</td>
                <td>{{ $bike->cooling_system }}</td>
              </tr>
              <tr v-if="bike.fuel_supply !== null">
                <td>Fuel Supply</td>
                <td>:</td>
                <td>{{ $bike->fuel_supply }}</td>
              </tr>
              <tr v-if="bike.starting_method !== null">
                <td>Starting Method</td>
                <td>:</td>
                <td>{{ $bike->starting_method }}</td>
              </tr>
              <tr v-if="bike.mileage !== null">
                <td>Mileage</td>
                <td>:</td>
                <td>{{ $bike->mileage }}</td>
              </tr>
            </tbody>

          </table>
        </div>
      </div>
    </div>

    <!-- Basic Details -->
    <div class="card">
      <h5 class="card-header">Dimensions</h5>
      <div class="card-body row">
        <div class="col-md-8 offset-md-2">
          <table class="table table-striped">
            <tbody>
              <tr v-if="bike.fuel_tank_capacity !== null">
                <td>Fuel Tank Capacity</td>
                <td>:</td>
                <td>{{$bike->fuel_tank_capacity}}</td>
              </tr>
              <tr v-if="bike.fuel_reserve !== null">
                <td>Fuel Reserve</td>
                <td>:</td>
                <td>{{$bike->fuel_reserve}}</td>
              </tr>
              <tr v-if="bike.ground_clearance !== null">
                <td>Ground Clearance</td>
                <td>:</td>
                <td>{{$bike->ground_clearance}}</td>
              </tr>
              <tr v-if="bike.height !== null">
                <td>Height</td>
                <td>:</td>
                <td>{{$bike->height}}</td>
              </tr>
              <tr v-if="bike.length !== null">
                <td>Length</td>
                <td>:</td>
                <td>{{$bike->length}}</td>
              </tr>
              <tr v-if="bike.width !== null">
                <td>Width</td>
                <td>:</td>
                <td>{{$bike->width}}</td>
              </tr>
              <tr v-if="bike.wheelbase !== null">
                <td>Wheel Base</td>
                <td>:</td>
                <td>{{$bike->wheelbase}}</td>
              </tr>
            </tbody>
          </table>
        </div>

      </div>
    </div>

    <!-- Basic Details -->
    <div class="card">
      <h5 class="card-header">Brakes & Tyres</h5>
      <div class="card-body row">
        <div class="col-md-8 offset-md-2">
          <table class="table table-striped">
            <tbody>
              <tr v-if="bike.braking_system !== null">
                <td>Braking System</td>
                <td>:</td>
                <td>{{$bike->braking_system}}</td>
              </tr>
              <tr v-if="bike.front_brake !== null">
                <td>Front Brake</td>
                <td>:</td>
                <td>{{$bike->front_brake}}</td>
              </tr>
              <tr v-if="bike.rear_brake !== null">
                <td>Rear Brake</td>
                <td>:</td>
                <td>{{$bike->rear_brake}}</td>
              </tr>
              <tr v-if="bike.front_tyre !== null">
                <td>Front Tyre</td>
                <td>:</td>
                <td>{{$bike->front_tyre}}</td>
              </tr>
              <tr v-if="bike.rear_tyre !== null">
                <td>Rear Tyre</td>
                <td>:</td>
                <td>{{$bike->rear_tyre}}</td>
              </tr>
            </tbody>
          </table>

        </div>
      </div>
    </div>

    <!-- Suspension & cheassis -->
    <div class="card">
      <h5 class="card-header">Suspension & cheassis</h5>
      <div class="card-body row">
        <div class="col-md-8 offset-md-2">
          <table class="table table-striped">
            <tbody>
              <tr v-if="bike.chassis_type !== null">
                <td>Chassis Type</td>
                <td>:</td>
                <td>{{$bike->chassis_type}}</td>
              </tr>
              <tr v-if="bike.front_suspension !== null">
                <td>Front Suspension</td>
                <td>:</td>
                <td>{{$bike->front_suspension}}</td>
              </tr>
              <tr v-if="bike.rear_suspension !== null">
                <td>Rear Suspension</td>
                <td>:</td>
                <td>{{$bike->rear_suspension}}</td>
              </tr>
            </tbody>
          </table>
        </div>

      </div>
    </div>

    <!-- Electical-->
    <div class="card">
      <h5 class="card-header">Electical</h5>
      <div class="card-body row">
        <div class="col-md-8 offset-md-2">
          <table class="table table-striped">
            <tbody>
              <tr v-if="bike.battery !== null">
                <td>Battery</td>
                <td>:</td>
                <td>{{$bike->battery}}</td>
              </tr>
              <tr v-if="bike.head_light !== null">
                <td>Head Light</td>
                <td>:</td>
                <td>{{$bike->head_light}}</td>
              </tr>
              <tr v-if="bike.tail_light !== null">
                <td>Tail Light</td>
                <td>:</td>
                <td>{{$bike->tail_light}}</td>
              </tr>
              <tr v-if="bike.indicator_light !== null">
                <td>Indicator Light</td>
                <td>:</td>
                <td>{{$bike->indicator_light}}</td>
              </tr>
            </tbody>
          </table>
        </div>

      </div>
    </div>

    <!-- Features -->
    <div class="card">
      <h5 class="card-header">Features</h5>
      <div class="card-body row">
        <div class="col-md-8 offset-2">
          <table class="table table-striped">
            <tbody>
              <tr>
                <td>Clock</td>
                <td>:</td>
                <td>
                  @if($bike->clock == 'Available')

                  <i class="fas fa-check-circle">
                    @else

                    <i class="fas fa-times-circle"></i>
                    @endif
                </td>
              </tr>
              <tr>
                <td>Engine Kill Switch</td>
                <td>:</td>
                <td>
                  @if($bike->engine_kill_switchk == 'Available')

                  <i class="fas fa-check-circle">
                    @else

                    <i class="fas fa-times-circle"></i>
                    @endif
                </td>
              </tr>
              <tr>
                <td>Pass Light</td>
                <td>:</td>
                <td>
                  @if($bike->pass_light == 'Available')

                  <i class="fas fa-check-circle">
                    @else

                    <i class="fas fa-times-circle"></i>
                    @endif
                </td>
              </tr>
              <tr>
                <td>Speedometer</td>
                <td>:</td>
                <td>
                  @if($bike->speedometer == 'Available')

                  <i class="fas fa-check-circle">
                    @else

                    <i class="fas fa-times-circle"></i>
                    @endif
                </td>
              </tr>
              <tr>
                <td>Techometer</td>
                <td>:</td>
                <td>@if($bike->techometer == 'Available')

                  <i class="fas fa-check-circle">
                    @else

                    <i class="fas fa-times-circle"></i>
                    @endif
                </td>
                </td>
              </tr>
              <tr>
                <td>Gear Indicator</td>
                <td>:</td>
                <td>@if($bike->gear_indicator == 'Available')

                  <i class="fas fa-check-circle">
                    @else

                    <i class="fas fa-times-circle"></i>
                    @endif
                </td>
                </td>
              </tr>
              <tr>
                <td>Low Battery Indicator</td>
                <td>:</td>
                <td>@if($bike->low_battery_indicator == 'Available')

                  <i class="fas fa-check-circle">
                    @else

                    <i class="fas fa-times-circle"></i>
                    @endif
                </td>
                </td>
              </tr>
              <tr>
                <td>Low Fuel Indicator</td>
                <td>:</td>
                <td>@if($bike->low_fuel_indicator == 'Available')

                  <i class="fas fa-check-circle">
                    @else

                    <i class="fas fa-times-circle"></i>
                    @endif
                </td>
                </td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</div>
<h2 class="avail text-center mb-4 mt-4">Related bike</h2>
<div class="row mb-4">
  @foreach($bikes as $bike)
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
<script src="{{ asset('assets/libs/zoom/jquery-1.8.3.min.js') }}"></script>
<script src="{{ asset('assets/libs/zoom/jquery.elevatezoom.js') }}"></script>

<script type="text/javascript" src="{{ asset('assets/libs/fancybox/js/jquery.fancybox.pack.js') }}"></script>
<script>
  $("#zoom").elevateZoom({
    zoomType: "inner",
    cursor: "crosshair"
  });
</script>
@endpush