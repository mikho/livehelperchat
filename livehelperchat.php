<?php

use WHMCS\Database\Capsule;

/*
 * *********************************************
 * ** LiveHelperChat Addon Module ***

 If you don't have one, please register here
 https://livehelperchat.com/order/now

 More About livehelperchat
 https://livehelperchat.com/

 More About livehelperchat addon for WHMCS
 http://nerijuso.lt/livehelperchat-com-addon-for-whmcs/

 License
 Licensed under the Apache License, Version 2.0. More about this license you can read here http://www.apache.org/licenses/LICENSE-2.0

 * *********************************************
 */


if (!defined("WHMCS"))
    die("This file cannot be accessed directly");

function livehelperchat_config() {
    $configarray = array(
        "name" => "Live Helper Chat",
        "description" => "This is chat module that using Live Helper Chat. Original code by https://github.com/nerijuso/livehelperchat. Updated by me, mikho.",
        "version" => "2.0",
        "author" => "mikho",
        "language" => "english",
        "fields" => array(
        	"enabled"=> array("widgetCode" => "Enable", "Type" => "yesno",  "Description" => "Enable Live Helper Chat widget", "Default" => "",),
        	"show_for_logged"=> array("widgetCode" => "Show for logged only", "Type" => "yesno",  "Description" => "Show Live Helper Chat widget only for logged user", "Default" => "",),
          "widget_height" => array("widgetCode" => "Widget height", "Type" => "text",  "Description" => "Widget height", "Default" => "340",),
        	"widget_width" => array("widgetCode" => "Widget width", "Type" => "text",  "Description" => "Widget width", "Default" => "300",),
        	"popup_height" => array("widgetCode" => "Widget popup height", "Type" => "text",  "Description" => "Widget popup height", "Default" => "500",),
        	"popup_width" => array("widgetCode" => "Widget popup width", "Type" => "text",  "Description" => "Widget popup width", "Default" => "520",),
        	"widget_domain" => array("widgetCode" => "Domain", "Type" => "text",  "Description" => "Live helper chat domain", "Default" => "//demo.livehelperchat.com",),
          "widget_department" => array("widgetCode" => "Departments", "Type" => "text",  "Description" => "Departments (Only numbers separated by /. Ex: 2/3)", "Default" => "",),
          "widget_click" => array("widgetCode" => "On a mouse click show the page widget", "Type" => "yesno",  "Description" => "On a mouse click show the page widget", "Default" => "",),
        	"operator_messages" => array("widgetCode" => "Operator messages", "Type" => "yesno",  "Description" => "Automatically check for messages from the operator/invitation messages ", "Default" => "",),
        	"disable_pro_active" => array("widgetCode" => "Disable pro active invitations, usefull if you want disable them from site part.", "Type" => "yesno",  "Description" => "Disable pro active invitations, usefull if you want disable them from site part.", "Default" => "",),
        	"noresponse" => array("widgetCode" => "Disable responsive layout for status widget.", "Type" => "yesno",  "Description" => "Disable responsive layout for status widget", "Default" => "",),
        	"hide_offline" => array("widgetCode" => "Hide status when offline", "Type" => "yesno",  "Description" => "Hide status when offline", "Default" => "",),
        	"leaveamessage" => array("widgetCode" => "Show a leave a message form when there are no online operators", "Type" => "yesno",  "Description" => "Show a leave a message form when there are no online operators", "Default" => "",),
        	"position" => array("widgetCode" => "Position", "Type" => "dropdown",  "Description" => "Position", "Default" => "",
        	"Options" =>"Bottom right corner of the screen,Bottom left corner of the screen,Middle right side of the screen,Middle left side of the screen",),
        	"pos_top" => array("widgetCode" => "Position top", "Type" => "text",  "Description" => "Position from the top, only used if the Middle left or the Middle right side is chosen", "Default" => "300",),
        	"unit" => array("widgetCode" => "Position from top unit", "Type" => "dropdown", "Options" =>"pixels,percents", "Description" => "Position from top unit", "Default" => "0",),
            ));
    return $configarray;
}

function livehelperchat_activate() {

    # Return Result
    return array('status' => 'success', 'description' => 'Welcome to Live Helper Chat!');
}

function livehelperchat_deactivate() {

    # Return Result
    return array('status' => 'success', 'description' => 'Thanks for using Live Helper Chat');
}

function livehelperchat_upgrade($vars) {

    $version = $vars['version'];
}

function livehelperchat_output($vars) {

 	$modulelink = $vars['modulelink'];
    $LANG = $vars['_lang'];

    // $q = @mysql_query("SELECT * FROM tbladdonmodules WHERE module = 'livehelperchat'");
    $q = Capsule::table('tbladdonmodules')
        ->select('*')
        ->where('module', '=', 'livehelperchat')
        ->get();

        foreach ($q as $key) {
      	      $settings[$key->setting] = $key->value;
      	}
    /*
    while ($arr = mysql_fetch_array($q)) {
        $settings[$arr['setting']] = $arr['value'];
    }
    */

    echo '<p>This addon helps integrate <a href="http://livehelperchat.com/" target="_blank">http://livehelperchat.com/</a> to whmcs system. Thank you for using it.</p>';
    echo '<p>Addon displays user profile in chat window on your live helper chat system. Original code by nerijus.oftas@gmail.com</p>
    <p>Code updated by <a href="https://github.com/mikho/livehelperchat" target="_blank">mikho.</a></p>
      <p>Please donate for this addon development.
      <form action="https://www.paypal.com/cgi-bin/webscr" method="post" target="_top">
      <input type="hidden" name="cmd" value="_s-xclick">
      <input type="hidden" name="hosted_button_id" value="F9K2EPNL4XAP8">
      <input type="image" src="https://www.paypalobjects.com/en_US/SE/i/btn/btn_donateCC_LG.gif" border="0" name="submit" alt="PayPal - The safer, easier way to pay online!">
      <img alt="" border="0" src="https://www.paypalobjects.com/en_US/i/scr/pixel.gif" width="1" height="1">
      </form>


</form>
</p>';
}
?>
