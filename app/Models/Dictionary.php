<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Dictionary extends Model
{
    protected $table = 'dictionary';

    protected $fillable = [
        'name',
        'departament',
        'location',
        'municipality',
        'active_years',
        'person_type',
        'type_job'
    ];


    static public function findByName($name)
    {
        $words = Dictionary::where('name', $name)
            ->orWhere('name', 'like', '%' . $name . '%');

        $countWords = str_word_count($name);

        if ($countWords > 1) {

            $arrayNames = explode(' ', $name);

            for ($i = 0; $i < count($arrayNames); $i++) {

                if ($arrayNames[$i] != '') {
                    $words->orWhere('name', 'like', '%' . $arrayNames[$i] . '%');
                }
            }
        }

        return $words->get()->toArray();
    }
}
