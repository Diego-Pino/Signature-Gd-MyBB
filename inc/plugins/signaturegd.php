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

// Definimos MyBB
// Disallow direct access to this file for security reasons
if(!defined("IN_MYBB"))
{
	die("Direct initialization of this file is not allowed.<br /><br />Please make sure IN_MYBB is defined.");
}

// Hooks
$plugins->add_hook('global_start', 'signaturegd_global_start');

// Information del Plugin
function signaturegd_info()
{
return array(
        "name"  => "Signature GD [Graphics Draw]",
        "description"=> "Signature GD Library: Dynamic Creation of Images Graphics Draw with Stats Forum software MyBB",
        "website"        => "http://diegopino.besaba.com/we11world/",
        "author"        => "DiegoPino",
        "authorsite"    => "http://diegopino.blogspot.com",
        "version"        => "1.0",
        "guid"             => "DiegoPino",
        "compatibility" => "18*"
    );
}

// Activate
function signaturegd_activate() {
global $db;

$signaturegd_group = array(
        'gid'    => 'NULL',
        'name'  => 'SignatureGD',
        'title'      => 'Signature GD [Graphics Draw]',
        'description'    => 'Signature GD Library: Dynamic Creation of Images Graphics Draw with Stats Forum software MyBB',
        'disporder'    => "1",
        'isdefault'  => "0",
    );

 
 $db->insert_query('settinggroups', $signaturegd_group);
 $gid = $db->insert_id();

$signaturegd_setting = array(
        'sid'            => 'NULL',
        'name'        => 'signaturegd_enable',
        'title'            => 'Do you want to enable SignatureGD?',
        'description'    => 'If you set this option to yes, this plugin be active on your board.',
        'optionscode'    => 'yesno',
        'value'        => '1',
        'disporder'        => 1,
        'gid'            => intval($gid),
    );
 $db->insert_query('settings', $signaturegd_setting);
  rebuild_settings();
}

// Deactivate
function signaturegd_deactivate()
  {
  global $db;
 $db->query("DELETE FROM ".TABLE_PREFIX."settings WHERE name IN ('signaturegd_enable')");
 $db->query("DELETE FROM ".TABLE_PREFIX."settinggroups WHERE name='signaturegd'");

rebuild_settings();
 }

function signaturegd_global_start(){
global $mybb;

if ($mybb->settings['signaturegd_enable'] == 1){

 //echo "<a href='signaturegd.php'>signaturegd PAGINAAAA</a>";

}
} 


?>
