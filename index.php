<?php
date_default_timezone_set('Asia/Jakarta');
define("OS", strtolower(PHP_OS));
header('Content-Type: text/html; charset=utf-8');
error_reporting(0);

echo "
Ξ TITLE  : Toolsig PHP Version [Beta Release]
Ξ UPLOAD : c:/users/officialputuid/toolsig-php
Ξ CODEBY : Firdy
Ξ FIXBY	 : Andi Muh. Rizqi [ikiganteng]
Ξ UPDATE : officialputuid [25/01/2020]
Ξ Recode : CJDW Yans [25/01/2020]
•••••••••••••••••••••••••••••••••••••••••
1. FLC Target Followers (fft)
2. Auto Like Timeline (botlike)
3. Unfollow All Following
4. Unfollow Not Followback
•••••••••••••••••••••••••••••••••••••••••
";

echo "[?] Enter Your Choice (1-4): ";

$input=fgets(STDIN);
switch ($input) {
	case 0:
        require('index.php');
        break;
	case 1:
        require('tools/fftauto.php');
        break;
    case 2:
        require('tools/botlike_timeline.php');
        break;
    case 3:
        require('tools/unfollall.php');
        break;
    case 4:
        require('tools/unfollnotfollback.php');
        break;
}
?>