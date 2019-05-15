<?php
    class Extension extends Twig_Extension {

        public function getFunctions() {
            return [
                new Twig_SimpleFunction('romanNumbered', [$this, 'romanNumbered']),
                new Twig_SimpleFunction('substrWords', [$this, 'substrWords'])
            ];
        }

        public function romanNumbered($data) { // conversion de l'id en chiffres romains
            $data = intval($data);
            $romanResult = '';
    
            $lookup = array('M' => 1000,
            'CM' => 900,
            'D' => 500,
            'CD' => 400,
            'C' => 100,
            'XC' => 90,
            'L' => 50,
            'XL' => 40,
            'X' => 10,
            'IX' => 9,
            'V' => 5,
            'IV' => 4,
            'I' => 1);
            
            foreach($lookup as $roman => $value) {
                $matches = intval($data / $value);
                $romanResult .= str_repeat($roman, $matches);
                $data = $data % $value;
            }
            
            return $romanResult;
        }
        
        public function substrWords($data, $maxchar, $end = '...') { // fonction pour limiter le nombre de mots apparaissant sur la page d'accueil
            if (strlen($data) > $maxchar || $data == '') {
                $words = preg_split('/\s/', $data);
                $output = '';
                $i = 0;
                while (1) {
                    $length = strlen($output) + strlen($words[$i]);
                    if ($length > $maxchar) {
                        break;
                    } else {
                        $output .= " " . $words[$i];
                        ++$i;
                    }
                }
                $output .= $end;
            } else {
                $output = $data;
            }
            return $output;
        }
    }