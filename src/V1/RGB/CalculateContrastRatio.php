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
 * @package   ColorCalc/RGB
 * @author    Stuart Herbert <stuherbert@ganbarodigital.com>
 * @copyright 2017-present Ganbaro Digital Ltd www.ganbarodigital.com
 * @license   http://www.opensource.org/licenses/bsd-license.php  BSD License
 * @link      http://ganbarodigital.github.io/php-mv-color-calc
 */

namespace GanbaroDigital\ColorCalc\V1\RGB;

use GanbaroDigital\CssParser\V1\Values\CssColor;

/**
 * what is the contrast ratio between two colors?
 */
class CalculateContrastRatio
{
    /**
     * what is the contrast ratio between two colors?
     *
     * this is used to help meet accessibility standards, where text and its
     * background color should (under most circumstances) have a contrast
     * ratio of at least 4.5:1
     *
     * https://www.w3.org/TR/UNDERSTANDING-WCAG20/visual-audio-contrast-contrast.html
     *
     * this formula is taken from:
     *
     * https://www.w3.org/TR/2008/REC-WCAG20-20081211/#contrast-ratiodef
     *
     * NOTE:
     * - you can pass in the foreground color and the background color in
     *   any order, and you'll still get the same result back
     *
     * @param  CssColor $color1
     *         a CSS color to evaluate
     * @param  CssColor $color2
     *         a second CSS hexcolor, to compare against $color1
     * @return the contrast ratio between the two colors
     */
    public static function from(CssColor $color1, CssColor $color2)
    {
        $lumin1 = CalculateRelativeLuminosity::from($color1);
        $lumin2 = CalculateRelativeLuminosity::from($color2);

        // which color is brighter?
        // it affects our final calculation
        if ($lumin1 > $lumin2) {
            return self::calculateFinalRatio($lumin1, $lumin2);
        }

        return self::calculateFinalRatio($lumin2, $lumin1);
    }

    /**
     * what is the contrast ratio between two colors?
     *
     * @param  float $lighter
     *         the more luminous of the two colors
     * @param  float $darker
     *         the less luminous of the two colors
     * @return float
     *         the contrast ratio between the two
     */
    private static function calculateFinalRatio($lighter, $darker)
    {
        return ($lighter + 0.05) / ($darker + 0.05);
    }
}