<?php
/**
 * Translation plugin for Craft 3
 *
 * @link https://panlatent.com/
 * @copyright Copyright (c) 2018 Panlatent
 */

namespace panlatent\translation\services;

use craft\events\RegisterComponentTypesEvent;
use panlatent\translation\extractors\GettextExtractor;
use panlatent\translation\extractors\TwigExtractor;
use panlatent\translation\extractors\YiiExtractor;
use yii\base\Component;

class Extractors extends Component
{
    const EVENT_REGISTER_EXTRACTOR_TYPES = 'registerExtractorTypes';

    /**
     * @return string[]
     */
    public function getExtractorTypes(): array
    {
        $types = [
            TwigExtractor::class,
            YiiExtractor::class,
            GettextExtractor::class,
        ];

        $event = new RegisterComponentTypesEvent([
            'types' => $types,
        ]);

        $this->trigger(static::EVENT_REGISTER_EXTRACTOR_TYPES, $event);

        return $event->types;
    }
}