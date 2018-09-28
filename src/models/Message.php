<?php
/**
 * Translation plugin for Craft 3
 *
 * @link https://panlatent.com/
 * @copyright Copyright (c) 2018 Panlatent
 */

namespace panlatent\translation\models;

use craft\base\Model;

class Message extends Model
{
    public $file;

    public $line;

    public $source;

    public $output;
}