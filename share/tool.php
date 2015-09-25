<?php

function getYear(){
    $now = getdate();
    $year = $now['year'];
    return $year;
}


function getFirstDateOfYear(){
    $now=getdate();
    $year = $now['year'];
    $day = ('01' . '-' . '01' . '-'.  $year);
    echo $day;
}

function getCurDateTime(){
    $now=getdate();
    $mon_valid = $now['mon'];
    $day_valid = $now['mday'];
    if (preg_match("/^\d$/",$mon_valid)){
        $mon_valid = 0 . $mon_valid;
    }
    if (preg_match("/^\d$/",$day_valid)){
        $day_valid = 0 . $day_valid;
    }
    $tex= ($day_valid . '-' . $mon_valid . '-'.  $now['year']);
    echo $tex;
}

function getNowDayofYear($year){
    $now=getdate();
    $mon_valid = $now['mon'];
    $day_valid = $now['mday'];
    if (preg_match("/^\d$/",$mon_valid)){
        $mon_valid = 0 . $mon_valid;
    }
    if (preg_match("/^\d$/",$day_valid)){
        $day_valid = 0 . $day_valid;
    }
    $tex= ($day_valid . '-' . $mon_valid . '-'.  $year);
    return $tex;
}

function changeFormatDate($date){
    if (preg_match("/^\d\d\D/",$date)){
        $new_day=strtotime($date);
        $new_day=date('Y-m-d', $new_day);
    } else{
            $new_day=strtotime($date);
            $new_day=date('d-m-Y', $new_day);
        }
    return $new_day;
}

function getCBDonViTinh($id, $select){
    if ($id == "" && $select == ""){
        $res = "<select id='dvt' class='dvt' name='dvt[]'>" .
                    "<option value=''>Chọn...</option>" .
                    "<option value='Bao'>Bao</option>" .
                    "<option value='Tấn'>Tấn</option>" .
                    "<option value='Thùng'>Thùng</option>" .
                    "<option value='Chai'>Chai</option>" .
                    "<option value='Bịch'>Bịch</option>" .
                "</select>";
        echo $res;
    }else {
        $res = "<select id='dvt" . $id . "' class='dvt' name='dvt[]'>" .
                    "<option value=''>Chọn...</option>" .
                    "<option value='Bao'>Bao</option>" .
                    "<option value='Tấn'>Tấn</option>" .
                    "<option value='Thùng'>Thùng</option>" .
                    "<option value='Chai'>Chai</option>" .
                    "<option value='Bịch'>Bịch</option>" .
            "</select>";
        echo $res;
        $scr = "<script> $('#dvt$id').val('$select'); </script> ";
        echo $scr;
    }

}

function convert_datetotimestamp($str){

    if (preg_match("/^\d\d\D/",$str)){
        list($day, $month, $year) = explode('-', $str);
    } else{
        list($year, $month, $day) = explode('-', $str);
    }

    $timestamp = mktime('00', '00','00', $month, $day, $year);
    
    return $timestamp;
}

function minusBetween2day($day_from, $day_to){

    $from = convert_datetotimestamp($day_from);
    $to = convert_datetotimestamp($day_to);

    $result = ($to - $from)/86400;

    return abs(round($result));

}


?>