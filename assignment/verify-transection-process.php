<?php 

session_start();

$pendingJson = file_get_contents("pending.json");
$pending = json_decode($pendingJson, true);


/*updating vote*/
$vote = $_POST['vote'];
$vote =  (int) $vote + 1;
$pending[$_POST['tid']]['vote'] = $vote;

$total_admin_count = 3;

$transection = array(
    'tid' => $_POST['tid'],
    'sender' => $_POST['sender'],
    'receiver' => $_POST['receiver'],
    'amount' => $_POST['amount'],
    'vote' => $vote
);

if($vote == 2){
    $a1Json = file_get_contents("admin/priya.json");
    $a2Json = file_get_contents("admin/priya2.json");
    $a3Json = file_get_contents("admin/priya3.json");

    

    $a1 = json_decode($a1Json, true);
    $a2 = json_decode($a2Json, true);
    $a3 = json_decode($a3Json, true);

    $a1[$transection['tid']] = $transection;
    $a2[$transection['tid']] = $transection;
    $a3[$transection['tid']] = $transection;

    unset($pending[$transection['tid']]);

    file_put_contents("admin/priya.json", json_encode($a1, JSON_PRETTY_PRINT));
    file_put_contents("admin/priya2.json", json_encode($a2, JSON_PRETTY_PRINT));
    file_put_contents("admin/priya3.json", json_encode($a3, JSON_PRETTY_PRINT));

    
}

else{

    $json = file_get_contents("admin/".$_SESSION['username'].".json");
    $data = json_decode($json, true);

    $data[$transection['tid']] = $transection;

    file_put_contents("admin/".$_SESSION['username'].".json", json_encode($data, JSON_PRETTY_PRINT));

    
}

file_put_contents("pending.json", json_encode($pending, JSON_PRETTY_PRINT));

header('location: verify-transection.php')


?>