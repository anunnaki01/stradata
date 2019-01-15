<?php
/**
 * Created by PhpStorm.
 * User: juan
 * Date: 14/01/19
 * Time: 11:23 PM
 */

namespace App\Classes;

use Excel;
use PDF;

class Export
{
    public function excel(array $data, $fileName)
    {
        Excel::create($fileName, function ($excel) use ($data) {
            $excel->sheet('Sheetname', function ($sheet) use ($data) {
                $sheet->fromArray($data);
            });
        })->export('xls');
    }

    public function pdf($data, $fileName)
    {
        $pdf = PDF::loadView('pdf.export', compact('data'));
        //$pdf->save(storage_path().'/' . $fileName . '.pdf');
        return $pdf->download($fileName . '.pdf');
    }
}