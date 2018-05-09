<?php
/**
 * poedit plugin for Craft CMS 3.x
 *
 * Extract, edit and generate your translations in CP
 *
 * @link      https://panlatent.com
 * @copyright Copyright (c) 2018 panlatent
 */

namespace panlatent\poedit\console\controllers;

use panlatent\poedit\Poedit;

use Craft;
use yii\console\Controller;
use yii\helpers\Console;

/**
 * Poedit Command
 *
 * The first line of this class docblock is displayed as the description
 * of the Console Command in ./craft help
 *
 * Craft can be invoked via commandline console by using the `./craft` command
 * from the project root.
 *
 * Console Commands are just controllers that are invoked to handle console
 * actions. The segment routing is plugin-name/controller-name/action-name
 *
 * The actionIndex() method is what is executed if no sub-commands are supplied, e.g.:
 *
 * ./craft poedit/poedit
 *
 * Actions must be in 'kebab-case' so actionDoSomething() maps to 'do-something',
 * and would be invoked via:
 *
 * ./craft poedit/poedit/do-something
 *
 * @author    panlatent
 * @package   Poedit
 * @since     0.1.0
 */
class PoeditController extends Controller
{
    // Public Methods
    // =========================================================================

    /**
     * Handle poedit/poedit console commands
     *
     * The first line of this method docblock is displayed as the description
     * of the Console Command in ./craft help
     *
     * @return mixed
     */
    public function actionIndex()
    {
        $result = 'something';

        echo "Welcome to the console PoeditController actionIndex() method\n";

        return $result;
    }

    /**
     * Handle poedit/poedit/do-something console commands
     *
     * The first line of this method docblock is displayed as the description
     * of the Console Command in ./craft help
     *
     * @return mixed
     */
    public function actionDoSomething()
    {
        $result = 'something';

        echo "Welcome to the console PoeditController actionDoSomething() method\n";

        return $result;
    }
}
