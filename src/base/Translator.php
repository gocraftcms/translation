<?php
/**
 * Translation plugin for Craft 3
 *
 * @link https://panlatent.com/
 * @copyright Copyright (c) 2018 Panlatent
 */

namespace panlatent\translation\base;

use craft\base\SavableComponent;

abstract class Translator extends SavableComponent implements TranslatorInterface
{
    use TranslatorTrait;
}