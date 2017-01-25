<?php

define("FILE", "../private/passwd");

if (isset($_POST['submit'])
    && ($_POST['submit'] == 'OK')
    && isset($_POST['login'])
    && $_POST['login'] != ""
    && isset($_POST['passwd'])
    && $_POST['passwd'] != ""
) {
    $a = [];
    if (file_exists(FILE)) {
        $f = file_get_contents(FILE);
        $a = unserialize($f);
        foreach ($a as $log => $pwd)
        {
            if ($log == $_POST['login']){
                echo "ERROR\n";
                return ;
            }
        }
    }
    else {
        mkdir("../private");
    }
    $a[$_POST['login']] = hash("sha256", $_POST['passwd']);
    $f = serialize($a);
    file_put_contents(FILE, $f);
    echo "OK\n";
}
else {
    echo "ERROR\n";
}