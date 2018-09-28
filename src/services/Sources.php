<?php
/**
 * Translation plugin for Craft 3
 *
 * @link https://panlatent.com/
 * @copyright Copyright (c) 2018 Panlatent
 */

namespace panlatent\translation\services;

use craft\events\RegisterComponentTypesEvent;
use panlatent\translation\messagestores\PhpSource;
use panlatent\translation\source\GettextSource;
use yii\base\Component;

/**
 * Class Sources
 *
 * @package panlatent\translation\services
 * @author Panlatent <panlatent@gmail.com>
 */
class Sources extends Component
{
    const EVENT_REGISTER_SOURCE_TYPES = 'registerSourceTypes';

    /**
     * @return string[]
     */
    public function getSourceTypes(): array
    {
        $types = [
            PhpSource::class,
            GettextSource::class,
        ];

        $event = new RegisterComponentTypesEvent([
            'types' => $types,
        ]);

        $this->trigger(static::EVENT_REGISTER_SOURCE_TYPES, $event);

        return $event->types;
    }
}