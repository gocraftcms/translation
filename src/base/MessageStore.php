<?php

namespace panlatent\craft\translator\base;

use craft\base\SavableComponent;

class MessageStore extends SavableComponent implements ExtractorInterface
{
    use MessageStoreTrait;
}