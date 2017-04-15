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
 * @package   ColorCalc/Checks
 * @author    Stuart Herbert <stuherbert@ganbarodigital.com>
 * @copyright 2017-present Ganbaro Digital Ltd www.ganbarodigital.com
 * @license   http://www.opensource.org/licenses/bsd-license.php  BSD License
 * @link      http://ganbarodigital.github.io/php-mv-color-calc
 */

namespace GanbaroDigitalTest\ColorCalc\V1\Checks;

use GanbaroDigital\ColorCalc\V1\Checks\IsCssColorKeyword;
use GanbaroDigital\ColorCalc\V1\Maps\CssColorKeywords;
use PHPUnit\Framework\TestCase;

/**
 * @coversDefaultClass GanbaroDigital\ColorCalc\V1\Checks\IsCssColorKeyword
 */
class IsCssColorKeywordTest extends TestCase
{
    /**
     * @covers ::check
     * @dataProvider provideValidCssColorKeywords
     */
    public function test_will_detect_css_color_keywords($input)
    {
        // ----------------------------------------------------------------
        // setup your test

        // ----------------------------------------------------------------
        // perform the change

        $actualResult = IsCssColorKeyword::check($input);

        // ----------------------------------------------------------------
        // test the results

        $this->assertTrue($actualResult);
    }

    /**
     * @covers ::check
     * @dataProvider provideNonCssColorKeywords
     */
    public function test_will_reject_all_other_strings($input)
    {
        // ----------------------------------------------------------------
        // setup your test

        // ----------------------------------------------------------------
        // perform the change

        $actualResult = IsCssColorKeyword::check($input);

        // ----------------------------------------------------------------
        // test the results

        $this->assertFalse($actualResult);
    }

    public function provideValidCssColorKeywords()
    {
        $retval = [];
        foreach (array_keys(CssColorKeywords::KeywordsToHex) as $keyword) {
            $retval[] = [ $keyword ];
        }

        return $retval;
    }

    public function provideNonCssColorKeywords()
    {
        $retval = [];
        foreach (CssColorKeywords::KeywordsToHex as $value) {
            $retval[] = [ $value ];
        }

        return $retval;
    }
}