<?php
/**
 * Translation plugin for Craft 3
 *
 * @link https://panlatent.com/
 * @copyright Copyright (c) 2018 Panlatent
 */

namespace panlatent\translation\controllers;

use craft\web\Controller;
use yii\web\Response;

class TranslatorsController extends Controller
{
    public function init()
    {
        parent::init();
    }

    public function actionTranslatorIndex(): Response
    {
        return $this->renderTemplate('translation/translators/_index', []);
    }

    public function actionEditTranslator(): Response
    {
        return $this->renderTemplate('translation/translators/_edit', []);
    }

    public function actionSaveTranslator()
    {

    }

    public function actionDeleteTranslator()
    {

    }
}