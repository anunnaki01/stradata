<?php

namespace App\Http\Controllers\Web;

use Illuminate\Http\Request;
use Validator;
use App\Http\Controllers\API\BaseController as BaseController;
use App\Classes\Filter;


class DictionaryController extends BaseController
{
    protected $filter;

    public function __construct()
    {
        $this->filter = new Filter();
    }

    public function index()
    {
        return $this->sendResponse($this->filter->all(),
            'Registers retrieved successfully.');
    }

    public function filter(Request $request)
    {
        $input = $request->all();
        $validator = Validator::make($input, [
            'name' => 'required',
            'percentage' => 'required|integer|digits_between:0,100',
        ]);

        if ($validator->fails()) {
            return $this->sendError('Error en la validacion de los campos.', $validator->errors(), 200);
        }
        $response = $this->filter->filter($input);
        return $this->sendResponse($response, 'Busqueda encontrada');

    }
}
