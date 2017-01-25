<?php

define("FILE", "../private/passwd");

if (isset($_POST['submit'])
    && ($_POST['submit'] == 'OK')
    && isset($_POST['login'])
    && $_POST['login'] != ""
    && isset($_POST['oldpw'])
    && $_POST['oldpw'] != ""
    && isset($_POST['newpw'])
    && $_POST['newpw'] != ""
) {
    $oldpw = hash("sha256", $_POST['oldpw']);
    $newpw = hash("sha256", $_POST['newpw']);
    if (file_exists(FILE))
    {
        $f = file_get_contents(FILE);
        $a = unserialize($f);
        foreach ($a as $log => $pwd)
        {
            if ($log == $_POST['login'] && $oldpw == $pwd){
                $a[$log] = $newpw;
                $a = serialize($a);
                file_put_contents(FILE, $f);
                break ;
            }
        }
        echo "OK\n";
    }
    else {
        mkdir("../private");
    }

}
else {
    echo "ERROR\n";
}