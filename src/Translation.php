<?php
/**
 * Translator plugin for Craft 3
 *
 * @link      https://gocraftcms.com/
 * @copyright Copyright (c) 2018 panlatent@gmail.com
 */

namespace gocraft\translation;

use Craft;
use craft\base\Plugin;
use craft\i18n\PhpMessageSource;
use craft\services\Plugins;
use craft\events\PluginEvent;
use craft\console\Application as ConsoleApplication;
use craft\services\Utilities;
use craft\events\RegisterComponentTypesEvent;
use gocraft\translation\models\Settings;
use gocraft\translation\utilities\TranslatorUtility;
use yii\base\Event;

/**
 * Class Translator
 *
 * @package gocraft\translation
 * @author Panlatent <panlatent@gmail.com>
 */
class Translation extends Plugin
{
    // Static Properties
    // =========================================================================

    /**
     * @var Translation
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

        Craft::setAlias('@gocraft/translation', $this->getBasePath());

        Craft::$app->i18n->translations['translation'] = [
            'class' => PhpMessageSource::class,
            'basePath' => '@gocraft/translation/translations',
        ];

        // Add in our console commands
        if (Craft::$app instanceof ConsoleApplication) {
            $this->controllerNamespace = 'gocraft\translation\console\controllers';
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
                'translation',
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
