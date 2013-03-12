<?php

class ClickController extends CController
{
        public $defaultAction='index';

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
				'users'=>array('*'),
			),
			array('deny',  // deny all users
				'users'=>array('*'),
			),
		);
	}

        public function actionIndex()
        {
                $bnrUrl=Banners::model()->bannersClick(array('id'=>Yii::app()->getRequest()->getQuery('id')));
                if(isset($bnrUrl) and !empty($bnrUrl))
                        $this->redirect($bnrUrl);
                else
                        $this->redirect("/");
        }

}
