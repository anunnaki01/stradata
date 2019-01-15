<?php

namespace App\Http\Controllers\Web;

use Illuminate\Http\Request;
use App\Http\Controllers\API\BaseController as BaseController;
use App\Models\Dictionary;


class ImportController extends BaseController
{
    public function import(Request $request)
    {
        $file = $request->file;

        if (!in_array($file->extension(), ['txt', 'csv', 'xls', 'xlsx'])) {
            return $this->sendError('Archivo no valido', [], 200);
        }

        \Excel::load($file, function ($reader) {

            $reader->get();
            $reader->each(function ($row) {

                $exist = Dictionary::where('name', $row->nombre)->get()->first();

                if (!empty($exist)) {
                    $exist->updated_at = date("Y-m-d H:i:s");
                    $exist->save();
                } else {
                    $dictionary = new Dictionary;
                    $dictionary->name = $row->nombre;
                    $dictionary->departament = $row->departamento;
                    $dictionary->location = $row->localidad;
                    $dictionary->municipality = $row->municipio;
                    $dictionary->active_years = $row->anos_activo;
                    $dictionary->person_type = $row->tipo_persona;
                    $dictionary->type_job = $row->tipo_cargo;
                    $dictionary->save();
                }
            });
        });

        return $this->sendResponse([], 'Importacion completa');
    }
}
