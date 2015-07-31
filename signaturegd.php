<?php
/**
 ***************************************************************************
 *  Referrer Log plugin (/inc/plugins/Signature-GD.php)
 *  Author Code: DiegoPino, diegopino@gmail.com
 *  Website: http://diegopino.blogspot.com/
 *  License: Creative Commons http://creativecommons.org/licenses/by/4.0/legalcode
 *
 *  Signature GD Library: Dynamic Creation of Images Graphics Draw with Stats Forum software MyBB 
 *  Graphics Draw signaturegd
 *
 ***************************************************************************​/
 */


// Inicio de MyBB Plugin
define("IN_MYBB", 1);
define('THIS_SCRIPT', 'signaturegd.php');

// Only required because we're using misc_help for our page wrapper
require_once "./global.php";

$lang->load("misc");

// Add a breadcrumb
add_breadcrumb('Signature GD', "signaturegd.php");

$template = '

<html>
<head>
<title>Signature GD</title>
{$headerinclude}
</head>
<body>

{$header}

<p><b>Signature GD</b> Library: Dynamic Creation of Images Graphics Draw with Stats Forum software MyBB </p>

<object data="gdsignature/gd.php" height="150" width="450" form="" name="Signature GD"></object>

<p><i>for the next version</i> 
	<ul>
	  	<li>Add Template Select</li>
	  	<li>Add Avatar User</li>
		<li>Performance with more query Stats MyBB</li>
		<li>Performance for users</li>
		<li>URL Performance for Signature</li>
		<li>More Suggest are welcome...</li>
		<li>Enjoy!</li>
	</ul>

</p>

{$footer}
</body>
</html>
';


$template = str_replace("\'", "'", addslashes($template));
eval("\$signaturegd=\"".$template."\";");
output_page($signaturegd);

?>
