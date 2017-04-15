<?php

/**
 * Copyright (c) 2017-present Ganbaro Digital Ltd
 * All rights reserved.
 *
 * Redistribution and use in source and binary forms, with or without
 * modification, are permitted provided that the following conditions
 * are met:
 *
 *   * Redistributions of source code must retain the above copyright
 *     notice, this list of conditions and the following disclaimer.
 *
 *   * Redistributions in binary form must reproduce the above copyright
 *     notice, this list of conditions and the following disclaimer in
 *     the documentation and/or other materials provided with the
 *     distribution.
 *
 *   * Neither the names of the copyright holders nor the names of his
 *     contributors may be used to endorse or promote products derived
 *     from this software without specific prior written permission.
 *
 * THIS SOFTWARE IS PROVIDED BY THE COPYRIGHT HOLDERS AND CONTRIBUTORS
 * "AS IS" AND ANY EXPRESS OR IMPLIED WARRANTIES, INCLUDING, BUT NOT
 * LIMITED TO, THE IMPLIED WARRANTIES OF MERCHANTABILITY AND FITNESS
 * FOR A PARTICULAR PURPOSE ARE DISCLAIMED. IN NO EVENT SHALL THE
 * COPYRIGHT OWNER OR CONTRIBUTORS BE LIABLE FOR ANY DIRECT, INDIRECT,
 * INCIDENTAL, SPECIAL, EXEMPLARY, OR CONSEQUENTIAL DAMAGES (INCLUDING,
 * BUT NOT LIMITED TO, PROCUREMENT OF SUBSTITUTE GOODS OR SERVICES;
 * LOSS OF USE, DATA, OR PROFITS; OR BUSINESS INTERRUPTION) HOWEVER
 * CAUSED AND ON ANY THEORY OF LIABILITY, WHETHER IN CONTRACT, STRICT
 * LIABILITY, OR TORT (INCLUDING NEGLIGENCE OR OTHERWISE) ARISING IN
 * ANY WAY OUT OF THE USE OF THIS SOFTWARE, EVEN IF ADVISED OF THE
 * POSSIBILITY OF SUCH DAMAGE.
 *
 * @category  Libraries
 * @package   ColorCalc/Maps
 * @author    Stuart Herbert <stuherbert@ganbarodigital.com>
 * @copyright 2017-present Ganbaro Digital Ltd www.ganbarodigital.com
 * @license   http://www.opensource.org/licenses/bsd-license.php  BSD License
 * @link      http://ganbarodigital.github.io/php-mv-color-calc
 */

namespace GanbaroDigitalTest\ColorCalc\V1\Maps;

use GanbaroDigital\ColorCalc\V1\Maps\MapCssColorKeywordToValue;
use GanbaroDigital\ColorCalc\V1\Maps\CssColorKeywords;
use PHPUnit\Framework\TestCase;

/**
 * @coversDefaultClass GanbaroDigital\ColorCalc\V1\Maps\MapCssColorKeywordToValue
 */
class MapCssColorKeywordToValueTest extends TestCase
{
    /**
     * @covers ::from
     * @dataProvider provideValidCssColorKeywords
     */
    public function test_returns_hex_value_for_recognised_colors($input, $expectedResult)
    {
        // ----------------------------------------------------------------
        // setup your test

        // ----------------------------------------------------------------
        // perform the change

        $actualResult = MapCssColorKeywordToValue::from($input);

        // ----------------------------------------------------------------
        // test the results

        $this->assertEquals($expectedResult, $actualResult);
    }

    /**
     * @covers ::from
     * @dataProvider provideNonCssColors
     * @expectedException GanbaroDigital\ColorCalc\V1\Exceptions\UnknownCssColorKeyword
     */
    public function test_throws_UnknownCssColorKeyword_for_all_other_strings($input)
    {
        // ----------------------------------------------------------------
        // setup your test

        // ----------------------------------------------------------------
        // perform the change

        MapCssColorKeywordToValue::from($input);

        // ----------------------------------------------------------------
        // test the results

        $this->assertTrue($actualResult);
    }

    public function provideValidCssColorKeywords()
    {
        $retval = [];

        foreach (CssColorKeywords::KeywordsToHex as $name => $color) {
            $retval[] = [ $name, $color ];
        }
        return $retval;
    }

    public function provideNonCssColors()
    {
        return [
            [ '#ghi' ],
            [ '#aabc' ],
            [ '#1001' ],
            [ 'hello, world' ]
        ];
    }
}