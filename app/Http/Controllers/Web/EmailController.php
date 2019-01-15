<?php

namespace App\Http\Controllers\Web;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Validator;
use App\Classes\Filter;
use App\Classes\Export;
use App\Http\Controllers\API\BaseController as BaseController;
use Auth;
use App\Classes\Email;

class EmailController extends BaseController
{
    protected $filter;
    protected $export;
    protected $email;

    public function __construct()
    {
        $this->filter = new Filter();
        $this->export = new Export();
        $this->email = new Email();
    }

    public function send($type, $name = '', $percentage = '')
    {
        $data = $this->getExportData($type, $name, $percentage);

        if ($type == 'excel') {
            $file = $this->export->getExcelFile($data, 'Report');
            $response = $this->email->sendExcelFile($file);
        } elseif ($type == 'pdf') {
            $file = $this->export->getPdfFile($data);
            $response = $this->email->sendPdfFile($file);
        }

        if ($response) {
            return $this->sendResponse([], 'Reporte enviado correctamente');
        }

        return $this->sendError('Ha ocurrido un error, porfavor intente mas tarde', 200);

    }

    private function getExportData($type, $name, $percentage)
    {
        $input = ['type' => $type, 'name' => $name, 'percentage' => $percentage];
        $validator = Validator::make($input, ['type' => 'required']);

        if ($validator->fails()) {
            return $this->sendError('Tipo de exportacion no especificada.', $validator->errors(), 200);
        }

        if (!empty($input['name']) && !empty($input['percentage'])) {
            $data = $this->filter->filter($input);
        } else {
            $data = $this->filter->all();
        }

        return $data;
    }
}
