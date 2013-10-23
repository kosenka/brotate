<?php

class AdminController extends CController
{
        public $breadcrumbs;

	protected function beforeAction()
	{
                if(!Yii::app()->user->checkAccess('Madmin.BRotate'))
                        throw new CHttpException(403,'Forbidden');

                if(isset($this->module->yiiBootstrap) and !empty($this->module->yiiBootstrap))
                        Yii::app()->setComponent('bootstrap',Yii::createComponent(
                                                                                  array(
                                                                                        'class' => $this->module->yiiBootstrap,
                                                                                        'responsiveCss' => true
                                                                                       )
                                                                                 ));

                $disable = in_array(Yii::app()->user->name, $this->module->users);
                foreach ($this->module->roles as $role)
                {
                        $disable = $disable || Yii::app()->user->checkAccess($role);
                }

                $disable = $disable || in_array($this->module->getIp(), $this->module->ips);

		if(!$disable)
                {
                        throw new CHttpException(404,'The requested page does not exist.');
                }
                return true;
	}

        public function actionIndex()
        {
                $this->pageTitle='Banners rotate admin : index';
                $model=new Banners('search');
		if(Yii::app()->getRequest()->getQuery('Banners')) $model->attributes=Yii::app()->getRequest()->getQuery('Banners');

                if(Yii::app()->getRequest()->getQuery('ajax'))
                {
                        $this->renderPartial('_bannersListGrid',array('model'=>$model));
                }
                else
                {
                        $this->render('index',array('model'=>$model));
                }
        }
        
        public function actionStat()
        {
        }
        
        public function actionDelete()
        {
                $id=Yii::app()->getRequest()->getQuery('id',NULL);
                $model=Banners::model()->findByPK($id);
                if($model!==null) $model->delete();
                $this->redirect($this->createUrl("admin/index"));
        }
        
        public function actionUpdate()
        {
                $this->pageTitle='Banners rotate admin : update';
                
                $id=Yii::app()->getRequest()->getQuery('id',NULL);

                if($id!==null)
                {
                        $model=Banners::model()->findbyPk($id); // загружаем данные по модели
                        if($model===null)// если данные в модели нет - вызываем ошибку
                        {
                                throw new CHttpException(404,'The requested page does not exist.');
                        }
                }
                else
                {
                        $model=new Banners;
                }
                
                //$model->webFolder=Yii::app()->controller->module->webFolder;

                if(isset($_POST['Banners'])) // если к нам пришел POST
                {
                        $model->oldFile=$model->bnrFile;
                        $model->attributes=$_POST['Banners'];//присваиваем данные из POST в модель
                        if($model->validate())//валидируем данные
                        {
                                $bnrFile=CUploadedFile::getInstance($model,'bnrFile');//а вдруг нам загрузили картинку к категории?
                                if (is_object($bnrFile) && get_class($bnrFile)==='CUploadedFile')//да, картинку нам все таки загрузили
                                {
                                        $model->bnrFile=$bnrFile;// присваиваем данные
                                }
                                else
                                {
                                        //картинку нам не дали, восстанавливаем старую картинку
                                        $model->bnrFile=$model->oldFile;
                                }
                                if($model->save())//сохраняем модель
                                {
                                        $this->redirect($this->createUrl("admin/index"));
                                }
                        }
                }

                $this->render('update',
                              array(
                                    'model'=>$model,
                                    'update'=>true
                                   )
                             );
        }
        
        public function actionCopyBanner()
        {
                $id=Yii::app()->getRequest()->getQuery('id',NULL);
                $model=Banners::model()->findbyPk($id); // загружаем данные по модели
                if($model!==false)
                {
                        $newBanner=new Banners();
                        $newBanner->attributes=$model->attributes;
                        unset($newBanner->id);
                        $newBanner->bnrVisible=0;
                        $newBanner->save();
                        $this->redirect($this->createUrl("admin/index"));
                }
        }
        
	public function actionInstall()
	{
                Yii::app()->cache->flush();

                $connection = Yii::app()->db;
                $tablePrefix = $connection->tablePrefix;

                $transaction=$connection->beginTransaction();
		try
		{
                        $connection->createCommand("DROP TABLE IF EXISTS `brotate`")->execute();
                        $connection->createCommand("CREATE TABLE `brotate` ( `id` int(10) unsigned NOT NULL auto_increment, `bnrTag` varchar(25) NOT NULL, `bnrTyp` enum('img','swf','text') NOT NULL, `bnrFile` varchar(50) NOT NULL, `bnrWidth` int(11) unsigned NOT NULL default '0', `bnrHeight` int(11) unsigned NOT NULL default '0', `bnrUrl` varchar(250) NOT NULL, `bnrClicks` int(11) unsigned NOT NULL default '0', `bnrVisible` tinyint(1) unsigned NOT NULL default '0', `bnrVisibleFrom` int(11) NOT NULL, `bnrVisibleTo` int(11) NOT NULL, `bnrVisibleLimit` int(11) default NULL, `bnrViewedCurrent` int(11) unsigned NOT NULL default '0', `bnrViewedTotal` int(11) unsigned NOT NULL default '0', `bnrDescr` text NOT NULL, PRIMARY KEY  (`id`), KEY `bnrVisible` (`bnrVisible`) );")->execute();
		}
		catch(Exception $e)
		{
			$transaction->rollBack();
			throw new CHttpException (500, Yii::t('BRotateModule.install', 'Unable to create the tables in the database. Make sure that your db user has the necessary permissions to create a new table.'));
			return false;
		}

                Yii::app()->cache->flush();

                $this->redirect($this->createUrl("admin/index"));
        }
}
