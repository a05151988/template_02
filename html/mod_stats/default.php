<?php
/**
 * @package     Joomla.Site
 * @subpackage  mod_stats
 *
 * @copyright   Copyright (C) 2005 - 2015 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('_JEXEC') or die;
?>
<?php foreach ($list as $item) : ?>
    <i class="fa fa-eye"></i>&nbsp;<?php echo $item->title; ?> <span id="etc_total_count" class="animated"><?php echo $item->data; ?></span> 次
<?php endforeach; ?>

