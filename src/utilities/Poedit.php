<?php
/**
 * poedit plugin for Craft CMS 3.x
 *
 * Extract, edit and generate your translations in CP
 *
 * @link      https://panlatent.com
 * @copyright Copyright (c) 2018 panlatent
 */

namespace panlatent\poedit\utilities;

use panlatent\poedit\Poedit;
use panlatent\poedit\assetbundles\poeditutility\PoeditUtilityAsset;

use Craft;
use craft\base\Utility;

/**
 * poedit Utility
 *
 * Utility is the base class for classes representing Control Panel utilities.
 *
 * https://craftcms.com/docs/plugins/utilities
 *
 * @author    panlatent
 * @package   Poedit
 * @since     0.1.0
 */
class Poedit extends Utility
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
        return Craft::t('poedit', 'Poedit');
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
        return 'poedit-poedit';
    }

    /**
     * Returns the path to the utility's SVG icon.
     *
     * @return string|null The path to the utility SVG icon
     */
    public static function iconPath()
    {
        return Craft::getAlias("@panlatent/poedit/assetbundles/poeditutility/dist/img/Poedit-icon.svg");
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
        Craft::$app->getView()->registerAssetBundle(PoeditUtilityAsset::class);

        $someVar = 'Have a nice day!';
        return Craft::$app->getView()->renderTemplate(
            'poedit/_components/utilities/Poedit_content',
            [
                'someVar' => $someVar
            ]
        );
    }
}
