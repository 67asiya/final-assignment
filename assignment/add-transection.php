<?php 
    session_start();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Add transection</title>
</head>
<body>

    <fieldset>
        <h2 align="center">Send Money</h2>
        <table align="center">
            <form action="add-new-transection.php" method="post">
                <tr>
                    <td><b>Sender: </b></td>
                    <td> <?= $_SESSION['username'] ?> </td>
                </tr>
                <tr>
                    <td><b>Date: </b></td>
                    <td> <?= date("d-M-Y") ?> </td>
                </tr>
                <tr>
                    <td><b>Receiver: </b></td>
                    <td> <input type="text" name="receiver" id="receiver"> </td>
                </tr>
                <tr>
                    <td><b>Amount: </b></td>
                    <td> <input type="number" name="amount" id="amount"> </td>
                </tr>
                <tr>
                    <td colspan="2" align="right"> <input type="submit" name="send" id="send" value="Send Money"> </td>
                </tr>
            </form>
        </table>
    </fieldset>
    <center>
        <a href="logout.php"><input type="button" value="Logout"></a>
    </center>
    
</body>
</html>