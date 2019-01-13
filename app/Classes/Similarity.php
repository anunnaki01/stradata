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

    public function setString($str)
    {
        $this->str = strtolower($str);
    }

    public function setStringToFind($strTofind)
    {
        $this->strTofind = strtolower($strTofind);
    }

    public function getPercentage()
    {
        return $this->similarity();
    }

    private function similarity()
    {
        $percentages = [];
        //Caso Cambio de letras
        $percentages[] = $this->validateStringChangingLetters($this->str, $this->strTofind);
        //Caso String alreves
        $percentages[] = $this->validateStringReversed($this->str, $this->strTofind);
        //Caso comparacion de strings directa
        $percentages[] = $this->similarityString($this->str, $this->strTofind);

        return max($percentages);
    }

    private function validateStringReversed($str, $strTofind)
    {
        $arrayStr1 = explode(" ", $strTofind); //Se convierte el string en array
        $reversed = array_reverse($arrayStr1); //Se voltea el array
        $reversedStrTofind = implode(" ", $reversed); //Se convierte el array en string

        $percentages = [];
        $percentages[] = $this->validateStringChangingLetters($str,
            $reversedStrTofind); //Se obtiene el porcentaje mayor cambiando las letras

        $percentages[] = $this->similarityString($str,
            $reversedStrTofind); //Se obtiene el porcentaje mayor comparando el string alreves

        return max($percentages);
    }

    private function validateStringChangingLetters($str, $strTofind)
    {
        $arrayListChange = [
            'v' => 'b',
            's' => 'z',
            'b' => 'v',
            'z' => 's'
        ];

        $percentages = [];

        foreach ($arrayListChange as $key => $value) { //reemplazo letra en el string a la vez

            $newstr = str_replace($key, $value, $str);

            $percentages[] = $this->similarityString($newstr,
                $strTofind); //se obtienen los porcentajes y se almacenan en un array

            if (end($percentages) === 100) { //si el ultimo porcentaje es 100% se retorna
                return end($percentages);
            }
        }

        //Se cambian todas las letras en el string y se obtiene el porcentaje
        $percentages[] = $this->similarityString(str_replace(['b', 'z', 'v', 's'], ['v', 's', 'b', 'z'], $str),
            $strTofind);

        //se retorna el porcentaje mayor obtenido en este caso
        return max($percentages);

    }

    private function similarityString($str1, $str2)
    {
        $len1 = strlen($str1); //se obtiene la longitud del string
        $len2 = strlen($str2); // se obtiene la longitud del string a buscar

        $max = max($len1, $len2); //se obtiene la maxima longitud entre los dos strings
        $similarity = $i = $j = 0; //se inicializan las posiciones y el contador de similitud

        while (($i <= $len1) && isset($str2[$j])) {

            if ($str1[$i] == $str2[$j]) {  //se compara letra por letra si las letras son iguales se incrementan las posiciones y el contador
                $similarity++;
                $i++;
                $j++;
            } elseif ($len1 < $len2) {  //si la segunda cadena es mas larga se incremetan la longitud de la primera cadena y la posicion de la segunda
                $len1++;
                $j++;
            } elseif ($len1 > $len2) { //si la primera cadena es mas larga se decrementa la longitud de la primera cadena y se incrementa la posicion de la primera
                $i++;
                $len1--;
            } else { //si son iguales las longitudes incrementa la posicion en los dos
                $i++;
                $j++;
            }
        }

        return round(($similarity / $max) * 100, 2);
    }
}