<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\API\BaseController as BaseController;
use App\Models\Dictionary;
use Validator;
use App\Classes\Filter;


class DictionaryController extends BaseController
{
    public function index()
    {
        $filter = new Filter(self::class);
        return $filter->index();
    }

    public function store(Request $request)
    {
        $input = $request->all();
        $validator = Validator::make($input, [
            'name' => 'required',
            'departament' => 'required',
            'location' => 'required',
            'municipality' => 'required',
            'active_years' => 'required|integer',
            'person_type' => 'required',
            'type_job' => 'required',
        ]);

        if ($validator->fails()) {
            return $this->sendError('Error en la validacion de los campos.', $validator->errors(), 200);
        }

        $product = Dictionary::create($input);

        return $this->sendResponse($product->toArray(), 'Datos almacenados correctamente.');
    }

    public function getList(Request $request)
    {
        $filter = new Filter(self::class);
        return $filter->filter($request);
    }

    public function show($id)
    {
        $result = Dictionary::find($id);

        if (is_null($result)) {
            return $this->sendError('Datos no encontrados');
        }

        return $this->sendResponse($result->toArray(), 'Datos obtenidos correctamente.');
    }

    public function update(Request $request, Dictionary $dictionary)
    {
        $input = $request->all();

        $validator = Validator::make($input, [
            'name' => 'required',
            'departament' => 'required',
            'location' => 'required',
            'municipality' => 'required',
            'active_years' => 'required|integer',
            'person_type' => 'required',
            'type_job' => 'required',
        ]);

        if ($validator->fails()) {
            return $this->sendError('Error en la validacion de los campos.', $validator->errors(), 200);
        }

        $dictionary->name = $input['name'];
        $dictionary->departament = $input['departament'];
        $dictionary->location = $input['location'];
        $dictionary->municipality = $input['municipality'];
        $dictionary->active_years = $input['active_years'];
        $dictionary->person_type = $input['person_type'];
        $dictionary->type_job = $input['type_job'];
        $dictionary->save();

        return $this->sendResponse($dictionary->toArray(), 'Datos actualizados correctamente.');
    }
}
