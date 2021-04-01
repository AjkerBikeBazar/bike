<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Bike;
use Illuminate\Http\Request;

class BikeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Bike::orderByDesc('id')->with(['brand', 'category'])->get();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $bike = new Bike();
        $bike->name                = $request->name                ;
        $bike->category_id         = $request->category_id         ;
        $bike->brand_id            = $request->brand_id            ;
        $bike->price               = $request->price               ;
        $bike->product_availability= $request->product_availability;
        $bike->displacement        = $request->displacement        ;
        $bike->max_power           = $request->max_power           ;
        $bike->max_torque          = $request->max_torque          ;
        $bike->bore                = $request->bore                ;
        $bike->stroke              = $request->stroke              ;
        $bike->gear                = $request->gear                ;
        $bike->clutch              = $request->clutch              ;
        $bike->cooling_system      = $request->cooling_system      ;
        $bike->fuel_supply         = $request->fuel_supply         ;
        $bike->starting_method     = $request->starting_method     ;
        $bike->fuel_tank_capacity  = $request->fuel_tank_capacity  ;
        $bike->fuel_reserve        = $request->fuel_reserve        ;
        $bike->ground_clearance    = $request->ground_clearance    ;
        $bike->height              = $request->height              ;
        $bike->length              = $request->length              ;
        $bike->width               = $request->width               ;
        $bike->weight              = $request->weight              ;
        $bike->wheelbase           = $request->wheelbase           ;
        $bike->braking_system      = $request->braking_system      ;
        $bike->front_brake         = $request->front_brake         ;
        $bike->rear_brake          = $request->rear_brake          ;
        $bike->front_tyre          = $request->front_tyre          ;
        $bike->rear_tyre           = $request->rear_tyre           ;
        $bike->chassis_type        = $request->chassis_type        ;
        $bike->front_suspension    = $request->front_suspension    ;
        $bike->rear_suspension     = $request->rear_suspension     ;
        $bike->battery             = $request->battery             ;
        $bike->head_light          = $request->head_light          ;
        $bike->tail_light          = $request->tail_light          ;
        $bike->indicator_light     = $request->indicator_light     ;
        $bike->clock               = $request->clock               ;
        $bike->engine_kill_switch  = $request->engine_kill_switch  ;
        $bike->pass_light          = $request->pass_light          ;
        $bike->speedometer         = $request->speedometer         ;
        $bike->techometer          = $request->techometer          ;
        $bike->gear_indicator      = $request->gear_indicator      ;
        $bike->low_battery_indicator= $request->low_battery_indicator;
        $bike->low_fuel_indicator  = $request->low_fuel_indicator  ;
        $bike->capacity_id         = $request->capacity_id  ;
        $bike->launched_at         = $request->launched_at  ;
        $bike->save();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return Bike::with(['category', 'capacity', 'brand'])->findorfail($id);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
