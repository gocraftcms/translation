<?php

namespace gocraft\translation\elements;

use craft\base\Element;
use craft\elements\db\ElementQueryInterface;
use gocraft\translation\elements\db\SolutionQuery;

/**
 * Class Solution
 *
 * @package gocraft\translation\elements
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