<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Brand;

class BrandController extends Controller
{
   public function __construct()
{
    $this->middleware('permission:view brand', ['only' => ['index']]);
    $this->middleware('permission:create brand', ['only' => ['create', 'store']]);
    $this->middleware('permission:update brand', ['only' => ['edit', 'update']]);
    $this->middleware('permission:delete brand', ['only' => ['destroy']]);
}


        public function index(Request $request)
{
    $query = Brand::query();

    
    if ($request->filled('search')) {
        $search = $request->input('search');
        $query->where(function($q) use ($search) {
            $q->where('name', 'like', "%{$search}%")
              ->orWhere('code', 'like', "%{$search}%");
        });
    }

    
    if ($request->filled('status')) {
        $query->where('status', $request->status);
    }

    $brands = $query->paginate(5)->withQueryString();

    return view('brand.index', compact('brands'));
}

    public function create()
    {
        return view('brand.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'code' => 'required|string|max:255|unique:master_brand,code'
        ]);

            Brand::create([
                'code' => $request->code,
                'name' => $request->name,
                'status' => 'Active', // optional default value
]);


            return redirect('brands')->with('status', 'Brand Created Successfully');
    }

    public function edit(Brand $brand)
{
    return view('brand.edit', [
        'brand' => $brand
    ]);
}


    public function update(Request $request, Brand $brand)
{
    $request->validate([
        'name' => 'required|string|max:255',
        // Ignore the current brand ID for unique check
        'code' => 'required|string|max:255|unique:master_brand,code,' . $brand->id,
        'status' => 'required|in:Active,Inactive',
    ]);

    $brand->update([
        'code' => $request->code,
        'name' => $request->name,
        'status' => $request->status,
    ]);

    return redirect('brands')->with('status', 'Brand Updated Successfully');
}


    public function destroy($brandId)
    {
        $brand = Brand::find($brandId);
        $brand->delete();
        return redirect('brands')->with('status', 'Brand Deleted Successfully');
    }

}
