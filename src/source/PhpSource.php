<?php
/**
 * Translation plugin for Craft 3
 *
 * @link https://panlatent.com/
 * @copyright Copyright (c) 2018 Panlatent
 */

namespace panlatent\translation\messagestores;

use Craft;
use panlatent\translation\base\Extractor;

class PhpSource extends Extractor
{
    public static function displayIconPath(): string
    {
        return Craft::getAlias('@panlatent/translation/icons/php.svg');
    }
}