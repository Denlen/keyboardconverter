<?php

namespace Denlen\KeyboardLayoutConverter;

class KeyboardConverter
{
    protected $letters = [
        "q" => "й", "w" => "ц", "e" => "у", "r" => "к", "t" => "е", "y" => "н", "u" => "г",
        "i" => "ш", "o" => "щ", "p" => "з", "[" => "х", "]" => "ъ", "a" => "ф", "s" => "ы",
        "d" => "в", "f" => "а", "g" => "п", "h" => "р", "j" => "о", "k" => "л", "l" => "д",
        ";" => "ж", "'" => "э", "z" => "я", "x" => "ч", "c" => "с", "v" => "м", "b" => "и",
        "n" => "т", "m" => "ь", "," => "б", "." => "ю", "/" => ".",
    ];

    public function parse($word)
    {
        $firstLetter = mb_substr($word, 0,1);
        $letters = $this->letters;

        if(in_array($firstLetter, $this->letters)){
            $letters = array_flip($this->letters);
        }

        return $this->converter($word, $letters);
    }

    protected function converter(string $word, $letters)
    {
        for ($i=0; $i < strlen($word); $i++) {
            $oneLetter = mb_substr($word, $i,1);

            if(isset($letters[mb_strtolower($oneLetter)])) {

                if ($oneLetter == mb_strtolower($oneLetter)) {
                    $replace = $letters[mb_strtolower($oneLetter)];
                } elseif($oneLetter == mb_strtoupper($oneLetter)) {
                    $replace = mb_strtoupper($letters[mb_strtolower($oneLetter)]);
                }

                $word = str_replace($oneLetter, $replace, $word);
            }
        }

        return $word;
    }
}
