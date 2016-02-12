<?php

/**
 * This file is part of silvamfilipe/guitar_tools package
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace SilvamFilipe\GuitarTools;

/**
 * ChordPro Line Parser
 *
 * @package SilvamFilipe\GuitarTools
 * @author  Filipe Silva <silvam.filipe@gmail.com>
 */
class LineParser
{

    /**
     * @var string
     */
    private $chordLine;

    /**
     * @var string
     */
    private $lyricsLine;

    /**
     * Parses a song line
     *
     * @param string $line
     *
     * @return string The song line with chords
     */
    public function parse($line)
    {
        $this->chordLine = '';
        $charMode = true;

        foreach (str_split($line) as $char) {
            if ($char == '[') {
                $charMode = false;
                $this->chordLine = substr($this->chordLine, 0, -1);
                continue;
            }
            if ($char == ']') {
                $charMode = true;
                continue;
            }

            $this->chordLine .= $charMode ? ' ' : $char;
            $this->lyricsLine .= $charMode ? $char:'';
        }
        return rtrim($this->chordLine)."\n".$this->lyricsLine;
    }
}