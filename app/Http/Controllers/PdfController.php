<?php

namespace App\Http\Controllers;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Item;

class PdfController extends Controller
{
    public function generateBrandPdf()
    {
        $brands = Brand::get();
        $data = [
            'title' => 'Brand Pdf Generater in Master Data Management',
            'date' => date('m/d/y'),
            'brands' => $brands
        ];

            $pdf = Pdf::loadView('brand.generate-brand-pdf', $data);
            return $pdf->download('invoice.pdf');
            return redirect()->route('brand.index')->with('status', 'Brand Pdf Download Successfully');
    }

    public function generateCategoryPdf()
    {
        $category = Category::get();
        $data = [
            'title' => 'Category Pdf Generater in Master Data Management',
            'date' => date('m/d/y'),
            'category' => $category
        ];

            $pdf = Pdf::loadView('category.generate-category-pdf', $data);
            return $pdf->download('invoice.pdf');
            return redirect()->route('category.index')->with('status', 'Category Pdf Download Successfully');
    }


    public function generateItemPdf()
    {
        $items = Item::get();
        $data = [
            'title' => 'Item Pdf Generater in Master Data Management',
            'date' => date('m/d/y'),
            'items' => $items
        ];

            $pdf = Pdf::loadView('items.generate-items-pdf', $data);
            return $pdf->download('invoice.pdf');
            return redirect()->route('items.index')->with('status', 'Item Pdf Download Successfully');
    }
}
