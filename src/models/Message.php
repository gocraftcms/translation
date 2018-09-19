<?php

namespace gocraft\translation\models;

use craft\base\Model;

class Message extends Model
{
    public $file;

    public $line;

    public $source;

    public $output;
}