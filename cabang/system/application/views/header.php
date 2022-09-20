<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title><?= $title;?></title>
<link href="<?= base_url();?>css/ci_functions.css" rel="stylesheet" type="text/css" />
<script type="text/javascript">
//<![CDATA[
base_url = '<?= base_url();?>index.php/';
//]]>
</script>
<script type="text/javascript" src="<?= base_url();?>js/prototype.js"></script>
<script type="text/javascript" src="<?= base_url();?>js/effects.js"></script>
<script type="text/javascript" src="<?= base_url();?>js/controls.js"></script>
<!-- the scriptaculous javascript library is available at http://script.aculo.us/ -->
<?php
if (isset($extraHeadContent)) {
	echo $extraHeadContent;
}
?>
</head>
<body>
<div id="main_holder">
  <h1 id="pageheading">Code Igniter Sample Application</h1>
  <ul id="menu_list">
    <li><?= anchor('application', 'The Application');?></li>
    <li><?= anchor('video', 'Watch the Video');?></li>
    <li><?= anchor('downloads', 'Downloads');?></li>
    <li><?= anchor('about', 'About &amp; FAQ ');?></li>
  </ul>
  <div id="mainbody">