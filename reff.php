<?php
function get_name()
{
    $rand_user = file_get_contents("https://api.randomuser.me");
    $rand_name = json_decode($rand_user,true);
    $name_frst = $rand_name["results"][0]["name"]["first"];
    $name_last = $rand_name["results"][0]["name"]["last"];
    $fake_mail = $name_last.$rand_numb."@gmail.com";
    $alphanum  = "0123456789ABCDEFGHIJKLMOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz";
    $temp_name = " ";

    for ($i = 0; $i < 8; $i++) {
        $temp_name .= $alphanum[mt_rand(0, strlen($alphanum) - 1)];
    }

    $rand_numb = rand(0, 99999);
    $req_param = "mac_time=0c9838".$rand_numb."8R&passwordSign=".$temp_name."&fullName=".$name_frst." ".$name_last."&tel=noTel&emailSign=".$fake_mail."&";

    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, "http://easywinmoney.store:80//admin/app/regester.php?value=Adam");
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $req_param);
    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");

    $headers   = array();
    $headers[] = "Content-Type: application/x-www-form-urlencoded; charset=UTF-8";
    $headers[] = "Host: easywinmoney.store";

    curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

    $result = curl_exec($ch);
    return $result;
}

function get_refs($i, $ref_code)
{
    $js_stuff  = json_decode(get_name());
    $wtf_isdis = $js_stuff->_21;
    $req_param = "passwordLogIn=".$temp_name.
                 "&code_share_referal=".$ref_code.
                 "&emailLogIn=".$fake_mail."&";

    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, "http://easywinmoney.store:80//admin/app/send_referal.php?value=Adam");
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $req_param);
    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");

    $headers   = array();
    $headers[] = "Content-Type: application/x-www-form-urlencoded; charset=UTF-8";
    $headers[] = "Host: easywinmoney.store";

    curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

    $result = curl_exec($ch);
    return $result;
}

print "Bot Reff - East win money\n\n";
print "Thanks To : Thanks to : Muhammad Ikhsan Aprilyadi\n\n";
echo  "Reff : ";

$ref_code = trim(fgets(STDIN));

for ($i = 0; $i < 200; $i++) {
    $ref_stuff = get_refs($i,$ref_code);
    echo " ".$ref_stuff."\n\n";
}
?>
