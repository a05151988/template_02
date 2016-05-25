<?php
/**
 * @package     Joomla.Site
 * @subpackage  mod_login
 *
 * @copyright   Copyright (C) 2005 - 2012 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('_JEXEC') or die;
JHtml::_('behavior.keepalive');
JText::script('JGLOBAL_AUTH_EMPTY_PASS_NOT_ALLOWED');
JText::script('JGLOBAL_AUTH_INVALID_PASS');
?>
<script type="text/javascript">
    jQuery(function () {
        jQuery('#loginForm').submit(function () {
            if (jQuery.trim(jQuery('#loginForm input[name=password]').val()) == '') {
                noty({type: 'warning', theme: 'relax', text: Joomla.JText._('JGLOBAL_AUTH_EMPTY_PASS_NOT_ALLOWED')});
            } else {
                jQuery.ajax(
                    {
                        type: "POST",
                        dataType: "json",
                        data: jQuery('#loginForm').serialize(),
                        url: 'index.php',
                        success: function (res) {
                            jQuery("#loginModal .modal-content").LoadingOverlay("hide");
                            if (res == true)
                                location.reload();
                            else if (res == false)
                                noty({
                                    type: 'warning',
                                    theme: 'relax',
                                    text: Joomla.JText._('JGLOBAL_AUTH_INVALID_PASS')
                                });
                            else
                                noty({type: 'error', theme: 'relax', text: res});
                        },
                        beforeSend: function () {
                            jQuery("#loginModal .modal-content").LoadingOverlay("show", {
                                image: "",
                                fontawesome: "fa fa-spinner fa-spin",
                                zIndex: 500
                            });
                        }
                    }
                )
            }
            return false;
        });
    });
</script>
<ul class="nav navbar-nav pull-xs-right">
    <li class="nav-item">
        <a class="nav-link bg-primary" href="#" role="button" data-toggle="modal" data-target="#loginModal"><?php echo JText::_('JACTION_LOGIN_SITE'); ?></a>
    </li>
    <li class="nav-item">
        <a class="nav-link bg-primary" href="index.php/component/users/?view=registration"><?php echo JText::_('JREGISTER'); ?></a>
    </li>
</ul>
<div class="modal fade" id="loginModal" tabindex="-1" role="dialog" aria-labelledby="loginModalTitle" aria-hidden="true" data-backdrop="static">
    <form method="post" id="loginForm" action="index.php">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <h4 class="modal-title" id="loginModalTitle"><?php echo JText::_('JACTION_LOGIN_SITE'); ?></h4>
                </div>
                <div class="modal-body">
                    <div class="container">
                        <div class="input-group">
                            <span class="input-group-addon" id="login-username"><?php echo JText::_('JGLOBAL_USERNAME'); ?></span>
                            <input name="username" type="text" class="form-control" placeholder="<?php echo JText::_('JGLOBAL_USERNAME'); ?>" aria-describedby="login-username">
                            <span class="input-group-btn">
                                <a class="btn btn-secondary" href="index.php/component/users/?view=remind" title="<?php echo JText::_('MOD_CUSTOMLOGIN_FORGOT_USERNAME'); ?>" aria-label="<?php echo JText::_('MOD_CUSTOMLOGIN_FORGOT_USERNAME'); ?>"><i class="fa fa-fw fa-question"></i></a>
                            </span>
                        </div>
                        <br/>
                        <div class="input-group">
                            <span class="input-group-addon" id="login-password"><?php echo JText::_('JGLOBAL_PASSWORD'); ?></span>
                            <input name="password" type="password" class="form-control" placeholder="<?php echo JText::_('JGLOBAL_PASSWORD'); ?>" aria-describedby="login-password">
                            <span class="input-group-btn">
                                <a class="btn btn-secondary" href="index.php/component/users/?view=reset" title="<?php echo JText::_('MOD_CUSTOMLOGIN_FORGOT_PASSWORD'); ?>" aria-label="<?php echo JText::_('MOD_CUSTOMLOGIN_FORGOT_PASSWORD'); ?>"><i class="fa fa-fw fa-question"></i></a>
                            </span>
                        </div>
                        <br/>
                        <?php if (JPluginHelper::isEnabled('system', 'remember')) : ?>
                            <label>
                                <input type="checkbox" name="remember" value="yes"> <?php echo JText::_('MOD_CUSTOMLOGIN_REMEMBER_ME') ?>
                            </label>
                        <?php endif; ?>
                        <input type="hidden" name="option" value="com_ajax"/>
                        <input type="hidden" name="format" value="ajax"/>
                        <input type="hidden" name="module" value="customlogin"/>
                        <input type="hidden" name="method" value="login"/>
                        <?php echo JHtml::_('form.token'); ?>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary"><?php echo JText::_('JLOGIN') ?></button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal"><?php echo JText::_('JDISABLED'); ?></button>
                </div>
            </div>
        </div>
    </form>
</div>