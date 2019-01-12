<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\API\BaseController as BaseController;
use App\Models\Dictionary;
use Validator;
use App\Classes\Similarity;

class DictionaryController extends BaseController
{
    public function index()
    {
        $products = Dictionary::all();
        return $this->sendResponse($products->toArray(), 'Registers retrieved successfully.');
    }

    public function store(Request $request)
    {
        $input = $request->all();

        $validator = Validator::make($input, [
            'name' => 'required',
            'departament' => 'required',
            'location' => 'required',
            'municipality' => 'required',
            'active_years' => 'required',
            'person_type' => 'required',
            'type_job' => 'required',
        ]);

        if ($validator->fails()) {
            return $this->sendError('Validation Error.', $validator->errors());
        }

        $product = Dictionary::create($input);

        return $this->sendResponse($product->toArray(), 'Register created successfully.');
    }

    public function getList(Request $request)
    {
        $input = $request->all();

        $validator = Validator::make($input, [
            'name' => 'required',
            'percentage' => 'required|integer',
        ]);

        if ($validator->fails()) {
            return $this->sendError('Validation Error.', $validator->errors());
        }

        $resultArray = Dictionary::findByName($input['name']);

        $similarity = new Similarity;

        foreach ($resultArray as $key => $word) {

            echo "<pre>";
            print_r($word['name']);
            echo "</pre>";

            echo "<pre>";
            print_r($input['name']);
            echo "</pre>";

            $similarity->setString($word['name']);
            $similarity->setStringToFind($input['name']);

            echo "<pre>";
            print_r($similarity->getPercentage());
            echo "</pre>";

        }
        die();


//        $similarity = new Similarity('bAcA','VaCa');
//        $response = $similarity->getPercentage();
//        dd($similarity);

        if (is_null($resultArray)) {
            return $this->sendError('Words not found.');
        }

        return $this->sendResponse($resultArray, 'Words successfully.');
    }
}
