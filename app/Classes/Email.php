<?php
/**
 * Created by PhpStorm.
 * User: juan
 * Date: 15/01/19
 * Time: 10:00 AM
 */

namespace App\Classes;

use Auth;

class Email
{
    public function sendPdfFile($file)
    {
        \Mail::send('mail.dummy', ["data" => "Reporte"], function ($m) use ($file) {
            $m->from('application@app.com', 'Aplicacion');
            $m->to(Auth::user()->email)->subject('Invoice');
            $m->attachData($file, "Reporte.pdf");
        });
        return $this->validateSendEmail();
    }

    public function sendExcelFile($file)
    {
        \Mail::send('mail.dummy', ["data" => "Reporte"], function ($m) use ($file) {
            $m->from('application@app.com', 'Aplicacion');
            $m->to(Auth::user()->email)->subject('Reporte');
            $m->attach($file->store("xls", false, true)['full']);
        });

        return $this->validateSendEmail();
    }

    private function validateSendEmail(): bool
    {
        if (\Mail::failures()) {
            return false;
        }
        return true;
    }
}