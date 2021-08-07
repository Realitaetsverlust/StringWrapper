<?php

namespace Realitaetsverlust\Wrapper;

class StringWrapper {
    public string $string;
    public int $length;
    public string $charset;

    public function __construct(string $string, string $charset = 'utf-8') {
        $this->string = $string;
        $this->charset = $charset;
        $this->length = strlen($string);
    }

    public function __toString() : string {
        return $this->string;
    }

    /**
     * Wrapper for str_replace() and str_ireplace(). Wrapped them into the same function.
     *
     * Ignored the parameter $count because nobody uses that lmao
     *
     * @param string $search
     * @param string $replace
     * @param bool $caseSensitive
     * @return StringWrapper
     */
    public function replace(string $search, string $replace, bool $caseSensitive = true) : StringWrapper {
        if($caseSensitive) {
            $this->string = str_replace($search, $replace, $this->string);
        } else {
            $this->string = str_ireplace($search, $replace, $this->string);
        }

        return $this;
    }

    /**
     * Wrapper for str_pad()
     *
     * @param int $padLength
     * @param string $padding
     * @param int $paddingType
     * @return StringWrapper
     */
    public function pad(int $padLength, string $padding = ' ', int $paddingType = STR_PAD_RIGHT) : StringWrapper {
        $this->string = str_pad($this->string, $padLength, $padding, $paddingType);
        return $this;
    }

    /**
     * Wrapper for str_repeat()
     *
     * @param int $multiplier
     * @return StringWrapper
     */
    public function repeat(int $multiplier) : StringWrapper {
        $this->string = str_repeat($this->string, $multiplier);
        return $this;
    }

    /**
     * Wrapper for str_rot13()
     *
     * @return StringWrapper
     */
    public function rot13() : StringWrapper {
        $this->string = str_rot13($this->string);
        return $this;
    }

    /**
     * Wrapper for str_shuffle()
     *
     * @return StringWrapper
     */
    public function shuffle() : StringWrapper {
        $this->string = str_shuffle($this->string);
        return $this;
    }

    /**
     * Wrapper for str_split()
     *
     * @param int $elementSize
     * @return array
     */
    public function split($elementSize = 1) : array {
        return str_split($this->string, $elementSize);
    }

    /**
     * Wrapper for str_word_count() with the parameter $format = 0
     *
     * There is no function to use $format = 1. Just use explode().
     *
     * @param string|null $charlist
     * @return int
     */
    public function wordCount(string $charlist = null) : int {
        return str_word_count($this->string, 0, $charlist);
    }

    /**
     * Wrapper for str_word_count() with the parameter $format = 2
     *
     * There is no function to use $format = 1. Just use explode().
     *
     * @param string|null $charlist
     * @return array
     */
    public function fetchWordWithPositions(string $charlist = null) : array {
        return str_word_count($this->string, 2, $charlist);
    }

    /**
     * Wrapper for strcmp()
     *
     * @param string $string
     * @return int
     */
    public function compare(string $string) : int {
        return strcmp($this->string, $string);
    }

    /**
     * Wrapper for str_starts_with()
     *
     * @param string $string
     * @return string
     */
    public function startWith(string $string) : bool {
        return str_starts_with($this->string, $string);
    }

    /**
     * Wrapper for trim()
     *
     * @param string $characters
     * @return $this
     */
    public function trim(string $characters = " \n\r\t\v\0") : StringWrapper {
        $this->string = trim($this->string, $characters);
        return $this;
    }

    /**
     * Wrapper for strstr() and stristr(). Ridiculous names btw. I'd never recognize what these functions
     * would do without checking the docs ...
     * StringWrapper
     * @param string $string
     * @param bool $caseSensitive
     * @param bool $beforeNeedle
     * @return false|string
     */
    public function firstOccurence(string $string, bool $caseSensitive, bool $beforeNeedle = false) {
        return $caseSensitive ? strstr($this->string, $string, $beforeNeedle) : stristr($this->string, $string, $beforeNeedle);
    }

    /**
     * Wrapper for strrchr()
     *
     * @param string $string
     * @return string
     */
    public function lastOccurence(string $string) : string {
        return strrchr($this->string, $string);
    }
}
