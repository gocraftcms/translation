<?php
/**
 * Translation plugin for Craft 3
 *
 * @link https://panlatent.com/
 * @copyright Copyright (c) 2018 Panlatent
 */

namespace panlatent\translation;

use Craft;
use craft\console\Application as ConsoleApplication;
use craft\events\RegisterCpNavItemsEvent;
use craft\events\RegisterUrlRulesEvent;
use craft\services\Utilities;
use craft\events\RegisterComponentTypesEvent;
use craft\web\twig\variables\Cp;
use craft\web\UrlManager;
use panlatent\translation\helpers\ComponentHelper;
use panlatent\translation\models\Settings;
use panlatent\translation\services\Extractors;
use panlatent\translation\services\Solutions;
use panlatent\translation\services\Sources;
use panlatent\translation\services\Translators;
use panlatent\translation\utilities\TranslatorUtility;
use yii\base\Event;

/**
 * Class Translation Plugin
 *
 * @package panlatent\translation
 * @property-read Extractors $extractors
 * @property-read Solutions $solutions
 * @property-read Sources $sources
 * @property-read Translators $translators
 * @author Panlatent <panlatent@gmail.com>
 * @since 0.1.0
 */
class Plugin extends \craft\base\Plugin
{
    // Static Properties
    // =========================================================================

    /**
     * @var Plugin
     */
    public static $plugin;

    // Public Properties
    // =========================================================================

    /**
     * @var string
     */
    public $schemaVersion = '0.1.0';

    /**
     * @var string
     */
    public $t9nCategory = 'translation';

    // Public Methods
    // =========================================================================

    /**
     * Init.
     */
    public function init()
    {
        parent::init();
        self::$plugin = $this;

        Craft::configure($this, require __DIR__ . '/config/plugin.php');

        Craft::setAlias('@translation', $this->getBasePath());

        // Add in our console commands
        if (Craft::$app instanceof ConsoleApplication) {
            $this->controllerNamespace = 'panlatent\translation\console\controllers';
        } else {
            Event::on(UrlManager::class, UrlManager::EVENT_REGISTER_CP_URL_RULES, function(RegisterUrlRulesEvent $event) {
                $event->rules = array_merge($event->rules, require __DIR__ . '/config/cproutes.php');
            });
        }

        // Register our utilities
        Event::on(
            Utilities::class,
            Utilities::EVENT_REGISTER_UTILITY_TYPES,
            function (RegisterComponentTypesEvent $event) {
                $event->types[] = TranslatorUtility::class;
            }
        );

        /** @var Settings $settings */
        $settings = $this->getSettings();
        if ($settings->registerCpSidebar) {
            Event::on(Cp::class, Cp::EVENT_REGISTER_CP_NAV_ITEMS, function(RegisterCpNavItemsEvent $event) {
                $event->navItems[$this->handle] = [
                    'label' => Craft::t('translation', 'Translation'),
                    'url' => 'translation',
                    'icon' => '@translation/icon.svg',
                ];
            });
        }

        Craft::info(
            Craft::t(
                'translation',
                '{name} plugin loaded',
                ['name' => $this->name]
            ),
            __METHOD__
        );
    }

    // Service Getters
    // =========================================================================

    /**
     * @return Extractors
     */
    public function getExtractors()
    {
        /** @noinspection PhpIncompatibleReturnTypeInspection */
        return $this->get('extractors');
    }

    /**
     * @return Solutions
     */
    public function getSolutions()
    {
        /** @noinspection PhpIncompatibleReturnTypeInspection */
        return $this->get('solutions');
    }

    /**
     * @return Sources
     */
    public function getSources()
    {
        /** @noinspection PhpIncompatibleReturnTypeInspection */
        return $this->get('sources');
    }

    /**
     * @return Translators
     */
    public function getTranslators()
    {
        /** @noinspection PhpIncompatibleReturnTypeInspection */
        return $this->get('translators');
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
        $extractorTypeOptions = $this->_getTypeOptions($this->getExtractors()->getExtractorTypes());
        $sourceTypeOptions = $this->_getTypeOptions($this->getSources()->getSourceTypes());
        $translatorTypeOptions = $this->_getTypeOptions($this->getTranslators()->getTranslatorTypes());

        return Craft::$app->view->renderTemplate(
            'translation/settings',
            [
                'translation' => $this,
                'extractorTypeOptions' => $extractorTypeOptions,
                'sourceTypeOptions' => $sourceTypeOptions,
                'translatorTypeOptions' => $translatorTypeOptions,
                'settings' => $this->getSettings(),
            ]
        );
    }

    /**
     * @param array $types
     * @return array
     */
    private function _getTypeOptions(array $types): array
    {
        $typeOptions = [];
        foreach ($types as $type) {
            $typeOptions[$type] = ComponentHelper::options($type);
        }

        return $typeOptions;
    }
}
