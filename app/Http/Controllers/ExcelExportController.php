<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use App\Models\Barang; // Import the Barang model

class ExcelExportController extends Controller
{
    public function export()
    {
        // Create a new Spreadsheet object
        $spreadsheet = new Spreadsheet();

        // Set document properties
        $spreadsheet->getProperties()->setCreator('Your Name')
            ->setTitle('Barang Export Example');

        // Add some data
        $sheet = $spreadsheet->getActiveSheet();
        $sheet->setCellValue('A1', 'ID Barang');
        $sheet->setCellValue('B1', 'Nama Barang');
        $sheet->setCellValue('C1', 'Slug');
        $sheet->setCellValue('D1', 'Stok Barang');
        $sheet->setCellValue('E1', 'Harga Barang');
        $sheet->setCellValue('F1', 'Is Arsip');
        $sheet->setCellValue('G1', 'Deskripsi Barang');

        // Fetch data from the Barang model
        $data = Barang::all(); // Fetch all barang records

        // Add data to the spreadsheet
        $row = 2; // Start from the second row
        foreach ($data as $barang) {
            $sheet->setCellValue('A' . $row, $barang->id_barang);
            $sheet->setCellValue('B' . $row, $barang->nama_barang);
            $sheet->setCellValue('C' . $row, $barang->slug);
            $sheet->setCellValue('D' . $row, $barang->stok_barang);
            $sheet->setCellValue('E' . $row, $barang->harga_barang);
            $sheet->setCellValue('F' . $row, $barang->is_arsip);
            $sheet->setCellValue('G' . $row, $barang->deks_barang);
            $row++;
        }

        // Create a writer and download the file
        $writer = new Xlsx($spreadsheet);
        $fileName = 'barang.xlsx';

        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment; filename="' . $fileName . '"');
        header('Cache-Control: max-age=0');
        $writer->save('php://output');
        exit;
    }
}
