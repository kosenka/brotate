<?php

class DefaultController extends CController
{
        //public $defaultAction='index';

	/**
	 * @return array action filters
	 */
        public function filters()
        {
                return array(
                );
        }

        public function actions()
        {
                return array(
                );
        }

	/**
	 * Specifies the access control rules.
	 * This method is used by the 'accessControl' filter.
	 * @return array access control rules
	 */
	public function accessRules()
        {
		return array(
			array('allow',
				'actions'=>array('index'),
				'users'=>array('@'),
			),
			array('deny',  // deny all users
				'users'=>array('*'),
			),
		);
	}

        public function actionIndex()
        {
                $module=Yii::app()->getModule('brotate');

                if(empty($module->webFolder))
                {
                        throw new Exception('Error: param "BRotate::webFolder" cannot be empty');
                }

                $result=Banners::model()->bannersGet(array('bnrTag'=>$_GET['bnrTag']));
                $res=$this->renderPartial('brotate_'.$result['bnrTyp'],array('banner'=>$result['banner']),true);
                $res=str_replace("\r",'',$res);
                $res=str_replace("\n",'',$res);
                if(isset($res) and !empty($res)) echo "document.write('".$res."');";
                Yii::app()->end();
        }
}
