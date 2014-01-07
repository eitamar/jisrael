<?php
/**
 * @package     JIsrael Template package
 * @subpackage  Templates.jisrael
 * @copyright   Copyright (C) 2005 - 2013 J-Guru.com, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 * @since       3.0
 */

defined('_JEXEC') or die;

$app = JFactory::getApplication();
$doc = JFactory::getDocument();
$lang = JFactory::getLanguage();
$params = $this->params;
// Add JavaScript Frameworks
JHtml::_('bootstrap.framework');
JHtml::_('bootstrap.tooltip');

// Add Stylesheets
$doc->addStyleSheet('templates/' .$this->template. '/css/template.css');

// Load optional RTL Bootstrap CSS
JHtml::_('bootstrap.loadCss', false, $this->direction);

// Load specific language related CSS
$file = 'language/' . $lang->getTag() . '/' . $lang->getTag() . '.css';
if (is_file($file))
{
	$doc->addStyleSheet($file);
}

// Logo file
if ($this->params->get('loginLogoFile'))
{
	$logo = JUri::root() . $this->params->get('loginLogoFile');
}
else
{
	$logo = $this->baseurl . '/templates/' . $this->template . '/images/joomla.png';
}

// Detecting Active Variables
$option   = $app->input->getCmd('option', '');
$view     = $app->input->getCmd('view', '');
$layout   = $app->input->getCmd('layout', '');
$task     = $app->input->getCmd('task', '');
$itemid   = $app->input->getCmd('Itemid', '');
$sitename = $app->getCfg('sitename');

// Check if debug is on
$config = JFactory::getConfig();
$debug  = (boolean) $config->get('debug');
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="<?php echo $this->language; ?>" lang="<?php echo $this->language; ?>" dir="<?php echo $this->direction; ?>" >
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<jdoc:include type="head" />
	<script type="text/javascript">
		window.addEvent('domready', function ()
		{
			document.getElementById('form-login').username.select();
			document.getElementById('form-login').username.focus();
		});
	</script>
	<style type="text/css">
		/* Responsive Styles */
		@media (max-width: 480px) {
			.view-login .container {
				margin-top: -170px;
			}
			.btn {
				font-size: 13px;
				padding: 4px 10px 4px;
			}
		}
		<?php if ($debug) : ?>
			.view-login .container {
				position: static;
				margin-top: 20px;
				margin-left: auto;
				margin-right: auto;
			}
			.view-login .navbar-fixed-bottom {
				display: none;
			}
		<?php endif; ?>
		
		/*	template styling */
		.view-login {
	padding-top: 0;
	background-color: <?=$params->get('loginTemplateColor2')?>;
	background-image: -webkit-gradient(radial,center center,0,center center,460,from(<?=$params->get('loginTemplateColor')?>),to(<?=$params->get('loginTemplateColor2')?>));
	background-image: -webkit-radial-gradient(circle,<?=$params->get('loginTemplateColor')?>,<?=$params->get('loginTemplateColor2')?>);
	background-image: -moz-radial-gradient(circle,<?=$params->get('loginTemplateColor')?>,<?=$params->get('loginTemplateColor2')?>);
	background-image: -o-radial-gradient(circle,<?=$params->get('loginTemplateColor')?>,<?=$params->get('loginTemplateColor2')?>);
	background-repeat: no-repeat;
}
		
	</style>
	<!--[if lt IE 9]>
		<script src="../media/jui/js/html5.js"></script>
	<![endif]-->
</head>

<body class="site <?php echo $option . " view-" . $view . " layout-" . $layout . " task-" . $task . " itemid-" . $itemid . " ";?>">
	<!-- <pre style="text-align: left; direction: ltr;">
		<?=print_r($params->get('loginTemplateColor2') , true)?>
	</pre> -->
	
	<!-- Container -->
	<div class="container">
		<div id="content">
			<!-- Begin Content -->
			<div id="element-box" class="login well">
				<img src="<?php echo $logo;?>" alt="Joomla!" />
				<hr />
				<jdoc:include type="message" />
				<jdoc:include type="component" />
			</div>
			<noscript>
				<?php echo JText::_('JGLOBAL_WARNJAVASCRIPT') ?>
			</noscript>
			<!-- End Content -->
		</div>
		<?php if ($this->params->get('loginCustomText')):?>
			<p class="alert alert-info"><?php echo $this->params->get('loginCustomText');?></p>
		<?php endif; ?>
	</div>
	<div class="navbar navbar-fixed-bottom hidden-phone">
		<p class="pull-right">Created by:&nbsp;<a href="http://www.j-guru.com"  target="blank">J-Guru.com</a>,&nbsp;Design:&nbsp;<a href="www.vprdesign.co.il" target="blank">VPR Design</a></p>
		<a class="login-joomla" href="http://www.joomla.org.il" target="_blank" class="hasTooltip" title="<?php echo JHtml::tooltipText('TPL_JISRAEL_ISFREESOFTWARE');?>">Joomla!&#174;</a>
		<a href="<?php echo JUri::root(); ?>" target="_blank" class="pull-left"><i class="icon-share icon-white"></i> <?php echo JText::_('COM_LOGIN_RETURN_TO_SITE_HOME_PAGE') ?></a>
	</div>
	<jdoc:include type="modules" name="debug" style="none" />
</body>
</html>
