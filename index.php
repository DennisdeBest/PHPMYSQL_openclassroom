<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Minichat</title>
    <?php session_start();
    $_SESSION['referrer']= 'http://'.$_SERVER['HTTP_HOST'].$_SERVER['PHP_SELF'];
    ?>
    <link rel="stylesheet" type="text/css" href="css.css">
</head>
<body>
<div id="input">
    <form id="inputForm" action="processChat.php" method="post">
        <table>
            <tr>
                <th>
        <label for="pseudo">Pseudo : </label>
                </th>
                <td>
        <input type="text" name="pseudo" id="pseudo" value='<?php if(!empty($_SESSION['pseudo'])){echo $_SESSION['pseudo'];} ; ?>'/>
                </td>
            </tr>
            <tr>
                <th>
        <label for="message">Message : </label>
                </th>
                <td>
        <input type="text" name="message" placeholder="Message"/>
                </td>
            </tr>
            <tr>
                <td colspan="2">
        <input type="submit" value="Send !">
                </td>
            </tr>
        </table>
       <span id="error"> <?php if(!empty($_SESSION['error'])){echo $_SESSION['error'];}; ?></span>
    </form>

    <?php require_once ("displayChat.php"); ?>
</div>

</body>
</html>