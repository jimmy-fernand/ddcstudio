<?php

namespace App\classes;

class Text
{
    public static function Extrait(string $content, int $limit): string
    {
        if (mb_strlen($content) <= $limit) {
            return $content;
        }

        $firstPause = mb_strpos($content, " ", $limit);
        return mb_substr($content, 0, $firstPause) . " ....";
    }
}
