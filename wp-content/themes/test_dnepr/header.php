<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Test Dnepr</title>
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <?php wp_head() ;?>
</head>
<body>
<div class="banner">
    <div class="nav-top navbar navbar-static-top ">
        <div class="container">
            <div class="navbar-header top">
                <a href="/" class="navbar-brand">SLAS<span>H</span></a>
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#responcive-menu">
                    <span class="sr-only">Открыть навигацию</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
            </div>
            <div class="collapse navbar-collapse " id="responcive-menu">
                <ul class="nav navbar-nav navbar-right">
                    <?php wp_nav_menu( array('theme_location' => 'header_menu','items_wrap' => '%3$s'  )); ?>
                </ul>
            </div>
        </div>
    </div>
