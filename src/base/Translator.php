<?php

namespace gocraft\translation\base;

use craft\base\SavableComponent;

class Translator extends SavableComponent implements TranslatorInterface
{
    use TranslatorTrait;
}