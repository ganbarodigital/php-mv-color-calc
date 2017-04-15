<?php

declare(strict_types=1);

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
 * @package   ColorCalc/Requirements
 * @author    Stuart Herbert <stuherbert@ganbarodigital.com>
 * @copyright 2017-present Ganbaro Digital Ltd www.ganbarodigital.com
 * @license   http://www.opensource.org/licenses/bsd-license.php  BSD License
 * @link      http://ganbarodigital.github.io/php-mv-color-calc
 */

namespace GanbaroDigitalTest\ColorCalc\V1\Requirements;

use GanbaroDigital\Defensive\V1\Interfaces\Requirement;
use GanbaroDigital\Defensive\V1\Interfaces\ListRequirement;
use GanbaroDigital\ColorCalc\V1\Requirements\RequireValidCssColorValue;
use PHPUnit\Framework\TestCase;

/**
 * @coversDefaultClass GanbaroDigital\ColorCalc\V1\Requirements\RequireValidCssColorValue
 */
class RequireValidCssColorValueTest extends TestCase
{
    /**
     * @coversNothing
     */
    public function test_can_instantiate()
    {
        // ----------------------------------------------------------------
        // setup your test

        // ----------------------------------------------------------------
        // perform the change

        $unit = new RequireValidCssColorValue();

        // ----------------------------------------------------------------
        // test the results

        $this->assertInstanceOf(RequireValidCssColorValue::class, $unit);
    }

    /**
     * @covers ::apply
     * @covers ::to
     */
    public function test_returns_nothing_for_3_digit_color_values()
    {
        // ----------------------------------------------------------------
        // setup your test

        $input = "#000";

        // ----------------------------------------------------------------
        // perform the change

        RequireValidCssColorValue::apply()->to($input);

        // ----------------------------------------------------------------
        // test the results
        //
        // if we get here, then we know that the Requirement has accepted
        // our data
        //
        // we need to do some sort of assert here to keep PHPUnit happy :)

        $this->assertTrue(true);
    }

    /**
     * @covers ::apply
     * @covers ::to
     */
    public function test_returns_nothing_for_6_digit_color_values()
    {
        // ----------------------------------------------------------------
        // setup your test

        $input = "#000000";

        // ----------------------------------------------------------------
        // perform the change

        RequireValidCssColorValue::apply()->to($input);

        // ----------------------------------------------------------------
        // test the results
        //
        // if we get here, then we know that the Requirement has accepted
        // our data
        //
        // we need to do some sort of assert here to keep PHPUnit happy :)

        $this->assertTrue(true);
    }

    /**
     * @covers ::apply
     * @covers ::to
     * @expectedException GanbaroDigital\ColorCalc\V1\Exceptions\UnsupportedCssColorValue
     */
    public function test_throws_UnsupportedCssColorValue_otherwise()
    {
        // ----------------------------------------------------------------
        // setup your test

        // ----------------------------------------------------------------
        // perform the change

        RequireValidCssColorValue::apply()->to('not a CSS color value');

        // ----------------------------------------------------------------
        // test the results
    }

    /**
     * @coversNothing
     */
    public function test_is_Requirement()
    {
        // ----------------------------------------------------------------
        // setup your test

        // ----------------------------------------------------------------
        // perform the change

        $unit = new RequireValidCssColorValue();

        // ----------------------------------------------------------------
        // test the results

        $this->assertInstanceOf(Requirement::class, $unit);
    }

    /**
     * @coversNothing
     */
    public function test_is_ListRequirement()
    {
        // ----------------------------------------------------------------
        // setup your test

        // ----------------------------------------------------------------
        // perform the change

        $unit = new RequireValidCssColorValue();

        // ----------------------------------------------------------------
        // test the results

        $this->assertInstanceOf(ListRequirement::class, $unit);
    }

    /**
     * @covers ::apply
     * @covers ::toList
     * @expectedException GanbaroDigital\ColorCalc\V1\Exceptions\UnsupportedCssColorValue
     */
    public function test_can_use_as_ListCheck()
    {
        // ----------------------------------------------------------------
        // setup your test

        $list = [
            '#fff',
            'never a CSS color',
        ];

        // ----------------------------------------------------------------
        // perform the change

        RequireValidCssColorValue::apply()->toList($list);

        // ----------------------------------------------------------------
        // test the results
    }
}