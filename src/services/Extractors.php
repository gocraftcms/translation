<?php
/**
 * Translation plugin for Craft 3
 *
 * @link https://gocraftcms.com/
 * @copyright Copyright (c) 2018 gocraftcms.com
 */

namespace gocraft\translation\services;

use craft\events\RegisterComponentTypesEvent;
use yii\base\Component;

class Extractors extends Component
{
    const EVENT_REGISTER_EXTRACTOR_TYPES = 'registerExtractorTypes';

    /**
     * @return string[]
     */
    public function getTranslatorTypes(): array
    {
        $types = [];

        $event = new RegisterComponentTypesEvent([
            'types' => $types,
        ]);

        $this->trigger(static::EVENT_REGISTER_EXTRACTOR_TYPES, $event);

        return $event->types;
    }
}