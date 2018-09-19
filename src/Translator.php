<?php
/**
 * Translator plugin for Craft 3
 *
 * @link      https://panlatent.com/
 * @copyright Copyright (c) 2018 panlatent@gmail.com
 */

namespace panlatent\craft\translator;

use Craft;
use craft\base\Plugin;
use craft\i18n\PhpMessageSource;
use craft\services\Plugins;
use craft\events\PluginEvent;
use craft\console\Application as ConsoleApplication;
use craft\services\Utilities;
use craft\events\RegisterComponentTypesEvent;
use panlatent\craft\translator\models\Settings;
use panlatent\craft\translator\utilities\TranslatorUtility;
use yii\base\Event;

/**
 * Class Translator
 *
 * @package panlatent\craft\translator
 * @author Panlatent <panlatent@gmail.com>
 */
class Translator extends Plugin
{
    // Static Properties
    // =========================================================================

    /**
     * @var Translator
     */
    public static $plugin;

    // Public Properties
    // =========================================================================

    /**
     * @var string
     */
    public $schemaVersion = '0.1.0';

    // Public Methods
    // =========================================================================

    /**
     * Init.
     */
    public function init()
    {
        parent::init();
        self::$plugin = $this;

        Craft::setAlias('@translator', $this->getBasePath());

        Craft::$app->i18n->translations['translator'] = [
            'class' => PhpMessageSource::class,
            'basePath' => '@translator/translations',
        ];

        // Add in our console commands
        if (Craft::$app instanceof ConsoleApplication) {
            $this->controllerNamespace = 'panlatent\craft\translator\console\controllers';
        }

        // Register our utilities
        Event::on(
            Utilities::class,
            Utilities::EVENT_REGISTER_UTILITY_TYPES,
            function (RegisterComponentTypesEvent $event) {
                $event->types[] = TranslatorUtility::class;
            }
        );

        // Do something after we're installed
        Event::on(
            Plugins::class,
            Plugins::EVENT_AFTER_INSTALL_PLUGIN,
            function (PluginEvent $event) {
                if ($event->plugin === $this) {
                    // We were just installed
                }
            }
        );

        Craft::info(
            Craft::t(
                'translator',
                '{name} plugin loaded',
                ['name' => $this->name]
            ),
            __METHOD__
        );
    }

    // Protected Methods
    // =========================================================================

    /**
     * Creates and returns the model used to store the plugin’s settings.
     *
     * @return \craft\base\Model|null
     */
    protected function createSettingsModel()
    {
        return new Settings();
    }

    /**
     * Returns the rendered settings HTML, which will be inserted into the content
     * block on the settings page.
     *
     * @return string The rendered settings HTML
     */
    protected function settingsHtml(): string
    {
        return Craft::$app->view->renderTemplate(
            'translator/settings',
            [
                'settings' => $this->getSettings()
            ]
        );
    }
}
