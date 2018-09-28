<?php
/**
 * Translation plugin for Craft 3
 *
 * @link https://panlatent.com/
 * @copyright Copyright (c) 2018 Panlatent
 */

namespace panlatent\translation\elements;

use craft\base\Element;
use craft\elements\db\ElementQueryInterface;
use panlatent\translation\elements\db\SolutionQuery;

/**
 * Class Solution
 *
 * @package panlatent\translation\elements
 * @author Panlatent <panlatent@gmail.com>
 */
class Solution extends Element
{
    public static function find(): ElementQueryInterface
    {
        return new SolutionQuery(static::class);
    }

    public $name;

    public $sourceLanguage;

    public $targetLanguage;

    public $enableTranslator = true;

    public $output;
}