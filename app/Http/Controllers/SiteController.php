<?php

namespace App\Http\Controllers;

use App\Models\Bike;
use App\Models\Brand;
use App\Models\Capacity;
use App\Models\Category;
use Illuminate\Http\Request;

class SiteController extends Controller
{
    public function index()
    {
        $recentbikes = Bike::take(8)->orderBy('id')->get();
        return view('site.index', compact('recentbikes'));
    }

    public function brands()
    {
        $brands = Brand::all();
        
        return view('site.brands', compact('brands'));
    }


    public function brand($slug)
    {
        $brand = Brand::where('slug', $slug)->firstorfail();
        $bikes = Bike::where('brand_id', $brand->id)->orderBy('price', 'desc')->get();
        
        return view('site.brand', compact('brand', 'bikes'));
    }


    public function categories()
    {
        $categories = Category::all();

        return view('site.categories', compact('categories'));
    }

    public function category($slug)
    {
        $category = Category::where('slug', $slug)->firstorfail();
        $bikes = Bike::where('category_id', $category->id)->paginate(20);

        return view('site.category', compact('category', 'bikes'));
    }

    public function capacity($slug)
    {
        $capacity = Capacity::where('slug', $slug)->firstorfail();
        $bikes = Bike::where('capacity_id', $capacity->id)->paginate(20);

        return view('site.capacity', compact('capacity', 'bikes'));
    }

    public function bike($slug)
    {
        $bike = Bike::where('slug', $slug)->firstorfail();
        $bikes = Bike::take(4)->inRandomOrder()->get();

        return view('site.bike', compact('bike', 'bikes'));
    }

    public function privacyPolicy()
    {
        return view('site.privacy-policy');
    }

    public function termsConditions()
    {
        return view('site.terms-condition');
    }

    public function disclaimer()
    {
        return view('site.disclaimer');
    }

    public function contact()
    {
        return view('site.contact');
    }

    public function contactPost(Request $request)
    {
        $name = $request->name;
        $phone = $request->phone;
        $subject = $request->subject;
        $body = $request->massage;

        return $request->all();
    }
}
