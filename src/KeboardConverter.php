<?php

namespace denlen\KeyboardLayoutConverter;

use Illuminate\Support\Str;
use Illuminate\Support\Arr;

final class KeboardConverter
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
        $firstLetter = Str::substr($word, 0,1);
        $letters = $this->letters;

        if(in_array($firstLetter, $this->letters)){
            $letters = array_flip($this->letters);
        }

        return $this->converter($word, $letters);
    }

    protected function converter(string $word, $letters)
    {
        for ($i=0; $i < Str::length($word); $i++) {
            $oneLetter = Str::substr($word, $i,1);

            if(isset($letters[Str::lower($oneLetter)])) {

                if ($oneLetter == Str::lower($oneLetter)) {
                    $replace = $letters[Str::lower($oneLetter)];
                } elseif($oneLetter == Str::upper($oneLetter)) {
                    $replace = Str::upper($letters[Str::lower($oneLetter)]);
                }

                $word = str_replace($oneLetter, $replace, $word);
            }
        }

        return $word;
    }
}
