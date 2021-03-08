<?php
header('Content-Type: application/json; charset=UTF-8'); //設定資料類型為 json，編碼 utf-8
if ($_SERVER['REQUEST_METHOD'] == "POST") { //如果是 POST 請求
    @$nickname = $_POST['nickname']; //取得 nickname POST 值
    @$gender = $_POST['gender']; //取得 gender POST 值
    $data = array();
    if ($nickname && $gender) { //如果 nickname 和 gender 都有填寫
        //回傳 nickname 和 gender json 資料
        // array_push($data, array( 'nickname' => $nickname, 'gender' => $gender ))
        // $data = array( 'nickname' => $nickname, 'gender' => $gender );
    $DB_server = "localhost"; # 你的網域IP
    $DB_user = "Nains"; # 你的帳號
    $DB_pass = "shizuna1221"; # 你的密碼
    $DB_name = "NainsDB"; # 你的資料庫

    $connection = new mysqli($DB_server, $DB_user, $DB_pass, $DB_name);

    $Table = "NainsCreate"; #資料表名稱
    $sqlTable = "SELECT * FROM $Table;"; #查詢資料表
    $sqlInner = "INSERT INTO NainsCreate (name, text) VALUES ('". $nickname ."', '". $gender ."')"; # 新增Table裡的資料

    if($connection -> connect_error){
        $data = array( 'failed' => $connection -> connect_error );
    }else{
        // $data = array( 'succes' => "成功" );
        if($connection->query($sqlInner) === TRUE){
            // $data = array( 'innerSucces' => "成功建立NainsCreate資料表的資料" );
            if($result = $connection->query($sqlTable)){
                while($row = $result->fetch_row()){
                    array_push($data, array('ID' => $row[0], 'Name' => $row[1], 'Text' => $row[2]));
                    // $data = array('ID' => $row[0], 'Name' => $row[1], 'Text' => $row[2]);
                 // echo "ID." . $row[0] . " : Name." . $row[1] . " , Text." . $row[2] . "<br>";
                 // echo json_encode($data) . "<br>";
                }
                $result->close();
            }else{
                $data = array( 'selectFailed' => $connection->error );
            }
        }else{
            $data = array( 'innerFailed' => $connection->error );
        }
    }
    } else {
        //回傳 errorMsg json 資料
        $data = array( 'errorMsg' => '資料未輸入完全！' );
    }
    echo json_encode($data);
} else {
    //回傳 errorMsg json 資料
        $data = array( 'errorMsg' => '請求無效，只允許 POST 方式訪問！' );
    echo json_encode($data);
}
?>