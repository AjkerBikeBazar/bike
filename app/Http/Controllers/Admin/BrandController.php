<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;

class BrandController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Brand::orderByDesc('id')->get();
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
        //$watermark = Image::make('assets/images/red.png')->resize(160, 120);

        $image = $request->file('logo');
        if (isset($image)) {
            // make unipue name for image
            //$currentDate = Carbon::now()->toDateString();
            $imageName  = Str::slug($request->name) .'-bike-in-bangladesh'. '.' . $image->getClientOriginalExtension();
            if (!Storage::disk('public')->exists('gallery')) {
                Storage::disk('public')->makeDirectory('gallery');
            }
            //$postImage = Image::make($image)->insert($watermark, 'top-left', 10, 10)->stream();
            $postImage = Image::make($image)->stream();
            Storage::disk('public')->put('gallery/' . $imageName, $postImage);
        } else {
            $imageName = "";
        }
        //dd($request);
        $brand = new Brand();
        $brand->name = $request->name;
        $brand->logo = $imageName;
        $brand->description = $request->description;
        $brand->meta_keyword = $request->meta_keyword;
        $brand->meta_description = $request->meta_description;
        $brand->save();
        
        //return $brand;


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
        $brand = Brand::findorfail($id);
        if (Storage::disk('public')->exists('gallery/'.$brand->logo))
        {
            Storage::disk('public')->delete('gallery/'.$brand->logo);
        }
        $brand->delete();
    }
}
