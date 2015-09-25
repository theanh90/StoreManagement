<?php
    // Header for Store page
    function generateHeader($title)
    {
?>
        <!DOCTYPE HTML PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
            "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
        <html xmlns="http://www.w3.org/1999/xhtml">
        <head>
            <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
            <meta http-equiv="X-UA-COMPATIBLE" content="IE=edge">
            <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">

            <title><?php echo $title; ?></title>

            <link rel="stylesheet" type="text/css" href="../../style/Style.css">

            <script type="application/javascript" src="../../js/jquery-2.1.0.min.js"></script>
            <script src="../../js/jquery-ui-1.10.4/js/jquery-ui-1.10.4.js"></script>

            <link href="../../js/bootstrap/css/bootstrap.css" rel="stylesheet">
            <link href="../../js/bootstrap/css/bootstrap-theme.css" rel="stylesheet">
            <script type="application/javascript" src="../../js/bootstrap/js/bootstrap.js"></script>

            <link href="../../js/bootstrap-dialog/css/bootstrap-dialog.css" rel="stylesheet">
            <script type="application/javascript" src="../../js/bootstrap-dialog/js/bootstrap-dialog.js"></script>

            <link rel="stylesheet" href="../../js/jquery-ui-1.10.4/css/ui-lightness/jquery-ui-1.10.4.css" />
            <script src="../../js/searchSelectBox.js"></script>

            <!--for datePicker-->
            <script>
                $(function() {
                    $(".datepicker").datepicker({ dateFormat: "dd-mm-yy",
                        dayNamesMin: ['CN', 'T2', 'T3', 'T4', 'T5', 'T6', 'T7'],
                        monthNames: ['Tháng Một', 'Tháng Hai', 'Tháng Ba', 'Tháng Bốn', 'Tháng Năm', 'Tháng Sáu', 'Tháng Bảy',
                            'Tháng Tám', 'Tháng Chín', 'Tháng Mười', 'Tháng M.Một', 'Tháng M.Hai']
                    }).val()
                });
            </script>



        </head>

        <body>

            <div id="line">
                <marquee behavior="alternate" onmouseover="this.stop()" onmouseout="this.start()" scrollamount="2"><p style="color: #d01107; font-weight: bold;
                font-size: 130%; display: flex">Phát Tài - May Mắn - Thịnh Vượng - Vạn Lộc và Thành Công</p></marquee>
            </div>

            <div id="wrapper">
                <div id="menu">
                    <ul id="menu_ul">
                        <li><a href="../home/index.php" id="menu_home">
                                <img id="home_icon" src="../images/common/home.png" alt="Trang Chủ">
                            </a>
                        </li>

                        <li><a href="../home/index.php?khang" id="menu_khachhang">Khách Hàng</a></li>
                        <li><a href="?ghi" id="menu_ghino">Ghi Nợ</a></li>
                        <li><a href="?thu" id="menu_thutien">Thu Nợ</a></li>
                    </ul>
                </div>


                <?php
                if (isset($_GET['khang']))
                    {
                        echo '<script>
                                document.location = ("../khachhang/khachhang.php");
                            </script>';
                    } elseif (isset($_GET['ghi']))
                        {
                            echo '<script>
                                            document.location = ("../ghino/ghino.php");
                                         </script>';
                        } elseif (isset($_GET['thu']))
                            {
                                echo '<script>
                                        document.location = ("../thuno/thu.php");
                                     </script>';
                            }

                ?>

                <script type="application/javascript">
                    var url=window.location;
                    if (url.toString().indexOf('home') != -1)
                    {
                        $("#menu_home").css("background","#CC1625");
                    } else
                        if (url.toString().indexOf('khachhang') != -1)
                        {
                            $("#menu_khachhang").css("background","#CC1625");
                        } else
                            if (url.toString().indexOf('ghino') != -1)
                            {
                                $("#menu_ghino").css("background","#CC1625");
                            } else
                                if (url.toString().indexOf('thu') != -1)
                                {
                                    $("#menu_thutien").css("background","#CC1625");
                                }

                </script>



<?php
	}

    // Header for Admin page
    function generateAdminHeader($title){
?>
		<!DOCTYPE HTML PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
        "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
        <html xmlns="http://www.w3.org/1999/xhtml">
        <head>
            <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
            <meta http-equiv="X-UA-COMPATIBLE" content="IE=edge">
            <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">

            <title><?php echo $title; ?></title>

            <link rel="stylesheet" type="text/css" href="../../style/Style.css">

            <script type="application/javascript" src="../../js/jquery-2.1.0.min.js"></script>
            <script src="../../js/jquery-ui-1.10.4/js/jquery-ui-1.10.4.js"></script>

            <link href="../../js/bootstrap/css/bootstrap.css" rel="stylesheet">
            <link href="../../js/bootstrap/css/bootstrap-theme.css" rel="stylesheet">
            <script type="application/javascript" src="../../js/bootstrap/js/bootstrap.js"></script>

            <link href="../../js/bootstrap-dialog/css/bootstrap-dialog.css" rel="stylesheet">
            <script type="application/javascript" src="../../js/bootstrap-dialog/js/bootstrap-dialog.js"></script>

            <link rel="stylesheet" href="../../js/jquery-ui-1.10.4/css/ui-lightness/jquery-ui-1.10.4.css" />
            <script src="../../js/searchSelectBox.js"></script>

            <!--for datePicker-->
            <script>
                $(function() {
                    $(".datepicker").datepicker({ dateFormat: "dd-mm-yy",
                        dayNamesMin: ['CN', 'T2', 'T3', 'T4', 'T5', 'T6', 'T7'],
                        monthNames: ['Tháng Một', 'Tháng Hai', 'Tháng Ba', 'Tháng Bốn', 'Tháng Năm', 'Tháng Sáu', 'Tháng Bảy',
                            'Tháng Tám', 'Tháng Chín', 'Tháng Mười', 'Tháng M.Một', 'Tháng M.Hai']
                    }).val()
                });
            </script>



        </head>

        <body>

        <div id="line">
            <marquee behavior="alternate" onmouseover="this.stop()" onmouseout="this.start()" scrollamount="2"><p style="color: #d01107; font-weight: bold;
        font-size: 130%; display: flex">Phát Tài - May Mắn - Thịnh Vượng - Vạn Lộc và Thành Công</p></marquee>
        </div>

        <div id="wrapper">
            <div id="menu">
                <ul id="menu_ul">
                    <li><a href="../home" id="menu_home">
                            <img id="home_icon" src="../../share/images/common/home.png" alt="Trang Chủ">
                        </a>
                    </li>

                    <li><a href="../store" id="menu_store">Cửa hàng</a></li>
                    <li><a href="../product" id="menu_product">Sản phẩm</a></li>
<!--                    <li><a href="?thu" id="menu_thutien">Thu Nợ</a></li>-->
                </ul>
            </div>


<!--            --><?php
//            if (isset($_GET['store']))
//            {
//                echo '<script>
//                        document.location = ("../store");
//                    </script>';
//            }
//			elseif (isset($_GET['ghi']))
//            {
//                echo '<script>
//                                    document.location = ("../ghino/ghino.php");
//                                 </script>';
//            } elseif (isset($_GET['thu']))
//            {
//                echo '<script>
//                                document.location = ("../thuno/thu.php");
//                             </script>';
//            }
//
//            ?>

            <script type="application/javascript">
                var url=window.location;
                if (url.toString().indexOf('home') != -1)
                {
                    $("#menu_home").css("background","#CC1625");
                } else if (url.toString().indexOf('store') != -1)
                {
                    $("#menu_store").css("background","#CC1625");
                }
				else if (url.toString().indexOf('product') != -1)
                {
                    $("#menu_product").css("background","#CC1625");
                }
//				else
//                if (url.toString().indexOf('thu') != -1)
//                {
//                    $("#menu_thutien").css("background","#CC1625");
//                }

            </script>

<?php
    }
?>





