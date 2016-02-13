<?php

/**
 * This file is part of silvamfilipe/guitar_tools package
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace SilvamFilipe\GuitarTools\ChordPro\Parser;

/**
 * Line Parser Interface
 *
 * @package SilvamFilipe\GuitarTools\ChordPro
 * @author  Filipe Silva <silvam.filipe@gmal.com>
 */
interface LineParserInterface
{

    /**
     * Parses a song line
     *
     * @param string $line
     *
     * @return string The song line with chords
     */
    public function parse($line);
}