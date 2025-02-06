<?php
require_once "connect.php";

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
                <td align="right"><a href="index.php"style="text-decoration: none;color: #000">Anasayfa</a></td>
            </tr>
        <tr height="30">
            <td colspan="2"></td>
        </tr>
        <tr height="30" style="background:#990000;color: #fff;border-radius: 6px; ">
            <td align="left">Makale Başlığı</td>
            <td align="right">Görüntüleme Sayısı</td>
        </tr>

        <?php
            $query  =   $db_connect->prepare('SELECT * FROM makaleler');
            $query->execute();
            $makaleler_count    =   $query->rowCount();
            $makaleler          =   $query->fetchAll(PDO::FETCH_ASSOC);

        foreach($makaleler as $makale):
        ?>
            <tr>
                <td align="left"><a style="color: #333;text-decoration: none" href="read.php?id=<?php echo $makale['id'];?>"><?php echo $makale['makalebasligi'];?></a></td>
                <td align="right"><?php echo $makale['gosterimsayisi'];?></td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
</body>
</html>

<?php $db_connect=null; ?>
 

