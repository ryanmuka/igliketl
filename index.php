<?php
set_time_limit(0);
include 'download.php';
clear();
echo "
 *  INSTAGRAM LIKE TIMELINE
 *  ReCode CJDW Team
  
    •••••••••••••••••••••••••••••••••••••••••
    
 * Use tools at your own risk.
 * Use this Tool for personal use, not for sale.
 * I am not responsible for your account using this tool.
 * Make sure your account has been verified (Email & Telp).
 
";
$username    = getUsername();
$password    = getPassword();

echo '•••••••••••••••••••••••••••••••••••••••••' . PHP_EOL . PHP_EOL;
$login = login($username, $password);
if ($login['status'] == 'success') {
    echo '[*] Login as ' . $login['username'] . ' Success!' . PHP_EOL;
    $data_login = array(
        'username' => $login['username'],
        'csrftoken' => $login['csrftoken'],
        'sessionid' => $login['sessionid']
    );
    $slee = getComment('[?]  Sleep in Seconds ( RECOMMENDED 4320 ) : ');
    for($i=0;$i<4320;$i++):
        $profile    = getHome($data_login);
        $data_array = json_decode($profile);
        $result     = $data_array->user->edge_web_feed_timeline;
        $jumlah = count($result->edges);
        $hitung = 1;
        echo '[+] Total Postingan '.$jumlah.' '. PHP_EOL;
        foreach ($result->edges as $items) {
            $id       = $items->node->id;
            $username = $items->node->owner->username;
            if(!$items->node->viewer_has_liked):
                $like     = like($id, $data_login);
                if ($like['status'] == 'error') {
                    echo '[+] Username: ' . $username . ' | Media_id: ' . $id . ' | Error Like' . PHP_EOL;
                    logout($data_login);
                    $login = login($username, $password);
                    if ($login['status'] == 'success') {
                        echo '[*] Login as ' . $login['username'] . ' Success!' . PHP_EOL;
                        $data_login = array(
                            'username' => $login['username'],
                            'csrftoken' => $login['csrftoken'],
                            'sessionid' => $login['sessionid']
                        );
                    }else{
                        die("Something went wrong");
                    }
                } else {
                    echo '['.$hitung.'] Username: ' . $username . ' | Media_id: ' . $id . ' | Like Success' . PHP_EOL;
                }
                $hitung = $hitung+1;
            endif;
            sleep(360);
        }
        sleep($slee);
    endfor;
}else{
    echo json_encode($login);
}
