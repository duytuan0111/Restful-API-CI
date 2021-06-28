<?php defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Welcome to CodeIgniter</title>
	<style type="text/css">
	#container {
		text-align: center;
	}
	</style>
</head>
<body>
<div id="container">
	<h1>Mr Tuan Test CodeIgniter API Library V.1.1.7</h1>
<!-- 	<p class="footer">Page rendered in <strong>{elapsed_time}</strong> seconds. <?php echo  (ENVIRONMENT === 'development') ?  'CodeIgniter Version <strong>' . CI_VERSION . '</strong>' : '' ?></p> -->
</div>
<hr>
<br><br>
<hr><h2>API Routes</h2>
<ul>
	<li><?php echo base_url(); ?>api/user/demo</li>
	<li><?php echo base_url(); ?>api/user/login</li>
	<li><?php echo base_url(); ?>api/user/view</li>
</ul>
</body>
</html>