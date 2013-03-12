<?php
/**
 * Banner rotation module for Yii Framework.
 *
 * @author Vladimir Papaev <kosenka@gmail.com>
 * @version 0.1
 * @license http://www.opensource.org/licenses/bsd-license.php
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
	 * @var string the application layout.
	 * Change this if you wish to use a different layout with the module.
	 */
	public $appLayout = 'application.views.layouts.main';
	/**
	 * @var string string the id of the default controller for this module.
	 */
	public $defaultController = 'default';

	public $webFolder;
	public $onPage=10;

        public $users = array();//array('admin',);
        public $roles = array();//array('Administrator',);
        public $ips   = array(); //allowed ip
        
	public function init()
	{
		// import the module-level models and components
		$this->setImport(array(
			'brotate.components.*',
			'brotate.models.*',
		));
	}

	public function beforeControllerAction($controller, $action)
	{
		if(parent::beforeControllerAction($controller, $action))
		{
			return true;
		}
		else
			return false;
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

}
