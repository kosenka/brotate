<?php

class DefaultController extends CController
{
        public function actionIndex()
        {
                $module=Yii::app()->getModule('brotate');
                $module->showBanner($_GET['bnrTag']);
        }

}
