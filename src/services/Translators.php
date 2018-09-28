<?php
/**
 * Translation plugin for Craft 3
 *
 * @link https://panlatent.com/
 * @copyright Copyright (c) 2018 Panlatent
 */

namespace panlatent\translation\services;

use craft\events\RegisterComponentTypesEvent;
use panlatent\translation\translators\BaiduTranslator;
use panlatent\translation\translators\GoogleTranslator;
use panlatent\translation\translators\YoudaoTranslator;
use yii\base\Component;

class Translators extends Component
{
    const EVENT_REGISTER_TRANSLATOR_TYPES = 'registerTranslatorTypes';

    /**
     * @return string[]
     */
    public function getTranslatorTypes(): array
    {
        $types = [
            GoogleTranslator::class,
            YoudaoTranslator::class,
            BaiduTranslator::class,
        ];

        $event = new RegisterComponentTypesEvent([
            'types' => $types,
        ]);

        $this->trigger(static::EVENT_REGISTER_TRANSLATOR_TYPES, $event);

        return $event->types;
    }
}