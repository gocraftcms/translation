<?php
/**
 * Translation plugin for Craft 3
 *
 * @link https://panlatent.com/
 * @copyright Copyright (c) 2018 Panlatent
 */

namespace panlatent\translation\source;

use Craft;
use panlatent\translation\base\Source;

/**
 * Class GettextSource
 *
 * @package panlatent\translation\source
 * @author Panlatent <panlatent@gmail.com>
 */
class GettextSource extends Source
{
    public static function displayIconPath(): string
    {
        return Craft::getAlias('@panlatent/translation/icons/gettext.svg');
    }
}