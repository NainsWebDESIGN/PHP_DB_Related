<!DOCTYPE html>
<html lang="tw">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>嘗試連接資料庫</title>
</head>

<body>
    <?php
    $DB_server = "your IP"; # 你的網域IP
    $DB_user = "your userName"; # 你的帳號
    $DB_pass = "your passWord"; # 你的密碼
    $DB_name = "your dataBase"; # 你的資料庫

    $connection = new mysqli($DB_server, $DB_user, $DB_pass, $DB_name);

    if($connection -> connect_error){
        die("連線失敗: " . $connection -> connect_error);
    }else{
        echo "連線成功<br>";
    }

    $Table = "NainsCreate"; #資料表名稱
    $sqlTable = "SELECT * FROM $Table;"; #查詢資料表
    $sqlCreate = "CREATE TABLE NainsCreate ( #新增資料表
        id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
        name varchar(50) NOT NULL,
        text varchar(200))";
    $sqlInner = "INSERT INTO NainsCreate (name, text) VALUES ('TestPHP', 'TestPHP_Insert')"; # 新增Table裡的資料
    $sqlUpdate = "UPDATE NainsCreate SET name = 'ChangValues' WHERE id = 2"; # 更改內容
    $sqlDelete = "DELETE FROM NainsCreate WHERE id = 4"; # 刪除資料表資料

        # 新增Table
        if($connection->query($sqlCreate) === TRUE){
            echo "成功建立NainsCreate資料表<br>";
        }else{
            if($connection->error == "Table 'nainscreate' already exists"){
                echo "Table NainsCreate 已經建立過了，無法再次建立!<br>";
            }else{
                echo "建立失敗 : " . $connection->error . "<br>";
            }
        }

        # 新增Table資料
        if($connection->query($sqlInner) === TRUE){
            echo "成功建立NainsCreate資料表的資料<br>";
        }else{
            echo "建立失敗 : " . $connection->error . "<br>";
        }

        # 更改內容
        if($connection->query($sqlUpdate) === TRUE){
            echo "成功更動NainsCreate資料表ID2的資料<br>";
        }else{
            echo "建立失敗 : " . $connection->error . "<br>";
        }

        # 刪除資料
        if($connection->query($sqlDelete) === TRUE){
            echo "成功刪除NainsCreate資料表ID4的資料<br>";
        }else{
            echo "刪除失敗 : " . $connection->error . "<br>";
        }
        
        # 查詢資料
        if($result = $connection->query($sqlTable)){
            echo "result成功<br>";
            while($row = $result->fetch_row()){
                $data = array('ID' => $row[0], 'Name' => $row[1], 'Text' => $row[2]);
                // echo "ID." . $row[0] . " : Name." . $row[1] . " , Text." . $row[2] . "<br>";
                echo json_encode($data) . "<br>";
            }
            $result->close();
        }else{
            echo "result失敗: " . $connection->error;
        }

    $connection->close();

    ?>
</body>

</html>