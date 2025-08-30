<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    
    public function __construct()
    {
        $this->middleware('permission:view category', ['only' => ['index']]);
    $this->middleware('permission:create category', ['only' => ['create', 'store']]);
    $this->middleware('permission:update category', ['only' => ['edit', 'update']]);
    $this->middleware('permission:delete category', ['only' => ['destroy']]);
    }

    public function index(Request $request)
{
    $query = Category::query();

    // 🔎 Search by name or code
    if ($request->filled('search')) {
        $search = $request->input('search');
        $query->where(function($q) use ($search) {
            $q->where('name', 'like', "%{$search}%")
              ->orWhere('code', 'like', "%{$search}%");
        });
    }

    // 📌 Filter by status
    if ($request->filled('status')) {
        $query->where('status', $request->status);
    }

    $categories = $query->paginate(5)->withQueryString();

    return view('category.index', compact('categories'));
}

    public function create()
    {
        return view('category.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'code' => 'required|string|max:255|unique:master_category,code'
        ]);

            Category::create([
                'code' => $request->code,
                'name' => $request->name,
                'status' => 'Active', // optional default value
]);


            return redirect('categories')->with('status', 'Category Created Successfully');
    }

    public function edit(Category $category)
{
    return view('category.edit', [
        'category' => $category
    ]);
}

    public function update(Request $request, Category $category)
{
    $request->validate([
        'name' => 'required|string|max:255',
        'code' => 'required|string|max:255|unique:master_category,code,' . $category->id,
        'status' => 'required|in:Active,Inactive',
    ]);

    $category->update([
        'code' => $request->code,
        'name' => $request->name,
        'status' => $request->status,
    ]);

    return redirect('categories')->with('status', 'Category Updated Successfully');
}
    
 public function destroy($categoryId)
    {
        $category = Category::find($categoryId);
        $category->delete();
        return redirect('categories')->with('status', 'Category Deleted Successfully');
    }

}
