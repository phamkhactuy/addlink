<?php
include('include/admindatabase.php');
$db=new admindatabase();
if(isset($_GET['tp']))
$tp=$_GET['tp'];
else $tp=1;
if(isset($_GET['ts']))
    $ts=$_GET['ts'];
else $ts=1;
if(isset($_REQUEST['themlink']))
{
    $malink=$_REQUEST['malink'];
    $link=$_REQUEST['link'];
    $demo=$db->getTitle($link);
    $c2=$_REQUEST['c2'];
    $db->themlink($malink,$link,$demo,$c2);
    echo "<script>location.href='index.php?tp=".$c2."'</script>"	;
}

?>

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
    "http://www.w3.org/TR/html4/loose.dtd">
<html>

<head>
    <title>add link</title>
    <LINK href="css/stylke.css" rel="stylesheet" type="text/css">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
</head>
<body>


<div id="banner">

</div><!--banner-->

<div id="menu">

</div><!--menu-->

<div id="content">
    <div id="left">
        <?php
        $addlinkc1=$db->addlinkc1();
        while($row=mysql_fetch_array($addlinkc1))
        {
            ?>
            <ul class="danhmuc menux">
                <li class="parent"><?php echo $row['name'];?>
                <ul>
                        <?php
                        $a=$row['id'];
                        $addlinkc2=$db->addlinkc2($a);
                        while($row1=mysql_fetch_array($addlinkc2))
                        {
                            ?>
                            <li>
                                <a href="index.php?tp=<?php echo $row1['id']?>"><?php echo $row1['name']; ?></a>
                            </li>
                            <?php
                        }
                        ?>
                </ul>
                </li>
            </ul>
            <?php
        }
        ?>

    </div>
    <div id="right">
        <div id="themmoi">

        </div>
        <div id="ketqua">

            <?php
            switch($ts)
            {
                //danh muc
                //case 'link': include('include/link.php'); break;
                case 'sualink':include('include/sualink.php');break;
                case 'themmoilink':include('include/themmoilink.php');break;
            }
            include('include/link.php');
            ?>
        </div>
    </div>
</div><!--content-->

<div id="footer">

</div><!--footers-->
</body>
</html>