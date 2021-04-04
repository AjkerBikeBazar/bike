<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Bike;
use App\Models\BikeGallery;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;

class GalleryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        return BikeGallery::where('bike_id', $id)->get();
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
    public function store(Request $request, $id)
    {
        //return $request->file('photo')->getClientOriginalName();
        $image = $request->file('photo');
        if (isset($image)) {
            // make unipue name for image
            //$currentDate = Carbon::now()->toDateString();
            $imageName  = Str::slug($request->name) . '.' . $image->getClientOriginalExtension();
            if (!Storage::disk('public')->exists('gallery')) {
                Storage::disk('public')->makeDirectory('gallery');
            }
            $postImage = Image::make($image)->resize(350, 300)->stream();
            Storage::disk('public')->put('gallery/' . $imageName, $postImage);
        } else {
            $imageName = "";
        }
        $gallery = new BikeGallery();
        $gallery->bike_id = $id;
        $gallery->name = $request->name;
        $gallery->image = $imageName;
        $gallery->save();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
        $gallery = BikeGallery::findorfail($id);
        if (Storage::disk('public')->exists('gallery/'.$gallery->image))
        {
            Storage::disk('public')->delete('gallery/'.$gallery->image);
        }
        $gallery->delete();
    }

    public function isMain($id, $gallery)
    {
        $count = BikeGallery::where('bike_id', $id)->where('is_main', 1)->count('id');
        //return $count;
        if($count >= 1){
            return response()->json('error', 201);
        }

        $photo =BikeGallery::findorfail($gallery);
        $photo->is_main = 1;
        $photo->update();

        $bike = Bike::findorfail($id);
        $bike->thumbnail = $photo->image;
        $bike->update();

        // $isMain = BikeGallery::findorfail($gallery);
        // $isMain->is_main = 1;
        // $isMain->update();


    }

    public function remove($id)
    {
        $photo =BikeGallery::findorfail($id);
        $photo->is_main = 0;
        $photo->update();

        $bike = Bike::findorfail($photo->bike_id);
        $bike->thumbnail = null;
        $bike->update();
    }
}
