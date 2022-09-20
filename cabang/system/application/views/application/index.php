<?php
$this->load->view("header");
?>
    <h2><?= $title;?></h2>
    <form id="function_search_form" method="post" action="<?= site_url('application/search');?>">
	<div>
        <label for="function_name">Search by function name </label>
        <input type="text" name="function_name" id="function_name" />
		<input type="submit" value="search" id="search_button" />
		<div id="autocomplete_choices" class="autocomplete"></div>
	</div>
    </form>
    <div id="function_description" style="display:none;">
	<p>Enter your function above</p>
	</div>
    <hr />
    <h3>Goals</h3>
    <p>What you see above is the final product of a <?= anchor ('video', 'video tutorial');?> on building an application using <a href="http://www.codeigniter.com">Code Igniter</a>. The entire application took me about 20 mintues to build - but don't take my word for it, <a href="video">watch it geting constructed</a> for yourself.</p>
    <p>This application builds on <a href="http://codeigniter.com/tutorials/">earlier tutorials</a>, and in addition to standard considerations, incorporates the following concepts:</p>
    <ul>
      <li>Templating</li>
      <li>Models</li>
      <li>View and controller organization </li>
      <li>Unobtrusive javascript enhancements</li>
      <li>Scriptaculous effects and autocomplete </li>
      <li><acronym title="Asynchornous Javascript And XML">AJAX</acronym> and dynamic information retrieval </li>
      <li>Caching pages for performance</li>
    </ul>
    <p> The full code for the application is available from the <a href="downloads">downloads</a> area.</p>
    <p>This application and video tutorial are not affiliated with Code Igniter. I built it simply as a way to help expand interest in Code Igniter, and experiment a little bit with screen casting.</p>

	<h3>Screenshots</h3>
    <p>
	<img src="<?= base_url();?>img/model.png" alt="application model" width="300" height="225" />
	<img src="<?= base_url();?>img/video_screenshot.png" alt="videocast screenshot" width="300" height="225" />
	</p>

