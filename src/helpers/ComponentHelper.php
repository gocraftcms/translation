<?php
/**
 * Translation plugin for Craft 3
 *
 * @link https://panlatent.com/
 * @copyright Copyright (c) 2018 Panlatent
 */

namespace panlatent\translation\helpers;

use craft\base\SavableComponentInterface;

class ComponentHelper
{
    public static function options(string $class): array
    {
        $options = [];
        if (is_subclass_of($class, SavableComponentInterface::class)) {
            /** @var SavableComponentInterface|string $class */
            $options['label'] = $class::displayName();
        }

        if (is_callable([$class, 'displayIconPath'])) {
            $options['icon'] =  call_user_func([$class, 'displayIconPath']);
        }

        if (is_callable([$class, 'defineUrl'])) {
            $options['url'] =  call_user_func([$class, 'defineUrl']);
        }

        return $options;
    }
}