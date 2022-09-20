<!DOCTYPE HTML PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
        <link rel="shortcut icon" href="<?php echo base_url()?>templates/login/images/fav_icon.png"/>
        <style type="text/css">@import url("<?php echo base_url()?>templates/login/css/reset.css");</style>
        <style type="text/css">@import url("<?php echo base_url()?>templates/login/css/login.css");</style>
        <script type="text/javascript" src="<?php echo base_url()?>/jquery/jquery-1.4.4.js"></script>
        <script type="text/javascript" src="<?php echo base_url()?>/jquery/jquery-ui-1.7.2.custom.min.js"></script>
        <title>Login</title>
    </head><body>
        <div id="login_box">
            <?php
            echo isset ($main)?$main:'';
            ?>
        </div>
    </body></html>