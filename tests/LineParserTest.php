<?php

/**
 * This file is part of silvamfilipe/guitar_tools package
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace SilvamFilipe\GuitarTools\Tests;

use SilvamFilipe\GuitarTools\LineParser;

/**
 * Line Parser Test case
 *
 * @package SilvamFilipe\GuitarTools\Tests
 * @author  Filipe Silva <silvam.filipe@gmail.com>
 */
class LineParserTest extends \PHPUnit_Framework_TestCase
{

    /**
     * @var LineParser
     */
    protected $parser;

    /**
     * Sets the SUT parser object
     */
    protected function setUp()
    {
        parent::setUp();
        $this->parser = new LineParser();
    }

    public function testParser()
    {
        $input = 'Swing [D]low, sweet [G]chari[D]ot,';
        $output = "     D          G    D\nSwing low, sweet chariot,";
        $this->assertEquals($output, $this->parser->parse($input));

    }
}
