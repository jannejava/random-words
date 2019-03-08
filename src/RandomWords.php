<?php

namespace Eastwest\RandomWords;


class RandomWords
{
    public function get()
    {
        $fileContents = file(dirname(__FILE__) . '/../data/alpha-words.txt');

        return $fileContents[rand(0, count($fileContents) - 1)];
    }
}