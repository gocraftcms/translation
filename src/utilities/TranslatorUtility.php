<?php
/**
 * Translation plugin for Craft 3
 *
 * @link https://panlatent.com/
 * @copyright Copyright (c) 2018 Panlatent
 */

namespace panlatent\translation\utilities;

use Craft;
use craft\base\Utility;
use panlatent\translation\assets\TranslatorUtilityAsset;

/**
 * Class TranslatorUtility
 *
 * @package panlatent\translation\utilities
 * @author Panlatent <panlatent@gmail.com>
 */
class TranslatorUtility extends Utility
{
    // Static
    // =========================================================================

    /**
     * Returns the display name of this utility.
     *
     * @return string The display name of this utility.
     */
    public static function displayName(): string
    {
        return Craft::t('translation', 'Translator Utility');
    }

    /**
     * Returns the utility’s unique identifier.
     *
     * The ID should be in `kebab-case`, as it will be visible in the URL (`admin/utilities/the-handle`).
     *
     * @return string
     */
    public static function id(): string
    {
        return 'translator';
    }

    /**
     * Returns the path to the utility's SVG icon.
     *
     * @return string|null The path to the utility SVG icon
     */
    public static function iconPath()
    {
        return Craft::getAlias("@panlatent/translation/icon.svg");
    }

    /**
     * Returns the number that should be shown in the utility’s nav item badge.
     *
     * If `0` is returned, no badge will be shown
     *
     * @return int
     */
    public static function badgeCount(): int
    {
        return 0;
    }

    /**
     * Returns the utility's content HTML.
     *
     * @return string
     */
    public static function contentHtml(): string
    {
        Craft::$app->getView()->registerAssetBundle(TranslatorUtilityAsset::class);

        $someVar = 'Have a nice day!';
        return Craft::$app->getView()->renderTemplate(
            'translation/_components/utilities/Translator',
            [
                'someVar' => $someVar
            ]
        );
    }
}
