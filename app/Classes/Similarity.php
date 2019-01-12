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
    private static $instance;

    protected $str1;
    protected $str2;
    protected $len1;
    protected $len2;

    public static function getInstance()
    {
        if (!self::$instance instanceof self) {
            self::$instance = new self;
        }
        return self::$instance;
    }

    public function setStr1($str1)
    {
        $this->len1 = strlen($str1);
        $this->str1 = strtolower($str1);
    }

    public function setStr2($str2)
    {
        $this->len2 = strlen($str2);
        $this->str2 = strtolower($str2);
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

        if ($this->validateStringReversed() === 100) {
            return 100;
        }

        if ($this->validateStringChangingLetters() === 100) {
            return 100;
        }

        return $this->similarityString();
    }

    private function validateStrings()
    {
        return $this->str1 === $this->str2;
    }

    private function validateStringReversed()
    {
        $arrayStr1 = explode(" ", $this->str1);

        $reversed = array_reverse($arrayStr1);

        $reversedStr1 = implode(" ", $reversed);

        if ($reversedStr1 == $this->str2) {
            return 100;
        }

        return 0;
    }

    private function validateStringChangingLetters()
    {
        $arrayListChange = [
            'v' => 'b',
            's' => 'z',
            'b' => 'v',
            'z' => 's'
        ];

        $this->len1 = strlen($this->str1);

        $stringChange = $this->str1;

        for ($i = 0; $i < $this->len1; $i++) {
            if (isset($arrayListChange[$this->str1[$i]])) {
                $stringChange[$i] = $arrayListChange[$this->str1[$i]];
            }
        }

        if ($stringChange == $this->str2) {
            return 100;
        }
        return 0;

    }

    private function similarityString()
    {
        $max = max($this->len1, $this->len2);
        $similarity = $i = $j = 0;

        while (($i < $this->len1) && isset($this->str2[$j])) {

            if ($this->str1[$i] == $this->str2[$j]) {

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
}