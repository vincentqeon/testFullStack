<!DOCTYPE html>
<html>
<head>
    <title>generate qrcode & barcode</title>
</head>
<body>
    <div align="center">
        <h2>Generate File QRCode & Barcode</h2>
        <form method="POST">
            <table>
                <tr>
                    <td valign="top">Content</td>
                    <td><input type="text" name="content" id="content"></td>
                </tr>
                <tr>
                    <td valign="top">tipe:</td>
                    <td>
                        <input type="radio" name="type" value="barcode">Barcode
                        <input type="radio" name="type" value="qrcode">QrCode
                    </td>
                </tr>
                <tr>
                    <td valign="top"></td>
                    <td><input type="submit" name="submit" value="Generate"></td>
                </tr>
            </table>
        </form>
        <?php
        //need 2 library:
        // https://github.com/davidscotttufts/php-barcode/ 
        // https://sourceforge.net/projects/phpqrcode/files/
        if (isset($_POST['submit'])) {
            if(empty($_POST['content']) || empty($_POST['type']) )
                exit;
            
            if($_POST['type'] == 'qrcode'){
                include "phpqrcode/qrlib.php"; 
                QRcode::png($_POST['content']); 
            }else{
                echo '<img src="php-barcode-master/barcode.php?text=' . $_POST['content'] . '&print=true&size=65" />';
            }
        }

        ?>
    </div>
</body>
</html>