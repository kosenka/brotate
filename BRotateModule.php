<?php
/**
 * Banner rotation module for Yii Framework.
 *
 * @author Vladimir Papaev <kosenka@gmail.com>
 * @version 0.1
 * @license http://www.opensource.org/licenses/bsd-license.php
 *
 */

/*
<script type="text/javascript">
<!--
   document.write ("<" + "script language='JavaScript' type='text/javascript' src='");
   document.write ("=$this->createUrl('/brotate/default',array('rr'=>time()))");
   if (document.referer)
      document.write ("&amp;referer=" + escape(document.referer));
   document.write ("'><" + "/script>");
//-->
</script>

OR

$this->widget('application.modules.brotate.widget.BRotateWidget');

*/

class BRotateModule extends CWebModule
{
	/**
	* @property string the path to the YiiBootstrap.
	*/
	public $yiiBootstrap = 'ext.bootstrap.components.Bootstrap';

	/**
	* @property string the path to the layout file to use for displaying Rights.
	*/
	public $layout = 'brotate.views.layouts.main';

	/**
	 * @var string the application layout.
	 * Change this if you wish to use a different layout with the module.
	 */
	public $appLayout = 'application.views.layouts.main';

	public $webFolder;
	public $onPage=10;

        public $users = array();//array('admin',);
        public $roles = array();//array('Administrator',);
        public $ips   = array(); //allowed ip

	public function init()
	{
		// import the module-level models and components
		$this->setImport(array(
			'application.modules.brotate.components.*',
			'application.modules.brotate.models.*',
		));

                $this->defaultController = 'default';
	}

	public function beforeControllerAction($controller, $action)
	{
		if(parent::beforeControllerAction($controller, $action))
		{
                        if(!isset($this->webFolder) or empty($this->webFolder))
                                throw new Exception('Error: param "BRotate::webFolder" cannot be empty');

			return true;
		}
		else
			return false;
	}

        public function showBanner($bnrTag='', $template='', $widget=false)
        {
                $result=Banners::model()->bannersGet(array('bnrTag'=>$bnrTag));
                $banner=Yii::app()->controller->renderFile(Yii::getPathOfAlias('application.modules.brotate.views.default.brotate_').$result['bnrTyp'].'.php',array('banner'=>$result['banner']),true);
                $banner=str_replace("\r",'',$banner);
                $banner=str_replace("\n",'',$banner);
                if(isset($banner) and !empty($banner))
                {
                        if(isset($this->template) and !empty($this->template))
                                $banner=str_replace('{content}',$banner,$this->template);

                        if($widget===false)
                                echo "document.write('".$banner."');";
                        else
                                echo $banner;

                }
                //Yii::app()->end();
        }

        public function getIp()
        {
                $strRemoteIP = $_SERVER['REMOTE_ADDR'];
                if (!$strRemoteIP) { $strRemoteIP = urldecode(getenv('HTTP_CLIENTIP')); }
                if (getenv('HTTP_X_FORWARDED_FOR')) { $strIP = getenv('HTTP_X_FORWARDED_FOR'); }
                elseif (getenv('HTTP_X_FORWARDED')) { $strIP = getenv('HTTP_X_FORWARDED'); }
                elseif (getenv('HTTP_FORWARDED_FOR')) { $strIP = getenv('HTTP_FORWARDED_FOR'); }
                elseif (getenv('HTTP_FORWARDED')) { $strIP = getenv('HTTP_FORWARDED'); }
                else { $strIP = $_SERVER['REMOTE_ADDR']; }

                if ($strRemoteIP != $strIP) { $strIP = $strRemoteIP.", ".$strIP; }
                return $strIP;
        }

        public function registerScripts()
        {
        }
}
