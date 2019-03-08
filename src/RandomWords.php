<?php

namespace Eastwest\RandomWords;


class RandomWords
{
    protected $addRandomString = false;
    protected $randomStringLength = 4;

    public function addRandomString($length = 4) {
        $this->addRandomString = true;
        $this->addRandomStringLength = $length;

        return $this;
    }

    public function get($prefix = null)
    {
        $parts = [];

        if($prefix) {
            $parts[] = $prefix;
        }

        $adjectivesContent = file(dirname(__FILE__) . '/../data/colors.txt');
        $nonunContent = file(dirname(__FILE__) . '/../data/music_theory.txt');

        $parts[] = trim($adjectivesContent[rand(0, count($adjectivesContent) - 1)]);
        $parts[] = trim($nonunContent[rand(0, count($nonunContent) - 1)]);

        if($this->addRandomString == true) {
            $parts[] = str_random($this->randomStringLength);;
        }


        return str_slug(implode('-', $parts));
    }
}