<?php
require_once "connect.php";

$post_id = Filtrele($_GET['id']);

$hit_guncelle   =   $db_connect->prepare('UPDATE makaleler SET gosterimsayisi=gosterimsayisi+1 WHERE id=?');
$hit_guncelle->execute([$post_id]);
?>

<!doctype html>
<html lang="tr-TR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Makaleler</title>
</head>
<body>
<table width="1000px" border="0" cellspacing="0" cellpadding="0" align="center">
    <tbody>
    <tr height="30">
        <td align="left">Görüntüleme ve Hit Uygulaması</td>
        <td align="right"><a href="index.php" style="text-decoration: none;color: #000">Anasayfa</a></td>
    </tr>
    <tr height="30">
        <td colspan="2"></td>
    </tr>

    <?php
    $query = $db_connect->prepare('SELECT * FROM makaleler WHERE id=?');
    $query->execute([$post_id]);
    $makaleler_count = $query->rowCount();
    $makale = $query->fetch(PDO::FETCH_ASSOC);

    ?>
    <tr>
        <td colspan="2"><h3><?php echo $makale['makalebasligi']; ?></h3></td>
    </tr>
    <tr>
        <td colspan="2"><p><?php echo $makale['makaleicerigi']; ?></p></td>
    </tr>
    <tr>
        <td colspan="2">Bu Makale <b><?php echo $makale['gosterimsayisi']; ?></b> defa görüntülendi</td>
    </tr>
    </tbody>
</table>
</body>
</html>

<?php $db_connect = null; ?>


