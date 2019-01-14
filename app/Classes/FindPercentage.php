<?php
/**
 * Created by PhpStorm.
 * User: juan Camilo Rosillo Martinez
 * Date: 13/01/19
 * Time: 11:03 AM
 */

namespace App\Classes;


class FindPercentage
{
    protected $similarity;
    protected $dictionary;
    protected $stringToFind;
    protected $percentage;

    public function __construct(Similarity $similarity, $dictionary, $stringToFind, $percentage)
    {
        $this->similarity = $similarity;
        $this->dictionary = $dictionary;
        $this->stringToFind = $stringToFind;
        $this->percentage = $percentage;
        $this->similarity->setStringToFind($this->stringToFind);
    }

    public function getRegisters()
    {
        return $this->findRegistersWithPercentage();
    }

    private function findRegistersWithPercentage()
    {
        $results = [];

        if (empty($this->dictionary)) {
            return $results;
        }

        foreach ($this->dictionary as $key => $word) {

            $this->similarity->setString($word['name']);
            $percentage = $this->similarity->getPercentage();

            if ($this->validatePercentage($percentage)) {
                $this->delteRegister($key);
                continue;
            }

            $word['percentage'] = $percentage;

            $results[] = $word;
        }

        return $this->arraySort($results, 'percentage', SORT_DESC);
    }

    private function validatePercentage($percentage)
    {
        return $percentage < $this->percentage;
    }

    private function delteRegister($key)
    {
        unset($this->dictionary[$key]);
    }

    private function arraySort($array, $on, $order = SORT_ASC)
    {
        $new_array = array();
        $sortable_array = array();

        if (count($array) > 0) {
            foreach ($array as $k => $v) {
                if (is_array($v)) {
                    foreach ($v as $k2 => $v2) {
                        if ($k2 == $on) {
                            $sortable_array[$k] = $v2;
                        }
                    }
                } else {
                    $sortable_array[$k] = $v;
                }
            }

            switch ($order) {
                case SORT_ASC:
                    asort($sortable_array);
                    break;
                case SORT_DESC:
                    arsort($sortable_array);
                    break;
            }

            foreach ($sortable_array as $k => $v) {
                $new_array[] = $array[$k];
            }
        }

        return $new_array;
    }

}