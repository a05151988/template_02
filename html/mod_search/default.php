<?php
/**
 * @package     Joomla.Site
 * @subpackage  mod_search
 *
 * @copyright   Copyright (C) 2005 - 2015 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('_JEXEC') or die;

// Including fallback code for the placeholder attribute in the search field.
JHtml::_('jquery.framework');
?>
<div class="search<?php echo $moduleclass_sfx ?>">
    <form class="form-inline" action="<?php echo JRoute::_('index.php'); ?>" method="post">
        <div class="input-group">
            <input type="search" class="form-control" placeholder="Search for..." maxlength="<?php echo $maxlength; ?>">
            <input type="hidden" name="task" value="search"/>
            <input type="hidden" name="option" value="com_search"/>
            <input type="hidden" name="Itemid" value="<?php echo $mitemid; ?>"/>
            <span class="input-group-btn">
                <button class="btn btn-secondary" type="submit">搜尋</button>
            </span>
        </div>
    </form>
</div>