<?php
if(isset($_REQUEST['tp']))
{
    $tp=$_REQUEST['tp'];
}
else
{
    $tp=1;
}
if(isset($_GET['action']))
{
    $action=$_GET['action'];
    $idlink=$_REQUEST['idlink'];
	if($action==0)
	{
        $db->xoalink($idlink);
        echo "<script>location.href='index.php?tp=".$tp."'</script>"	;
	}
}
?>
<?php
    $linkdm2=$db->linkdm2($tp);

    while($row3=mysql_fetch_array($linkdm2))
    {
        $linkdm21=$row3['name'];
        $c1=$row3['c1'];
    }
    $linkdm1=$db->linkdm1($c1);
    while($rowx=mysql_fetch_array($linkdm1))
    {
        $linkdm11=$rowx['name'];
    }
?>

<h1>Danh mục: <?php echo $linkdm11; ?> >> <?php echo $linkdm21; ?></h1>
<form action="index.php" name="themlink" method="post">
    <?php
    $linkcuoi=$db->linkcuoi();
    if(mysql_num_rows($linkcuoi)!=0)
    {
    while($row=mysql_fetch_array($linkcuoi))
    {

    ?>
    <h5>Mã: <input style="width:35px; border:hidden; text-align:center;" type="text" name="malink" value="<?php echo $row['id']+1; ?>" /></h5>
    <?php
    }
    }
    else
    {
        ?>
        <h5>Mã: <input style="width:35px; border:hidden; text-align:center;" type="text" name="malink" value="1" /></h5>
        <?php
    }
    ?>
    <h5>Link: <input type="text" style="width:400px;" name="link" value="" /></h5>
    <input type="hidden"  name="c2" value="<?php echo $tp;?>" />
    <h5><input type="submit" name="themlink" value="Lưu" /></h5>

<?php


    $link=$db->link($tp);
    while($row2=mysql_fetch_array($link))
    {
?>
        <div class="link">
            <h3><?php echo $row2['id'];?>-::-<a href="<?php echo $row2['link'];?>"><?php echo $row2['title'];?></a></h3>
<h5><a href="<?php echo $row2['link'];?>"><?php echo $row2['link'];?></a></h5>


            <a href="index.php?tp=<?php echo $tp;?>&action=0&idlink=<?php echo $row2['id'];?>" onclick="return confirm('Bạn có chắc chắn muốn xóa?')">Xóa</a>
        </div>
<?php
    }
?>      

</table>

</form>
