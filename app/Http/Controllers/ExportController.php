<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use PhpOffice\PhpSpreadsheet\Writer\Csv;
use Symfony\Component\HttpFoundation\StreamedResponse;
use App\Models\Brand; 
use App\Models\Item; 
use App\Models\Category; 

class ExportController extends Controller
{
    public function __construct(){
        $this->middleware('permission:export item', ['only' => ['export']]);
        $this->middleware('permission:export brand', ['only' => ['export']]);
        $this->middleware('permission:export category', ['only' => ['export']]);
    }
    public function exportBrandExcel()
    {
        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();

        // Add headers
        $sheet->setCellValue('A1', 'ID');
        $sheet->setCellValue('B1', 'Code');
        $sheet->setCellValue('C1', 'Name');
        $sheet->setCellValue('D1', 'Status');

        // Fetch data (example: Users)
        $brands = Brand::all();
        $row = 2;
        foreach ($brands as $brand) {
            $sheet->setCellValue('A' . $row, $brand->id);
            $sheet->setCellValue('B' . $row, $brand->code);
            $sheet->setCellValue('C' . $row, $brand->name);
            $sheet->setCellValue('D' . $row, $brand->status);
            $row++;
        }

        $writer = new Xlsx($spreadsheet);
        $fileName = 'Brand.xlsx';

        return new StreamedResponse(function() use($writer) {
            $writer->save('php://output');
        }, 200, [
            "Content-Type" => "application/vnd.openxmlformats-officedocument.spreadsheetml.sheet",
            "Content-Disposition" => "attachment; filename=\"Brand.xlsx\""
        ]);
    }

    // Export CSV
    public function exportBrandCsv()
    {
        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();

        // Add headers
        $sheet->setCellValue('A1', 'ID');
        $sheet->setCellValue('B1', 'Code');
        $sheet->setCellValue('C1', 'Name');
        $sheet->setCellValue('D1', 'Status');

        // Fetch data
        $brands = Brand::all();
        $row = 2;
        foreach ($brands as $brand) {
            $sheet->setCellValue('A' . $row, $brand->id);
            $sheet->setCellValue('B' . $row, $brand->code);
            $sheet->setCellValue('C' . $row, $brand->name);
            $sheet->setCellValue('D' . $row, $brand->status);
            $row++;
        }

        $writer = new Csv($spreadsheet);
        $fileName = 'Brand.csv';

        return new StreamedResponse(function() use($writer) {
            $writer->save('php://output');
        }, 200, [
            "Content-Type" => "text/csv",
            "Content-Disposition" => "attachment; filename=\"Brand.csv\""
        ]);
    }



    public function exportItemExcel()
    {
        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();

        // Add headers
        $sheet->setCellValue('A1', 'ID');
        $sheet->setCellValue('B1', 'Brand Name');
        $sheet->setCellValue('C1', 'Category Name');
        $sheet->setCellValue('D1', 'Code');
        $sheet->setCellValue('E1', 'Name');
        $sheet->setCellValue('F1', 'Status');

        // Fetch data (example: Users)
        $items = Item::all();
        $row = 2;
        foreach ($items as $item) {
            $sheet->setCellValue('A' . $row, $item->id);
            $sheet->setCellValue('B' . $row, $item->brand->name);
            $sheet->setCellValue('C' . $row, $item->category->name);
            $sheet->setCellValue('D' . $row, $item->code);
            $sheet->setCellValue('E' . $row, $item->name);
            $sheet->setCellValue('F' . $row, $item->status);
            $row++;
        }

        $writer = new Xlsx($spreadsheet);
        $fileName = 'Item.xlsx';

        return new StreamedResponse(function() use($writer) {
            $writer->save('php://output');
        }, 200, [
            "Content-Type" => "application/vnd.openxmlformats-officedocument.spreadsheetml.sheet",
            "Content-Disposition" => "attachment; filename=\"Item.xlsx\""
        ]);
    }

    // Export CSV
    public function exportItemCsv()
    {
        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();

        // Add headers
        $sheet->setCellValue('A1', 'ID');
        $sheet->setCellValue('B1', 'Brand Name');
        $sheet->setCellValue('C1', 'Category Name');
        $sheet->setCellValue('D1', 'Code');
        $sheet->setCellValue('E1', 'Name');
        $sheet->setCellValue('F1', 'Status');

        // Fetch data
        $items = Item::all();
        $row = 2;
        foreach ($items as $item) {
            $sheet->setCellValue('A' . $row, $item->id);
            $sheet->setCellValue('B' . $row, $item->brand->name );
            $sheet->setCellValue('C' . $row, $item->category->name);
            $sheet->setCellValue('D' . $row, $item->code);
            $sheet->setCellValue('E' . $row, $item->name);
            $sheet->setCellValue('F' . $row, $item->status);
            $row++;
        }

        $writer = new Csv($spreadsheet);
        $fileName = 'Item.csv';

        return new StreamedResponse(function() use($writer) {
            $writer->save('php://output');
        }, 200, [
            "Content-Type" => "text/csv",
            "Content-Disposition" => "attachment; filename=\"Item.csv\""
        ]);
    }


    public function exportCategoryExcel()
    {
        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();

        // Add headers
        $sheet->setCellValue('A1', 'ID');
        $sheet->setCellValue('B1', 'Code');
        $sheet->setCellValue('C1', 'Name');
        $sheet->setCellValue('D1', 'Status');

        // Fetch data (example: Users)
        $categories = Category::all();
        
        $row = 2;
        foreach ($categories as $category) {
            $sheet->setCellValue('A' . $row, $category->id);
            $sheet->setCellValue('B' . $row, $category->code);
            $sheet->setCellValue('C' . $row, $category->name);
            $sheet->setCellValue('D' . $row, $category->status);
            $row++;
        }

        $writer = new Xlsx($spreadsheet);
        $fileName = 'Category.xlsx';

        return new StreamedResponse(function() use($writer) {
            $writer->save('php://output');
        }, 200, [
            "Content-Type" => "application/vnd.openxmlformats-officedocument.spreadsheetml.sheet",
            "Content-Disposition" => "attachment; filename=\"Category.xlsx\""
        ]);
    }

    // Export CSV
    public function exportCategoryCsv()
    {
        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();

        // Add headers
        $sheet->setCellValue('A1', 'ID');
        $sheet->setCellValue('B1', 'Code');
        $sheet->setCellValue('C1', 'Name');
        $sheet->setCellValue('D1', 'Status');

        // Fetch data
        $categories = Category::all();
        $row = 2;
        foreach ($categories as $category) {
            $sheet->setCellValue('A' . $row, $category->id);
            $sheet->setCellValue('B' . $row, $category->code);
            $sheet->setCellValue('C' . $row, $category->name);
            $sheet->setCellValue('D' . $row, $category->status);
            $row++;
        }

        $writer = new Csv($spreadsheet);
        $fileName = 'Category.csv';

        return new StreamedResponse(function() use($writer) {
            $writer->save('php://output');
        }, 200, [
            "Content-Type" => "text/csv",
            "Content-Disposition" => "attachment; filename=\"Category.csv\""
        ]);
    }
}
