<?php

namespace App\Http\Controllers\Web;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Validator;
use App\Classes\Filter;
use App\Classes\Export;
use App\Http\Controllers\API\BaseController as BaseController;


class ExportController extends BaseController
{
    protected $filter;
    protected $export;

    public function __construct()
    {
        $this->filter = new Filter();
        $this->export = new Export();
    }

    public function export($type, $name = '', $percentage = '')
    {
        if ($type == 'excel') {
            return $this->excel($type, $name, $percentage);
        } elseif ($type == 'pdf') {
            return $this->pdf($type, $name, $percentage);
        }
    }

    private function excel($type, $name = '', $percentage = '')
    {
        $data = $this->getExportData($type, $name, $percentage);
        $this->export->excel($data, 'Registros');
    }

    public function pdf($type, $name = '', $percentage = '')
    {
        $data = $this->getExportData($type, $name, $percentage);
        return $this->export->pdf($data, 'Registros');
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
