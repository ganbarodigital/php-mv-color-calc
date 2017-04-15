# CHANGELOG

## develop branch

### New

* Initial support for the sRGB color space:
  - added `ColorCalc` exception interface (for type-hinting)
  - added `ColorFormat` constant container
  - added `CssColorFunctions` map
  - added `CssColorKeywords` map
  - added `CssColorValues` map
  - added `IsCssColorFunction` check
  - added `IsCssColorKeyword` check
  - added `IsCssColorValue` check
  - added `MapCssColorKeywordToValue`
  - added `RemoveHashPrefix` value editor
  - added `RequireValidCssColorValue` robustness check
  - added `UnknownCssColorKeyword` exception
  - added `UnsupportedCssColorValue` exception