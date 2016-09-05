<?php
function xss_protect($string){
    return htmlspecialchars($string, ENT_NOQUOTES, 'UTF-8');
}

function write_data($string, $fileNumber = 1){
    $fp = fopen('data'.((int) $fileNumber).'.dat', "a");
    fwrite($fp, $string.PHP_EOL);
    fclose($fp);
}

function process_formdata(){
    header('X-XSS-Protection: 0');
    $t1 = isset($_GET['text1']) ? xss_protect($_GET['text1']) : '';
    $t2 = isset($_GET['text2']) ? xss_protect($_GET['text2']) : '';
    $t3 = isset($_GET['text3']) ? xss_protect($_GET['text3']) : '';
    $t4 = isset($_GET['text4']) ? xss_protect($_GET['text4']) : '';
    $value = '';
    if(!empty($t4)){
        $value = $t4 . '-asdf-' . $t3;
    }
    if(isset($_GET['radios1'])){
        write_data($_GET['radios1']);
    }
    $danger = !empty($t4) && $t4 != 42;
    return [
        'value' => $value,
        'question' => $t1,
        'answer' => $t2,
        'danger' => $danger,
        'average' => read_data()
    ];
}

function read_data($fileNumber = 1){
    $data = file('data'.((int) $fileNumber).'.dat');
    $sum = 0;
    $count = 0;
    foreach($data as $value){
        $value = trim($value);
        if(!is_numeric($value)){
            echo($value);
        } else {
            $sum += $value;
            $count++;
        }
    }
    return $count > 0 ? $sum / $count : 0;
}