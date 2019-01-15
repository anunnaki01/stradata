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
        header('Set-Cookie: fileDownload=true; path=/');

        return $this->getExcelFile($data, $fileName)->export('xls');
    }

    public function getExcelFile($data, $fileName)
    {
        return Excel::create($fileName,
            function ($excel) use ($data) {
                $excel->sheet('Sheetname', function ($sheet) use ($data) {
                    $sheet->fromArray($data);
                });
            });
    }

    public function pdf($data, $fileName)
    {
        ini_set('max_execution_time', 0);
        set_time_limit(0);

        $pdf = PDF::loadView('pdf.export', compact('data'));
        //$pdf->save(storage_path().'/' . $fileName . '.pdf');
        $pdf->setPaper('A4', 'landscape');
        return $pdf->download($fileName . '.pdf');
    }

    public function getPdfFile($data)
    {
        $pdf = PDF::loadView('pdf.export', compact('data'));
        return $pdf->output();
    }
}