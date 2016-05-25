<?php
/**
 * @package     Joomla.Site
 * @subpackage  com_search
 *
 * @copyright   Copyright (C) 2005 - 2012 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('_JEXEC') or die;

$lang = JFactory::getLanguage();
$upper_limit = $lang->getUpperLimitSearchWord();
?>

<form id="searchForm" action="<?php echo JRoute::_('index.php?option=com_search'); ?>" method="post">
    <div class="input-group">
        <input type="text" class="form-control" name="searchword" placeholder="<?php echo JText::_('COM_SEARCH_SEARCH_KEYWORD'); ?>" maxlength="<?php echo $upper_limit; ?>" value="<?php echo $this->escape($this->origkeyword); ?>">
        <span class="input-group-btn">
            <button class="btn btn-primary" type="submit" title="<?php echo ($this->origkeyword == "") ? JText::_('COM_SEARCH_SEARCH') : JText::_('COM_SEARCH_SEARCH_AGAIN'); ?>">
                <i class="fa fa-search"></i>
            </button>
        </span>
    </div>
    <input type="hidden" name="task" value="search"/>
    <div class="searchintro<?php echo $this->params->get('pageclass_sfx'); ?>">
        <?php if (!empty($this->searchword)): ?>
            <?php echo JText::sprintf('COM_SEARCH_SEARCH_KEYWORD_N_RESULTS', $this->total); ?>
        <?php endif; ?>
    </div>
    <div class="m-t-1 font-weight-bold"><?php echo JText::_('COM_SEARCH_FOR'); ?></div>
    <label class="c-input c-radio">
        <input type="radio" name="searchphrase" value="all" <?php if ($this->searchphrase == 'all') : ?>checked<?php endif; ?>>
        <span class="c-indicator"></span>
        <?php echo JText::_('COM_SEARCH_ALL_WORDS'); ?>
    </label> <label class="c-input c-radio">
        <input type="radio" name="searchphrase" value="any" <?php if ($this->searchphrase == 'any') : ?>checked<?php endif; ?>>
        <span class="c-indicator"></span>
        <?php echo JText::_('COM_SEARCH_ANY_WORDS'); ?>
    </label> <label class="c-input c-radio">
        <input type="radio" name="searchphrase" value="exact" <?php if ($this->searchphrase == 'exact') : ?>checked<?php endif; ?>>
        <span class="c-indicator"></span>
        <?php echo JText::_('COM_SEARCH_EXACT_PHRASE'); ?>
    </label>
    <div class="font-weight-bold m-t-2">
        <?php echo JText::_('COM_SEARCH_ORDERING'); ?>
    </div>
    <select class="c-select col-xs-6">
        <option value="newest" <?php if ($this->ordering == 'newest') : ?>selected<?php endif; ?>><?php echo JText::_('COM_SEARCH_NEWEST_FIRST'); ?></option>
        <option value="oldest" <?php if ($this->ordering == 'oldest') : ?>selected<?php endif; ?>><?php echo JText::_('COM_SEARCH_OLDEST_FIRST'); ?></option>
        <option value="popular" <?php if ($this->ordering == 'popular') : ?>selected<?php endif; ?>><?php echo JText::_('COM_SEARCH_MOST_POPULAR'); ?></option>
        <option value="alpha" <?php if ($this->ordering == 'alpha') : ?>selected<?php endif; ?>><?php echo JText::_('COM_SEARCH_ALPHABETICAL'); ?></option>
        <option value="category" <?php if ($this->ordering == 'category') : ?>selected<?php endif; ?>><?php echo JText::_('JCATEGORY'); ?></option>
    </select>
    <div class="clearfix"></div>
    <?php if ($this->params->get('search_areas', 1)) : ?>
        <div class="font-weight-bold m-t-2"><?php echo JText::_('COM_SEARCH_SEARCH_ONLY'); ?></div>
        <div>
            <?php foreach ($this->searchareas['search'] as $val => $txt) :
                $checked = is_array($this->searchareas['active']) && in_array($val, $this->searchareas['active']) ? 'checked="checked"' : '';
                ?>
                <label class="c-input c-checkbox">
                    <input type="checkbox" name="areas[]" value="<?php echo $val; ?>" <?php echo $checked; ?> >
                    <span class="c-indicator"></span>
                    <?php echo JText::_($txt); ?>
                </label>
            <?php endforeach; ?>
        </div>
    <?php endif; ?>

    <?php if ($this->total > 0) : ?>
        <div class="pull-xs-right">
            <?php echo JText::_('JGLOBAL_DISPLAY_NUM'); ?>
            <select name="limit" class="c-select col-xs-6" onchange="this.form.submit()">
                <?php for ($i = 5; $i <= 30; $i += 5) : ?>
                    <option value="<?php echo $i; ?>" <?php if ($this->pagination->limit == $i) echo "selected"; ?>><?php echo $i; ?></option>
                <?php endfor; ?>
                <option value="50" <?php if ($this->pagination->limit == 50) echo "selected"; ?>><?php echo JText::_('J50'); ?></option>
                <option value="100" <?php if ($this->pagination->limit == 100) echo "selected"; ?>><?php echo JText::_('J100'); ?></option>
                <option value="0" <?php if ($this->pagination->limit == $this->total) echo "selected"; ?>><?php echo JText::_('JALL'); ?></option>
            </select>
        </div>
    <?php endif; ?>
</form>
