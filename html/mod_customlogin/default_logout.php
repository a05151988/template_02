<?php
defined('_JEXEC') or die;
JHtml::_('behavior.keepalive');
?>
<script type="text/javascript">
    jQuery(function(){
        jQuery('#logoutForm div.logout-btn').click(function(){
            jQuery('#logoutForm').submit();
        })
    })
</script>
<form action="<?php echo JRoute::_(JUri::current(), true, $params->get('usesecure')); ?>" method="post" id="logoutForm" class="form-vertical">
    <ul class="nav navbar-nav pull-xs-right">
        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
                <?php if ($params->get('name') == 0) : {
                    echo htmlspecialchars($user->get('name'));
                } else : {
                    echo htmlspecialchars($user->get('username'));
                } endif; ?>
            </a>
            <div class="dropdown-menu dropdown-menu-right">
                <div class="dropdown-item"><a class="nav-link" href="#">上次登入日期</a></div>
                <div class="dropdown-divider"></div>
                <div class="dropdown-item logout-btn"><a class="nav-link" role="button"><?php echo JText::_('JLOGOUT'); ?></a></div>
            </div>
        </li>
    </ul>
    <input type="hidden" name="option" value="com_users"/>
    <input type="hidden" name="task" value="user.logout"/>
    <input type="hidden" name="return" value="<?php echo $return; ?>"/>
    <?php echo JHtml::_('form.token'); ?>
</form>