<?php

namespace panlatent\craft\translator\models;

use craft\base\Model;

class Message extends Model
{
    public $file;

    public $line;

    public $source;

    public $output;
}