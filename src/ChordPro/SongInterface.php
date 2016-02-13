<?php

/**
 * This file is part of silvamfilipe/guitar_tools package
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace SilvamFilipe\GuitarTools\ChordPro;

/**
 * ChordPro document SongInterface
 *
 * @package SilvamFilipe\GuitarTools\ChordPro
 */
interface SongInterface
{

    /**
     * Gets the ChordPro formatted source of this song
     *
     * @return string
     */
    public function getSource();
}