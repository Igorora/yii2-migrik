<?php

namespace insolita\migrik;

use yii\base\Application;
use yii\base\BootstrapInterface;

class Bootstrap implements BootstrapInterface
{
    /**
     * Bootstrap method to be called during application bootstrap stage.
     *
     * @param Application $app the application currently running
     */
    public function bootstrap($app)
    {
        if ($app->hasModule('gii')) {
            if (!isset($app->getModule('gii')->generators['migrik'])) {
                $app->getModule('gii')->generators['migrik'] = 'insolita\migrik\gii\Generator';
            }
            if ($app instanceof \yii\console\Application) {
                $app->controllerMap['migrik-cmd'] = 'insolita\migrik\cmd\MigrikController';
            }
        }
    }
}
