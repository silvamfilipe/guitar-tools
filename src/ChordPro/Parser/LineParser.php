<?php

/**
 * This file is part of silvamfilipe/guitar_tools package
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace SilvamFilipe\GuitarTools\ChordPro\Parser;

/**
 * ChordPro Line Parser
 *
 * @package SilvamFilipe\GuitarTools
 * @author  Filipe Silva <silvam.filipe@gmail.com>
 */
class LineParser
{

    const CHORDS_REGEXP = '/\[(?P<chords>[a-z0-9\+\.\-ª\/]+)\]/i';

    /**
     * @var string
     */
    private $chordLine;

    /**
     * @var string
     */
    private $lyricsLine;

    /**
     * @var array|null
     */
    private $chordsPosition;

    private $line;

    /**
     * @var array
     */
    private $chords;

    /**
     * Parses a song line
     *
     * @param string $line
     *
     * @return string The song line with chords
     */
    public function parse($line)
    {
        $this->line = $line;
        return rtrim($this->getChordLine())."\n".$this->getLyricsLine();
    }

    /**
     * Gets the resulting chord line of the latest parse action
     *
     * @return string
     */
    public function getChordLine()
    {
        if (null == $this->chordLine) {
            $start = 1;
            foreach ($this->getChordsPosition() as $key => $position) {
                for ($i = $start; $i < $position; $i++) {
                    $this->chordLine .= ' ';
                }
                $this->chordLine .= $this->getChords()[$key];
                $start = strlen($this->getChords()[$key]) + $i +1;
            }
        }
        return $this->chordLine;
    }

    /**
     * Gets the resulting lyrics line of the latest parse action
     *
     * @return string
     */
    public function getLyricsLine()
    {
        if (null == $this->lyricsLine) {
            $this->lyricsLine = preg_replace(self::CHORDS_REGEXP, '', $this->line);
        }
        return $this->lyricsLine;
    }

    /**
     * Gets the position of all chords in the line
     *
     * @return array|null
     */
    public function getChordsPosition()
    {
        if (null === $this->chordsPosition) {
            $count = 0;
            $this->cho0dsPosition = [];
            $counting = true;
            foreach (str_split($this->line) as $item) {
                if ($item == '[') {
                    $this->chordsPosition[] = $count;
                    $counting = false;
                    continue;
                }

                if (!$counting && $item != ']') {
                    continue;
                }
                $counting = true;
                $count++;
            }
        }
        return $this->chordsPosition;
    }

    /**
     * Gets the chords on this line
     *
     * @return array
     */
    public function getChords()
    {
        if (null === $this->chords) {
            preg_match_all(self::CHORDS_REGEXP, $this->line, $matches);
            $this->chords = array_key_exists('chords', $matches)
                ? $matches['chords']
                : [];
        }
        return $this->chords;
    }



}