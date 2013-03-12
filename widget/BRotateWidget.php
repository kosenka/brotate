<?php

class BRotateWidget extends CWidget
{
        public $bnrTag;

        public function run()
        {
                $module=Yii::app()->getModule('brotate');

                if(empty($module->webFolder))
                {
                        throw new Exception('Error: param "BRotate::webFolder" cannot be empty');
                }

                $result=Banners::model()->bannersGet(array('bnrTag'=>$this->bnrTag));
                echo $this->renderFile(Yii::getPathOfAlias('application.modules.brotate.views.default.brotate_').$result['bnrTyp'].'.php',array('banner'=>$result['banner']),true);
        }

}
