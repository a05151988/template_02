<?php defined('_JEXEC') or die('Restricted access'); ?>
<?php
$config = JFactory::getConfig();
$app = JFactory::getApplication();
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xmlns:jdoc="http://www.w3.org/1999/XSL/Transform" xml:lang="<?php echo $this->language; ?>" lang="<?php echo $this->language; ?>">
<head>
    <jdoc:include type="head"/>
    <link rel="stylesheet" href="<?php echo $this->baseurl ?>/templates/<?php echo $this->template; ?>/css/bootstrap.min.css" type="text/css"/>
    <link rel="stylesheet" href="<?php echo $this->baseurl ?>/templates/<?php echo $this->template; ?>/css/font-awesome.min.css" type="text/css"/>
    <link rel="stylesheet" href="<?php echo $this->baseurl ?>/templates/<?php echo $this->template; ?>/css/animate.css" type="text/css"/>
    <link rel="stylesheet" href="<?php echo $this->baseurl ?>/templates/<?php echo $this->template; ?>/css/nprogress.css" type="text/css"/>
    <link rel="stylesheet" href="<?php echo $this->baseurl ?>/templates/<?php echo $this->template; ?>/css/overwrite.css" type="text/css"/>
    <script type="text/javascript" src="<?php echo $this->baseurl ?>/templates/<?php echo $this->template; ?>/js/jquery-1.12.3.min.js"></script>
    <script type="text/javascript" src="<?php echo $this->baseurl ?>/templates/<?php echo $this->template; ?>/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="<?php echo $this->baseurl ?>/templates/<?php echo $this->template; ?>/js/jquery.noty.packaged.min.js"></script>
    <script type="text/javascript" src="<?php echo $this->baseurl ?>/templates/<?php echo $this->template; ?>/js/loadingoverlay_progress.min.js"></script>
    <script type="text/javascript" src="<?php echo $this->baseurl ?>/templates/<?php echo $this->template; ?>/js/nprogress.js"></script>
    <script type="text/javascript" src="<?php echo $this->baseurl ?>/templates/<?php echo $this->template; ?>/js/template.js"></script>
</head>
<body>
<nav class="navbar navbar-dark bg-primary" id="mainMenu">
    <div class="container-fluid">
        <div class="navbar-header">
            <button class="navbar-toggler hidden-sm-up" type="button" data-toggle="collapse" data-target="#navbar-header" aria-controls="navbar-header" aria-expanded="true">
                ☰
            </button>
        </div>
        <div class="navbar-toggleable-xs collapse in" id="navbar-header">
            <a class="navbar-brand" href="<?php echo $this->baseurl ?>/index.php"><img style="max-height:100%;height:30px;" src="<?php echo $this->baseurl ?>/images/headers/topLogo.png"></a>
            <jdoc:include type="modules" name="menu"/>
            <jdoc:include type="modules" name="login"/>
        </div>
    </div>
</nav>
<?php
$mainBodyLeft = $mainBodyCenter = ($this->countModules('mainbody-right') > 0) ? 5 : 6;
$componentSize = 11;
if ($this->countModules('mainbody-right') > 0)
    $componentSize -= 2;
$isComponent = false;
if ($this->countModules('mainbody-left') == 0 && $this->countModules('mainbody-center') == 0)
    $isComponent = true;
?>
<div class="container-fluid">
    <jdoc:include type="modules" name="mainbody-top"/>
</div>
<div class="container-fluid" id="site_info">
    <div class="row">
        <div class="col-md-5">
            <jdoc:include type="module" name="marquee"/>
            <jdoc:include type="module" name="breadcrumbs"/>
        </div>
        <div class="col-md-7">
            <div class="row">
                <div class="col-md-4">
                    <jdoc:include type="modules" name="counter-today"/>
                </div>
                <div class="col-md-4">
                    <jdoc:include type="modules" name="counter"/>
                </div>
                <div class="col-md-4">
                    <jdoc:include type="modules" name="search"/>
                </div>
            </div>
        </div>
    </div>
</div>
<?php if (count($app->getMessageQueue())) : ?>
    <jdoc:include type="message"/>
<?php endif; ?>
<div class="container-fluid">
    <div class="row">
        <?php if ($this->countModules('mainbody-left') == 0 && $this->countModules('mainbody-center') == 0) : ?>
            <div class="col-md-1"></div>
            <div class="m-t-1 col-md-<?php echo $componentSize; ?>">
                <jdoc:include type="component"/>
            </div>
        <?php endif; ?>
        <?php if ($this->countModules('mainbody-left') > 0) : ?>
            <div class="col-md-<?php echo $mainBodyLeft; ?>">
                <div class="container">
                    <jdoc:include type="modules" name="mainbody-left"/>
                </div>
            </div>
        <?php endif; ?>
        <?php if ($this->countModules('mainbody-center') > 0) : ?>
            <div class="col-md-<?php echo $mainBodyCenter; ?>">
                <div class="container">
                    <jdoc:include type="modules" name="mainbody-center"/>
                </div>
            </div>
        <?php endif; ?>
        <?php if ($this->countModules('mainbody-right') > 0) : ?>
            <div class="col-md-2 <?php if($isComponent == true) : ?>m-t-1<?php endif; ?>">
                <jdoc:include type="modules" name="mainbody-right"/>
            </div>
        <?php endif; ?>
    </div>
</div>
<div class="container-fluid footer">
    <div class="row">
        <div class="col-md-8">
            <jdoc:include type="modules" name="footer-left"/>
        </div>
        <div class="col-md-4">
            <jdoc:include type="modules" name="footer-right"/>
        </div>
    </div>
</div>
</body>
</html>