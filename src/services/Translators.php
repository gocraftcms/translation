<?php

namespace panlatent\craft\translator\services;

use craft\events\RegisterComponentTypesEvent;
use yii\base\Component;

class Translators extends Component
{
    const EVENT_REGISTER_TRANSLATOR_TYPES = 'registerTranslatorTypes';

    /**
     * @return string[]
     */
    public function getTranslatorTypes(): array
    {
        $types = [];

        $event = new RegisterComponentTypesEvent([
            'types' => $types,
        ]);

        $this->trigger(static::EVENT_REGISTER_TRANSLATOR_TYPES, $event);

        return $event->types;
    }
}