<?php

namespace gocraft\translation\base;

use craft\base\SavableComponent;

class Source extends SavableComponent implements ExtractorInterface
{
    use SourceTrait;
}