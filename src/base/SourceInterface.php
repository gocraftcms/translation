<?php

namespace gocraft\translation\base;

use craft\base\SavableComponentInterface;

interface SourceInterface extends SavableComponentInterface
{
    public function save();
}