<!DOCTYPE html>
<html>
<head>
    <meta http-equiv='Content-Type' content='text/html; charset=utf-8'>
    <title>Opprette ny CD</title>
<body>
<h1>Opprette ny CD</h1>
<?= isset($MSG) ? $MSG : '' ?>
<form action='add_cd.php' method='post'>
    Tittel: <input type='text' name='title' size='32' required><br>
    Artist: <input type='text' name='artist' size='32' required><br>
    Produksjonsår: <input type='number' name='creationYear' size='4' value='2000' required><br>
    Sjanger: <input type='text' name='genre' size='32' required><br>
    <input type='submit'>
</form>
</body>
</head>
</html>