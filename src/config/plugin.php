<?php
/**
 * Translation plugin for Craft 3
 *
 * @link https://panlatent.com/
 * @copyright Copyright (c) 2018 Panlatent
 */

return [
    'components' => [
        'extractors' => [
            'class' => panlatent\translation\services\Extractors::class,
        ],
        'solutions' => [
            'class' => panlatent\translation\services\Solutions::class,
        ],
        'sources' => [
            'class' => panlatent\translation\services\Sources::class,
        ],
        'translators' => [
            'class' => panlatent\translation\services\Translators::class,
        ]
    ],
];
