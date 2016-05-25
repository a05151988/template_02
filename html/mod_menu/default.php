<?php
/**
 * @package     Joomla.Site
 * @subpackage  mod_menu
 *
 * @copyright   Copyright (C) 2005 - 2016 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('_JEXEC') or die;

// Note. It is important to remove spaces between elements.
?>
<?php // The menu class is deprecated. Use nav instead. ?>
<ul class="nav navbar-nav">
    <?php
    foreach ($list as $i => $item) :
        $class = (count($item->tree) > 1) ? "dropdown-item bg-primary" : "nav-item";
        if (($item->id == $active_id) OR ($item->type == 'alias' AND $item->params->get('aliasoptions') == $active_id) OR in_array($item->id, $path)) {
            $class .= " active";
        }
        if ($item->deeper)
            $class .= " dropdown";
        if (count($item->tree) > 1)
            echo '<div class="' . $class . '">';
        else
            echo '<li class="' . $class . '">';
        switch ($item->type) :
            case 'separator':
            case 'url':
            case 'component':
            case 'heading':
                require JModuleHelper::getLayoutPath('mod_menu', 'default_' . $item->type);
                break;
            default:
                require JModuleHelper::getLayoutPath('mod_menu', 'default_url');
                break;
        endswitch;
        if ($item->deeper) {
            echo '<div class="dropdown-menu bg-primary">';
        } elseif ($item->shallower) {
            echo str_repeat('</div></li>', $item->level_diff);
        } else {
            echo (count($item->tree) > 1) ? "</div>" : "</li>";
        }
    endforeach;
    ?>
</ul>