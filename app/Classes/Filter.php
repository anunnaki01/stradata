<?php
/**
 * Created by PhpStorm.
 * User: juan
 * Date: 14/01/19
 * Time: 03:00 PM
 */

namespace App\Classes;

use Illuminate\Http\Request;
use Validator;
use App\Http\Controllers\API\BaseController as BaseController;
use App\Models\Dictionary;

class Filter
{
    public function __construct(BaseController $baseController)
    {
        $this->baseController = $baseController;
    }

    public function index()
    {
        $result = Dictionary::all();
        return $this->baseController->sendResponse($this->ucfirstArray($result->toArray()),
            'Registers retrieved successfully.');
    }

    public function filter(Request $request)
    {
        $input = $request->all();

        $validator = Validator::make($input, [
            'name' => 'required',
            'percentage' => 'required|integer',
        ]);

        if ($validator->fails()) {
            return $this->baseController->sendError('Error en la validacion de los campos.', $validator->errors(), 200);
        }

        $dictionary = Dictionary::findByName($input['name'])->toArray();
        $findPercentage = new FindPercentage(new Similarity, $dictionary, $input['name'], $input['percentage']);
        $result = $findPercentage->getRegisters();

        if (empty($result)) {
            return $this->baseController->sendResponse($result, 'Busqueda no encontrada');
        }

        return $this->baseController->sendResponse($this->ucfirstArray($result), 'Busqueda encontrada');
    }

    private function ucfirstArray($array)
    {
        if (empty($array)) {
            return $array;
        }

        foreach ($array as $key => $item) {
            $strtolower = array_map('strtolower', $item);
            $array[$key] = array_map('ucfirst', $strtolower);
        }
        return $array;
    }

}

;