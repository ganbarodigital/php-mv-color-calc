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
 * @package   ColorCalc/Requirements
 * @author    Stuart Herbert <stuherbert@ganbarodigital.com>
 * @copyright 2017-present Ganbaro Digital Ltd www.ganbarodigital.com
 * @license   http://www.opensource.org/licenses/bsd-license.php  BSD License
 * @link      http://ganbarodigital.github.io/php-mv-color-calc
 */

namespace GanbaroDigital\ColorCalc\V1\Requirements;

use GanbaroDigital\ColorCalc\V1\Checks\IsCssColorValue;
use GanbaroDigital\ColorCalc\V1\Exceptions\UnsupportedCssColorValue;
use GanbaroDigital\Defensive\V1\Interfaces\ListRequirement;
use GanbaroDigital\Defensive\V1\Interfaces\Requirement;
use GanbaroDigital\Defensive\V1\Requirements\InvokeableRequirement;
use GanbaroDigital\Defensive\V1\Requirements\ListableRequirement;

/**
 * make sure that the supplied value is a valid CSS color value
 */
class RequireValidCssColorValue implements Requirement, ListRequirement
{
    // saves us having to declare ::__invoke() ourselves
    use InvokeableRequirement;

    // saves us having to declare ::toList() ourselves
    use ListableRequirement;

    /**
     * create a Requirement that is ready to use
     *
     * @return Requirement
     */
    public static function apply()
    {
        return new self;
    }

    /**
     * make sure that the supplied value is a valid CSS color value
     *
     * @param  string $fieldOrVar
     *         the CSS color value to check
     * @param  string $fieldOrVarName
     *         what is $fieldOrVar called in your code?
     * @return void
     *
     * @throws UnsupportedCssColorValue
     *         if $fieldOrVar contains a CSS color we do not support, or
     *         it doesn't contain a CSS color at all
     */
    public function to($fieldOrVar, $fieldOrVarName = '$fieldOrVar')
    {
        if (IsCssColorValue::check($fieldOrVar)) {
            return;
        }

        throw UnsupportedCssColorValue::newFromInputParameter($fieldOrVar, $fieldOrVarName);
    }
}