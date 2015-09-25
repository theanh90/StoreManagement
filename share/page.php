<?php

function getCurrentLink(){
    $url = $_SERVER['REQUEST_URI'];
    $pattern = '/.page=\d+/';
    $replacement = '';

    $url_new = preg_replace($pattern, $replacement, $url);

    return $url_new;
}


function pageNavigator($pageHienTai, $totalPage){
    if ($totalPage > 0){
        $link = getCurrentLink();
        $pattern1 = '/\?./';
        if (preg_match($pattern1, $link) == 1){
            $link .= "&page=";
        } else {
            $link .= "?page=";
        }


        echo "<div class='pagging'>";
        echo "&nbsp<a href='$link" . 1 . "'>Đầu </a>&nbsp";
        if ($pageHienTai > 1)
            echo "&nbsp<a href='$link" . ($pageHienTai - 1). "'>  <<  </a>&nbsp";

        for ($i=$pageHienTai - 3 ; $i <= $pageHienTai - 1; $i++){

            if($i >= 1){
                if($i == $pageHienTai - 3 && $i>1){
                    echo "&nbsp<a>  ...  </a>&nbsp";
                }
                echo "&nbsp<a href='$link$i'> $i </a>&nbsp";

            }
        }
        for ($i=$pageHienTai; $i <= $pageHienTai+3; $i++){
            if ($i == $pageHienTai && $i <= $totalPage){
                echo "<strong style='border: 1px solid red'>&nbsp<a href='$link$pageHienTai'> $pageHienTai </a>&nbsp</strong>";
            } elseif($i <= $totalPage){
                echo "&nbsp<a href='$link$i'> $i </a>&nbsp";
            }
            if($i == $pageHienTai + 3 && $i < $totalPage){
                echo "&nbsp<a>  ...  </a>&nbsp";
            }
        }

        if ($pageHienTai < $totalPage)
            echo "&nbsp<a href='$link" . ($pageHienTai + 1). "'>  >>  </a>&nbsp";
        echo "&nbsp<a href='$link" . $totalPage . "'> Cuối</a>&nbsp";
        echo "</div>";

        echo "<div class='clear'></div>";

        echo "<div style='text-align: right; '; >";
        echo "<span style='color: #374e0c; '>Nhảy tới trang</span>";
        echo "  <select name='gotoPage' id='gotoPage'>";
        for ($i=1; $i<=$totalPage; $i++){
            echo "<option value='$i' > $i </option>";
        }
        echo "</select>";

        echo "<script>
                    $('#gotoPage').val($pageHienTai);
                    $('#gotoPage').change(function(){
                        document.location='$link' + $('#gotoPage').val();
                    });
              </script>";
        echo "</div>";
    }


}

function selectYearAudit(){
    $from = 2012;
    $now = getdate();
    $to = $now['year'];

    echo "<select name='sl_year' id='sl_year'>";
    for($i=$to; $i >= $from; $i--){
        if ($i == $to)
            echo "<option value='$i' selected='selected'>$i</option>";
        else
            echo "<option value='$i'>$i</option>";
    }
    echo "</select>";
}


?>


<?php
function generatePrintButton(){

    echo " <style >
            .printBtn {
                background:#2e6ab1;
                color:#FFFFFF;
                display:block;
                float:right;
                font-weight:bold;
                margin-right:2px;
                padding:3px 8px;
                cursor: pointer;
            }

            @media print {
                .printDiv {
                    display: none;
                }
            }
        </style>";
    echo "<div class='printDiv'>";
    echo "<div class='printBtn' onclick='window.print();'> Máy In </div>";
    echo "<br> <br>  </div>";
}

?>
