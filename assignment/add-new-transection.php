<?php 
    session_start();

    $pendingJson = file_get_contents('pending.json');
    $pendingList = json_decode($pendingJson, true);

    $sender = $_SESSION['username'];
    $receiver = $_POST['receiver'];
    $amount = $_POST['amount'];
    $tid = random_int(1000,9999);

    $transection = array(
        'tid' => $tid,
        'sender' => $sender,
        'receiver' => $receiver,
        'amount' => $amount,
        'vote' => 0
    );

    $pendingList[$tid] =  $transection;

    file_put_contents('pending.json', json_encode($pendingList, JSON_PRETTY_PRINT));

    header('location: add-transection.php');

?>