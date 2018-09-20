<?php
/**
 * Translation plugin for Craft 3
 *
 * @link https://gocraftcms.com/
 * @copyright Copyright (c) 2018 gocraftcms.com
 */

namespace gocraft\translation\models;

use craft\base\Model;

class Message extends Model
{
    public $file;

    public $line;

    public $source;

    public $output;
}