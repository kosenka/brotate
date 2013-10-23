<?php

class ClickController extends CController
{
        public function actionIndex()
        {
                $bnrUrl=Banners::model()->bannersClick(array('id'=>Yii::app()->getRequest()->getQuery('id')));
                if(isset($bnrUrl) and !empty($bnrUrl))
                        $this->redirect($bnrUrl);
                else
                        $this->redirect("/");
        }

}
