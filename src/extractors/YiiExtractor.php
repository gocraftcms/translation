<?php
/**
 * Translation plugin for Craft 3
 *
 * @link https://panlatent.com/
 * @copyright Copyright (c) 2018 Panlatent
 */

namespace panlatent\translation\extractors;

use Craft;
use panlatent\translation\base\Extractor;

class YiiExtractor extends Extractor
{
    public static function displayIconPath(): string
    {
        return Craft::getAlias('@panlatent/translation/icons/yii.svg');
    }
}