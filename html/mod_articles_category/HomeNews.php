<?php
/**
 * @package     Joomla.Site
 * @subpackage  mod_articles_category
 *
 * @copyright   Copyright (C) 2005 - 2015 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('_JEXEC') or die;
jimport('mylib/date');
if($module->id == 105){
    $iconClass = "fa fa-star";
    $href = "index.php/events";
}else{
    $iconClass = "fa fa-fire";
    $href = "index.php/hot-news";
}
?>
<div class="table-responsive newsTable">
    <table class="table">
        <thead>
        <tr>
            <th colspan="2" class="animated rubberBand">
                <i class="<?php echo $iconClass; ?>"></i>&nbsp;<?php echo $module->title; ?>
                <a href="<?php echo $href; ?>" title="<?php echo JText::_('JARTICLES_CATEGORY_MORE'); ?>"><span class="label label-pill label-danger"><?php echo JText::_('JARTICLES_CATEGORY_MORE'); ?></span></a>
            </th>
        </tr>
        </thead>
        <tbody>
        <?php foreach ($list as $item) : ?>
            <?php $diffDate = JMyDate::relative($item->displayDate, "day"); ?>
            <tr>
                <td style="width:125px;"><?php echo $item->displayDate; ?></td>
                <td>
                    <a href="<?php echo $item->link; ?>" aria-label="<?php echo $item->title; ?>" title="<?php echo $item->title; ?>">
                        <?php echo $item->title; ?>
                    </a>
                    <?php if ($diffDate <= 7) : ?>
                        <span class="label label-danger pull-xs-right animated bounceIn">Hot</span>
                    <?php elseif ($diffDate <= 30) : ?>
                        <span class="label label-primary pull-xs-right animated bounceIn">New</span>
                    <?php endif; ?>
                </td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
</div>