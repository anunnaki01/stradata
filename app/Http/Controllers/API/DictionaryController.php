<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\API\BaseController as BaseController;
use App\Models\Dictionary;
use Validator;
use App\Classes\Similarity;
use App\Classes\FindPercentage;

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
            return $this->sendError('Validation Error.', $validator->errors(), 200);
        }

        $dictionary = Dictionary::findByName($input['name'])->toArray();
        $findPercentage = new FindPercentage(new Similarity, $dictionary, $input['name'], $input['percentage']);
        $result = $findPercentage->getRegisters();

        if (empty($result)) {
            return $this->sendResponse($result, 'Search not found');
        }

        return $this->sendResponse($result, 'Search found');
    }


}
