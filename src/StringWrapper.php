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

    /**
     * Wrapper for str_getcsv()
     *
     * @param string $delimiter
     * @param string $enclosure
     * @param string $escape
     * @return array
     */
    public function getCsv($delimiter = ',', $enclosure = '"', $escape = '\\') : array {
        return str_getcsv($delimiter, $enclosure, $escape);
    }

    /**
     * Wrapper for str_replace() and str_ireplace(). Wrapped them into the same function.
     *
     * Ignored the parameter $count because nobody uses that lmao
     *
     * @param string $search
     * @param string $replace
     * @param bool $caseSensitive
     * @return string
     */
    public function replace(string $search, string $replace, bool $caseSensitive = true) : string {
        if($caseSensitive) {
            return str_replace($search, $replace, $this->string);
        } else {
            return str_ireplace($search, $replace, $this->string);
        }
    }

    /**
     * Wrapper for str_pad()
     *
     * @param int $padLength
     * @param string $padding
     * @param int $paddingType
     * @return string
     */
    public function pad(int $padLength, string $padding = ' ', int $paddingType = STR_PAD_RIGHT ) {
        return str_pad($padLength, $padding, $paddingType);
    }

    /**
     * Wrapper for str_repeat()
     *
     * @param int $multiplier
     * @return string
     */
    public function repeat(int $multiplier) : string {
        return str_repeat($this->string, $multiplier);
    }

    /**
     * Wrapper for str_rot13()
     *
     * @return string
     */
    public function rot13() : string {
        return str_rot13($this->string);
    }

    /**
     * Wrapper for str_shuffle()
     *
     * @return string
     */
    public function shuffle() : string {
        return str_shuffle($this->string);
    }

    /**
     * Wrapper for str_split()
     *
     * @param int $elementSize
     * @return array
     */
    public function split($elementSize = 1) {
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
     * Wrapper for strstr() and stristr(). Ridiculous names btw. I'd never recognize what these functions
     * would do without checking the docs ...
     *StringWrapper
     * @param string $string
     * @param bool $beforeNeedle
     * @return false|string
     */
    public function firstOccurence(string $string, bool $caseSensitive, bool $beforeNeedle = false) {
        return $caseSensitive ? strstr($this->string, $string, $beforeNeedle) : stristr($this->string, $string, $beforeNeedle);
    }
}
