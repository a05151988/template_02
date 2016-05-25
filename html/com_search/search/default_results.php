<?php
/**
 * @package     Joomla.Site
 * @subpackage  com_search
 *
 * @copyright   Copyright (C) 2005 - 2012 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('_JEXEC') or die;
?>
<table class="m-t-3 table search-results<?php echo $this->pageclass_sfx; ?>">
    <tbody>
    <?php foreach ($this->results as $result) : ?>
        <tr class="table-active">
            <td>
                <span class="label label-primary"><?php echo $this->pagination->limitstart + $result->count; ?></span>
                <?php if ($result->href) : ?>
                    <?php
                    $title = $this->escape($result->title);
                    $title = str_replace($this->escape($this->origkeyword), '<mark>' . $this->escape($this->origkeyword) . '</mark>', $title);
                    ?>
                    <a href="<?php echo JRoute::_($result->href); ?>"<?php if ($result->browsernav == 1) : ?> target="_blank"<?php endif; ?>>
                        <?php echo $title; ?>
                    </a>
                <?php else: ?>
                    <?php echo $title; ?>
                <?php endif; ?>
                <span class="label label-pill label-success pull-xs-right"><?php echo $this->escape($result->section); ?></span>
            </td>
        </tr>
        <tr>
            <td>
                <div class="container-fluid">
                    <div>
                        <?php echo str_replace($this->escape($this->origkeyword), '<mark>' . $this->escape($this->origkeyword) . '</mark>', $result->text); ?>
                    </div>
                    <div>
                        <blockquote class="blockquote blockquote-reverse" style="font-size:12px;">
                            <footer class="blockquote-footer"><?php echo JText::sprintf('JGLOBAL_CREATED_DATE_ON', $result->created); ?></footer>
                        </blockquote>
                    </div>
                </div>
            </td>
        </tr>
    <?php endforeach; ?>
    </tbody>
</table>
<div class="container-fluid center-block text-xs-center">
    <?php echo $this->pagination->getPagesLinks(); ?>
</div>