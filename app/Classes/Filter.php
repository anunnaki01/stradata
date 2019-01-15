<?php
/**
 * Created by PhpStorm.
 * User: juan
 * Date: 14/01/19
 * Time: 03:00 PM
 */

namespace App\Classes;

use Validator;
use App\Models\Dictionary;

class Filter
{
    public function all()
    {
        $result = Dictionary::all();
        return $this->ucfirstArray($result->toArray());
    }

    public function filter($input)
    {
        $dictionary = Dictionary::findByName($input['name'])->toArray();
        $findPercentage = new FindPercentage(new Similarity, $dictionary, $input['name'], $input['percentage']);
        $result = $findPercentage->getRegisters();

        return $this->ucfirstArray($result);
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