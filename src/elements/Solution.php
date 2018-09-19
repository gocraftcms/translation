<?php

namespace panlatent\craft\translator\elements;

use craft\base\Element;
use craft\elements\db\ElementQueryInterface;
use panlatent\craft\translator\elements\db\SolutionQuery;

/**
 * Class Solution
 *
 * @package panlatent\craft\translator\elements
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