<?php

namespace App\Http\Controllers;

use App\Models\Item;
use App\Models\Brand;
use App\Models\Category;
use Illuminate\Http\Request;

class ItemController extends Controller
{
    public function __construct(){
        $this->middleware('permission:view item', ['only' => ['index']]);
        $this->middleware('permission:create item', ['only' => ['create', 'store']]);
        $this->middleware('permission:update item', ['only' => ['update', 'edit']]);
        $this->middleware('permission:delete item', ['only' => ['destroy']]);
    }

    public function index(Request $request)
{
    $query = Item::with(['brand', 'category']);

    // 🔎 Search by code or name
    if ($request->filled('search')) {
        $search = $request->input('search');
        $query->where(function($q) use ($search) {
            $q->where('code', 'like', "%{$search}%")
              ->orWhere('name', 'like', "%{$search}%");
        });
    }

    // 📌 Filter by status
    if ($request->filled('status')) {
        $query->where('status', $request->status);
    }

    // 📌 Filter by brand
    if ($request->filled('brand_id')) {
        $query->where('brand_id', $request->brand_id);
    }

    // 📌 Filter by category
    if ($request->filled('category_id')) {
        $query->where('category_id', $request->category_id);
    }

    $items = $query->paginate(5)->withQueryString();

    // Load brands & categories for dropdowns
    $brands = Brand::all();
    $categories = Category::all();

    return view('items.index', compact('items', 'brands', 'categories'));
}

    public function create()
    {
        $brands = Brand::all();
        $categories = Category::all();
        return view('items.create', compact('brands', 'categories'));
    }

    public function store(Request $request)
{
    $request->validate([
        'brand_id' => 'required|exists:master_brand,id',
        'category_id' => 'required|exists:master_category,id',
        'code' => 'required|string|max:255|unique:master_items,code',
        'name' => 'required|string|max:255',
        'attachment' => 'nullable|file|mimes:jpg,jpeg,png,pdf,doc,docx|max:2048',
    ]);

    $fileName = null;

    if ($request->hasFile('attachment')) {
        $file = $request->file('attachment');
        $fileName = time() . '_' . $file->getClientOriginalName();
        $file->move(public_path('uploads/items'), $fileName);
    }

    Item::create([
        'brand_id' => $request->brand_id,
        'category_id' => $request->category_id,
        'code' => $request->code,
        'name' => $request->name,
        'attachment' => $fileName,
        'status' => 'Active',
    ]);

    return redirect()->route('items.index')->with('status', 'Item Created Successfully');
}


    public function edit(Item $item)
    {
        $brands = Brand::all();
        $categories = Category::all();
        return view('items.edit', compact('item', 'brands', 'categories'));
    }

    public function update(Request $request, Item $item)
{
    $request->validate([
        'brand_id' => 'required|exists:master_brand,id',
        'category_id' => 'required|exists:master_category,id',
        'code' => 'required|string|max:255',
        'name' => 'required|string|max:255',
        'attachment' => 'nullable|file|mimes:jpg,jpeg,png,pdf|max:2048', // optional validation
        'status' => 'required|in:Active,Inactive',
    ]);

    $fileName = $item->attachment; // keep old file by default

    if ($request->hasFile('attachment')) {
        // delete old file if exists
        if ($item->attachment && file_exists(public_path('uploads/items/'.$item->attachment))) {
            unlink(public_path('uploads/items/'.$item->attachment));
        }

        // upload new file
        $file = $request->file('attachment');
        $fileName = time().'_'.$file->getClientOriginalName();
        $file->move(public_path('uploads/items'), $fileName);
    }

    $item->update([
        'brand_id' => $request->brand_id,
        'category_id' => $request->category_id,
        'code' => $request->code,
        'name' => $request->name,
        'attachment' => $fileName,
        'status' => $request->status,
    ]);

    return redirect()->route('items.index')->with('status', 'Item Updated Successfully');
}


    public function destroy(Item $item)
    {
        $item->delete();
        return redirect()->route('items.index')->with('success', 'Item deleted successfully!');
    }
}
