
<?php 
    session_start();
    
    $pendingJson = file_get_contents('pending.json');
    $pendingList = json_decode($pendingJson, true);

    $verifiedJson = file_get_contents('admin/'.$_SESSION['username'].".json");
    $verifiedList = json_decode($verifiedJson, true);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    
    <title>Verify Transection</title>
</head>
<body>
    <fieldset>
        <h2 align="center">Verify Pending Transection</h2> <hr><br>

        <h4 align="center">Verified Transections</h4>
        <table align="center" border="1" cellspacing = "0" cellpadding="10">
            <tr>
                <th>Transection ID</th>
                <th>Sender</th>
                <th>Receiver</th>
                <th>Amount</th>
                <!-- <th>Date</th> -->
            </tr>
            <?php 
                if(count($verifiedList) > 0){
                    foreach($verifiedList as $verified){
                        
                        ?>
                            <tr>
                                <td> <?= $verified['tid'] ?> </td>
                                <td> <?= $verified['sender'] ?> </td>
                                <td> <?= $verified['receiver'] ?> </td>
                                <td> <?= $verified['amount'] ?> </td>
                            </tr>
                        <?php
                    }
                }
                else{
                    ?>
                        <tr>
                            <td colspan="7" align="center">Empty</td>
                        </tr>
                    <?php
                }
            ?>
        </table>

        <h4 align="center">Pending Transections</h4>
        <table align="center" border="1" cellspacing = "0" cellpadding="10">
            <tr>
                <th>Transection ID</th>
                <th>Sender</th>
                <th>Receiver</th>
                <th>Amount</th>
                <th>Vote</th>
                <th>Verify</th>
            </tr>

            <?php 
                if(count($pendingList) > 0){
                    foreach($pendingList as $pending){
                        if(array_key_exists($pending['tid'], $verifiedList)) continue;
                        ?>
                            <tr>
                                <form action="verify-transection-process.php" method="post">

                                <input type="hidden" name="tid" value="<?=$pending['tid']?>">
                                <input type="hidden" name="sender" value="<?=$pending['sender']?>">
                                <input type="hidden" name="receiver" value="<?=$pending['receiver']?>">
                                <input type="hidden" name="amount" value="<?=$pending['amount']?>">
                                <input type="hidden" name="vote" value="<?=$pending['vote']?>">

                                    <td> <?= $pending['tid'] ?> </td>
                                    <td> <?= $pending['sender'] ?> </td>
                                    <td> <?= $pending['receiver'] ?> </td>
                                    <td> <?= $pending['amount'] ?> </td>
                                    <td> <?= $pending['vote'] ?> </td>
                                    <td><input type="submit" name="verify" value="Verify"></td>
                                </form>
                            </tr>
                        <?php
                    }
                }
                else{
                    ?>
                        <tr>
                            <td colspan="7" align="center">Empty</td>
                        </tr>
                    <?php
                }
            ?>

        </table>


    </fieldset>
    <center>
        <a href="logout.php"><input type="button" value="Logout"></a>
    </center>
</body>
</html>