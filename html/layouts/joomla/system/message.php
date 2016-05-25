<?php
defined('_JEXEC') or die;
$msgList = $displayData['msgList'];
$alert = array('error' => 'error', 'warning' => 'warning', 'notice' => 'information', 'message' => 'success');
?>
<script type="text/javascript">
    jQuery(function () {
        <?php
        if (is_array($msgList) && !empty($msgList)) :
        foreach ($msgList as $type => $msgs) :
        $messages = "";
        foreach ($msgs as $msg) :
            $messages .= $msg."<br />";
        endforeach;
        $messages = str_replace("\n","",$messages);
        ?>
        noty({layout:'center',type: '<?php echo $alert[$type]; ?>', theme: 'relax', text: '<?php echo $messages; ?>',timeout:false});
        <?php endforeach; ?>
        <?php endif; ?>
    })
</script>