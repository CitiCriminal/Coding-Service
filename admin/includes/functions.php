<?php 
function generateRandomString($length = 30) {
    $characters = '0123456789';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[random_int(0, $charactersLength - 1)];
    }
    return $randomString;
}

function messagesend(){
    include 'config.php';
    $sql = "SELECT * FROM messages WHERE toid = '".$_GET['id']."'";
    $result = mysqli_query($conn, $sql);

    if(mysqli_num_rows($result) > 0){
        while($usermsg = mysqli_fetch_assoc($result)){
            if($usermsg['bywho'] == "user"){
                echo $usermsg['text'];
            }
        }
    }
}


?>