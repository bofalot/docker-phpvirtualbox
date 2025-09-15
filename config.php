<?php
class phpVBoxConfig {

/* Username / Password for system user that runs VirtualBox */
var $username = 'matthew';
var $password = '19windingshott';

/* SOAP URL of vboxwebsrv (not phpVirtualBox's URL) */
var $location = 'http://vbox_websrv:18083/';

var $language = 'en';

/* Set the standard VRDE Port Number / Range, e.g. 1010-1020 or 1027 */
var $vrdeports = '9005-9010';
var $vrdeaddress = '0.0.0.0';


// Max number of progress operations to keep in list
var $maxProgressList = 5;

/*
Allow to prompt deletion hard disk files on removal from Virtual Media Manager.
If this is not set, files are always kept. If this is set, you will be PROMPTED
to decide whether or not you would like to delete the hard disk file(s) when you
remove a hard disk from virtual media manager. You may still choose not to delete
the file when prompted.
*/
var $deleteOnRemove = true;

// Restrict file types
var $browserRestrictFiles = array('.iso','.vdi','.vmdk','.img','.bin','.vhd','.hdd','.ovf','.ova','.xml','.vbox','.cdr','.dmg','.ima','.dsk','.vfd');

// Restrict locations / folders
var $browserRestrictFolders = array('/home/matthew/virtualbox','/usr/lib/virtualbox');

/*
 * Auto-refresh interval in seconds for VirtualBox host memory usage information.
 * Any value below 3 will be ignored.
 */
var $hostMemInfoRefreshInterval = 5;

/* Screen resolutions for console tab */
var $consoleResolutions = array('640x480','800x600','1024x768','1280x720','1440x900');

/* Console tab keyboard layout. Currently Oracle's RDP client only supports EN and DE. */
var $consoleKeyboardLayout = 'EN';

/* Max number of network cards per VM. Do not set above VirtualBox's limit (typically 8) or below 1 */
var $nicMax = 4;
}
