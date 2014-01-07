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
$user = JFactory::getUser();
?>
<div class="row-fluid">
	<?php $iconmodules = JModuleHelper::getModules('sidebar');
	if ($iconmodules) : ?>
		<div class="span3 blue-sidebar">
			<div class="cpanel-links">
				

		<div class="well well-small visible-desktop">
			<h2 class="module-title nav-header">מערכת ניהול אתר</h2>
			<div class="row-fluid">
				<div class="span12">
					<a class="brand text-left" href="<?php echo JUri::root(); ?>" title="<?php echo JText::sprintf('TPL_JISRAEL_PREVIEW', $app->getCfg('sitename')); ?>" target="_blank">
					<?php echo JHtml::_('string.truncate', $app->getCfg('sitename'), 14, false, false); ?>
						<span class="icon-out-2 small"></span>
					</a>
				</div>
			</div>
		</div>
					

				
				<?php
				// Display the submenu position modules
				foreach ($iconmodules as $iconmodule)
				{
					echo JModuleHelper::renderModule($iconmodule ,array('style'=>'well'));
				}
				?>
			</div>
		</div>
	<?php endif; ?>
	<div class="span<?php echo ($iconmodules) ? 9 : 12; ?>">
		<?php if ($user->authorise('core.manage', 'com_postinstall')) : ?>
			<div class="row-fluid">
				<?php if ($this->postinstall_message_count): ?>
					<div class="alert alert-info">
					<h4>
						<?php echo JText::_('COM_CPANEL_MESSAGES_TITLE'); ?>
					</h4>
					<p>
						<?php echo JText::_('COM_CPANEL_MESSAGES_BODY_NOCLOSE'); ?>
					</p>
					<p>
						<?php echo JText::_('COM_CPANEL_MESSAGES_BODYMORE_NOCLOSE'); ?>
					</p>
					<p>
						<a href="index.php?option=com_postinstall&eid=700" class="btn btn-primary">
						<?php echo JText::_('COM_CPANEL_MESSAGES_REVIEW'); ?>
						</a>
					</p>
					</div>
				<?php endif; ?>
			</div>
		<?php endif; ?>
		<div class="row-fluid">
			<?php
			$spans = 0;

			foreach ($this->modules as $module)
			{
				// Get module parameters
				$params = new JRegistry;
				$params->loadString($module->params);
				$bootstrapSize = $params->get('bootstrap_size');
				if (!$bootstrapSize)
				{
					$bootstrapSize = 12;
				}
				$spans += $bootstrapSize;
				if ($spans > 12)
				{
					echo '</div><div class="row-fluid">';
					$spans = $bootstrapSize;
				}
				//echo JModuleHelper::renderModule($module, array('style' => 'well'));
				echo JModuleHelper::renderModule($module);
			}
			?>
		</div>
	</div>
</div>
