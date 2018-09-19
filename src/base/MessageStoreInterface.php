<?php

namespace panlatent\craft\translator\base;

use craft\base\SavableComponentInterface;

interface MessageStoreInterface extends SavableComponentInterface
{
    public function save();
}