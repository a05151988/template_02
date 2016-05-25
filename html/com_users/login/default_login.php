<?php
defined('_JEXEC') or die;
JHtml::_('behavior.keepalive');
$templateParams = JFactory::getApplication()->getTemplate(true)->params;
?>
<div class="page-header">
    <h1><?php echo $this->escape($this->params->get('page_heading')); ?></h1>
</div>
<div class="panel panel-default">
    <form action="<?php echo JRoute::_('index.php?option=com_users&task=user.login'); ?>" method="post" class="form-horizontal">
        <div class="panel-body">
            <div class="input-group">
                <span class="input-group-addon" id="login-username"><?php echo JText::_('JGLOBAL_USERNAME'); ?></span>
                <input name="username" type="text" class="form-control" placeholder="<?php echo JText::_('JGLOBAL_USERNAME'); ?>" aria-describedby="login-username">
                <span class="input-group-btn">
                    <a class="btn btn-secondary" href="index.php/component/users/?view=remind" title="<?php echo JText::_('COM_USERS_LOGIN_REMIND'); ?>" aria-label="<?php echo JText::_('COM_USERS_LOGIN_REMIND'); ?>"><i class="fa fa-fw fa-question"></i></a>
                </span>
            </div>
            <br/>
            <div class="input-group">
                <span class="input-group-addon" id="login-password"><?php echo JText::_('JGLOBAL_PASSWORD'); ?></span>
                <input name="password" type="password" class="form-control" placeholder="<?php echo JText::_('JGLOBAL_PASSWORD'); ?>" aria-describedby="login-password">
                <span class="input-group-btn">
                    <a class="btn btn-secondary" href="index.php/component/users/?view=reset" title="<?php echo JText::_('COM_USERS_LOGIN_RESET'); ?>" aria-label="<?php echo JText::_('COM_USERS_LOGIN_RESET'); ?>"><i class="fa fa-fw fa-question"></i></a>
                </span>
            </div>
            <br/>
            <?php if (JPluginHelper::isEnabled('system', 'remember')) : ?>
                <label>
                    <input type="checkbox" name="remember" value="yes">&nbsp;<?php echo JText::_('COM_USERS_LOGIN_REMEMBER_ME') ?>
                </label>
            <?php endif; ?>
        </div>
        <div class="panel-footer">
            <button type="submit" class="btn btn-primary pull-xs-right"><?php echo JText::_('JLOGIN'); ?></button>
            <div class="clearfix"></div>
        </div>
        <input type="hidden" name="return" value="<?php echo base64_encode($this->params->get('login_redirect_url', $this->form->getValue('return'))); ?>"/>
        <?php echo JHtml::_('form.token'); ?>
    </form>
</div>
<!--
<div class="login <?php echo $this->pageclass_sfx ?>">
    <?php if ($this->params->get('show_page_heading')) : ?>
        <div class="page-header">
            <h1>
                <?php echo $this->escape($this->params->get('page_heading')); ?>
            </h1>
        </div>
    <?php endif; ?>

    <?php if (($this->params->get('logindescription_show') == 1 && str_replace(' ', '', $this->params->get('login_description')) != '') || $this->params->get('login_image') != '') : ?>
    <div class="login-description">
        <?php endif; ?>

        <?php if ($this->params->get('logindescription_show') == 1) : ?>
            <?php echo $this->params->get('login_description'); ?>
        <?php endif; ?>

        <?php if (($this->params->get('login_image') != '')) : ?>
            <img src="<?php echo $this->escape($this->params->get('login_image')); ?>" class="login-image" alt="<?php echo JTEXT::_('COM_USER_LOGIN_IMAGE_ALT') ?>"/>
        <?php endif; ?>

        <?php if (($this->params->get('logindescription_show') == 1 && str_replace(' ', '', $this->params->get('login_description')) != '') || $this->params->get('login_image') != '') : ?>
    </div>
<?php endif; ?>

    <form action="<?php echo JRoute::_('index.php?option=com_users&task=user.login'); ?>" method="post" class="form-horizontal">


        <fieldset class="well">
            <?php if ($templateParams->get('usernameless_login', 0) && isset($_COOKIE['gkusernameless'])) : ?>
                <?php
    $cookie_content = JFilterInput::clean($_COOKIE['gkusernameless'], 'USERNAME');
    $userData = explode(',', $cookie_content);
    ?>
                <div id="gkuserless" data-username="<?php echo $userData[2]; ?>">
                    <img src="http://www.gravatar.com/avatar/<?php echo $userData[0]; ?>?s=64" alt="<?php echo $userData[1]; ?>"/>
                    <h3>Login as:</h3>
                    <p><strong><?php echo $userData[1]; ?></strong> (<?php echo $userData[2]; ?>)</p>
                    <a href="#not" id="gkwronguserless">Not <strong><?php echo $userData[1]; ?></strong>? Click to input
                        your username &raquo;</a>
                </div>
            <?php endif; ?>

            <?php foreach ($this->form->getFieldset('credentials') as $field): ?>
                <?php if (!$field->hidden): ?>
                    <div class="control-group">
                        <div class="control-label">
                            <?php echo $field->label; ?>
                        </div>
                        <div class="controls">
                            <?php echo $field->input; ?>
                        </div>
                    </div>
                <?php endif; ?>
            <?php endforeach; ?>
            <?php if (property_exists($this, 'tfa')): ?>
                <div class="control-group">
					<div class="control-label">
						<?php echo $this->form->getField('secretkey')->label; ?>
					</div>
					<div class="controls">
						<?php echo $this->form->getField('secretkey')->input; ?>
					</div>
				</div>
            <?php endif; ?>

            <?php if (JPluginHelper::isEnabled('system', 'remember')) : ?>
                <div class="control-group">
                    <div class="control-label"><label><?php echo JText::_('COM_USERS_LOGIN_REMEMBER_ME') ?></label>
                    </div>
                    <div class="controls">
                        <input id="remember" type="checkbox" name="remember" class="inputbox" value="yes"/></div>
                </div>
            <?php endif; ?>
            <div class="control-group">
                <div class="controls">
                    <button type="submit" class="btn btn-primary"><?php echo JText::_('JLOGIN'); ?></button>
                    <gavern:fblogin><span id="fb-auth" class="btn"><small>fb icon
                            </small><?php echo JText::_('TPL_GK_LANG_FB_LOGIN_TEXT'); ?></span>
                        <gavern:fblogin>
                </div>
            </div>
            <input type="hidden" name="return" value="<?php echo base64_encode($this->params->get('login_redirect_url', $this->form->getValue('return'))); ?>"/>
            <?php echo JHtml::_('form.token'); ?>
        </fieldset>
    </form>
</div>
<div>
    <ul class="nav nav-pills">
        <li>
            <a href="<?php echo JRoute::_('index.php?option=com_users&view=reset'); ?>">
                <?php echo JText::_('COM_USERS_LOGIN_RESET'); ?></a>
        </li>
        <li>
            <a href="<?php echo JRoute::_('index.php?option=com_users&view=remind'); ?>">
                <?php echo JText::_('COM_USERS_LOGIN_REMIND'); ?></a>
        </li>
        <?php
$usersConfig = JComponentHelper::getParams('com_users');
if ($usersConfig->get('allowUserRegistration')) : ?>
            <li>
                <a href="<?php echo JRoute::_('index.php?option=com_users&view=registration'); ?>">
                    <?php echo JText::_('COM_USERS_LOGIN_REGISTER'); ?></a>
            </li>
        <?php endif; ?>
    </ul>
</div>
-->
