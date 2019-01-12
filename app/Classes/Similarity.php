<?php
/**
 * Created by PhpStorm.
 * User: juan Camilo Rosillo Martinez
 * Date: 12/01/19
 * Time: 10:35 AM
 */

namespace App\Classes;

class Similarity
{
    protected $str;
    protected $strTofind;
    protected $len1;
    protected $len2;

    public function setString($str)
    {
        $this->len1 = strlen($str);
        $this->str = strtolower($str);
    }

    public function setStringToFind($strTofind)
    {
        $this->len2 = strlen($strTofind);
        $this->strTofind = strtolower($strTofind);
    }

    public function getPercentage()
    {
        return $this->similarity();
    }

    private function similarity()
    {
        if ($this->validateStrings()) {
            return 100;
        }

        if ($this->validateContainsString()) {
            return 100;
        }

        if ($this->validateStringReversed()) {
            return 100;
        }

        if ($this->validateStringChangingLetters()) {
            return 100;
        }

        return $this->similarityString();
    }

    private function validateStrings()
    {
        return $this->str === $this->strTofind;
    }

    private function validateStringReversed()
    {
        $arrayStr1 = explode(" ", $this->str);

        $reversed = array_reverse($arrayStr1);

        $reversedStr1 = implode(" ", $reversed);

        if ($reversedStr1 == $this->strTofind) {
            return true;
        }

        return false;
    }

    private function validateStringChangingLetters()
    {
        $arrayListChange = [
            'v' => 'b',
            's' => 'z',
            'b' => 'v',
            'z' => 's'
        ];

        $this->len1 = strlen($this->str);

        $stringChange = $this->str;

        for ($i = 0; $i < $this->len1; $i++) {
            if (isset($arrayListChange[$this->str[$i]])) {
                $stringChange[$i] = $arrayListChange[$this->str[$i]];
            }
        }

        if ($stringChange == $this->strTofind) {
            return true;
        }
        return false;

    }

    private function similarityString()
    {
        $max = max($this->len1, $this->len2);
        $similarity = $i = $j = 0;

        while (($i < $this->len1) && isset($this->strTofind[$j])) {

            if ($this->str[$i] == $this->strTofind[$j]) {

                $similarity++;
                $i++;
                $j++;

            } elseif ($this->len1 < $this->len2) {

                $this->len1++;
                $j++;

            } elseif ($this->len1 > $this->len2) {

                $i++;
                $this->len1--;

            } else {

                $i++;
                $j++;

            }
        }

        return round($similarity / $max, 2) * 100;
    }

    private function validateContainsString()
    {
        return (strpos($this->strTofind, $this->str) !== false);
    }
}