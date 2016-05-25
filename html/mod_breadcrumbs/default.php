<?php
defined('_JEXEC') or die;
?>
<ol class="breadcrumb <?php echo $moduleclass_sfx; ?> breadcrumb-arrow">
    <?php for ($i = 0; $i < $count; $i++) :
        if ($i == 0)
            echo '<li class="active"><i class="fa fa-home fa-fw" title="' . JText::_('MOD_BREADCRUMBS_HERE') . '"></i>&nbsp;<a href="' . $list[$i]->link . '">首頁</a></li>';
        else {
            // Workaround for duplicate Home when using multilanguage
            if ($i == 1 && !empty($list[$i]->link) && !empty($list[$i - 1]->link) && $list[$i]->link == $list[$i - 1]->link) {
                continue;
            }
            // If not the last item in the breadcrumbs add the separator
            $class = "";
            if (($i < $count - 1 && !empty($list[$i]->link)))
                $class = "active";
            echo '<li class="' . $class . '">';
            if ($i < $count - 1) {
                if (!empty($list[$i]->link)) {
                    echo '<a href="' . $list[$i]->link . '">' . $list[$i]->name . '</a>';
                }
            } else {
                echo $list[$i]->name;
            }
            echo '</li>';
        }
    endfor; ?>
</ol>