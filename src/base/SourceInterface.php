<?php
/**
 * Translation plugin for Craft 3
 *
 * @link https://panlatent.com/
 * @copyright Copyright (c) 2018 Panlatent
 */

namespace panlatent\translation\base;

use craft\base\SavableComponentInterface;

interface SourceInterface extends SavableComponentInterface
{
    /**
     * @return string
     */
    public static function displayIconPath(): string;

    public function save();
}