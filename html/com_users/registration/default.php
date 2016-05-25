<?php
/**
 * @package     Joomla.Site
 * @subpackage  com_users
 *
 * @copyright   Copyright (C) 2005 - 2016 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('_JEXEC') or die;

JHtml::_('behavior.keepalive');
//JHtml::_('behavior.formvalidator');
?>
<div class="page-header">
    <h1><?php echo $this->escape($this->params->get('page_heading')); ?></h1>
</div>
<form id="member-registration" action="<?php echo JRoute::_('index.php?option=com_users&task=registration.register'); ?>" method="post" class="form-validate form-horizontal well" enctype="multipart/form-data">
    <div class="panel panel-default registration<?php echo $this->pageclass_sfx ?>">
        <?php // Iterate through the form fieldsets and display each one. ?>
        <?php foreach ($this->form->getFieldsets() as $fieldset): ?>
            <?php $fields = $this->form->getFieldset($fieldset->name); ?>
            <?php if (count($fields)): ?>
                <?php // If the fieldset has a label set, display it as the legend. ?>
                <?php if (isset($fieldset->label)): ?>
                    <div class="panel-heading"><?php echo JText::_($fieldset->label); ?></div>
                <?php endif; ?>
                <?php // Iterate through the fields in the set and display them. ?>
                <div class="panel-body">
                <?php foreach ($fields as $field) : ?>
                    <?php // If the field is hidden, just display the input. ?>
                    <?php if ($field->hidden): ?>
                        <?php echo $field->input; ?>
                    <?php else: ?>
                        <fieldset class="form-group">
                            <div class="control-label">
                                <?php echo $field->label; ?>
                                <?php if (!$field->required && $field->type != 'Spacer') : ?>
                                    <span class="optional"><?php echo JText::_('COM_USERS_OPTIONAL'); ?></span>
                                <?php endif; ?>
                            </div>
                            <div class="controls">
                                <?php echo $field->input; ?>
                            </div>
                        </fieldset>
                    <?php endif; ?>
                <?php endforeach; ?>
                </div>
            <?php endif; ?>
        <?php endforeach; ?>
        <div class="panel-footer">
            <div class="controls">
                <button type="submit" class="btn btn-primary validate"><?php echo JText::_('JREGISTER'); ?></button>
                <a class="btn btn-secondary" href="<?php echo JRoute::_(''); ?>" title="<?php echo JText::_('JCANCEL'); ?>"><?php echo JText::_('JCANCEL'); ?></a>
                <input type="hidden" name="option" value="com_users"/>
                <input type="hidden" name="task" value="registration.register"/>
            </div>
        </div>
        <?php echo JHtml::_('form.token'); ?>
    </div>
</form>

