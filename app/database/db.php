<?php 

require ('connect.php');

session_start();

function dumper($value){
    echo '<pre>';
    print_r($value) ;
    echo '</pre>'; 
}

// Checking execute to db
function dbCheckError($query){
    $errInfo = $query->errorInfo();
    if($errInfo[0] !== PDO::ERR_NONE){
        echo $errInfo[2];
        exit();
    }
    return true;
}

// Request to select all data from one table
function selectAll($table, $params = []){
    global $pdo;
    $sql = "SELECT * FROM $table";
    if(!empty($params)){
        $i = 0;
        foreach($params as $key => $value){
            if(!is_numeric($value)){
                $value = "'".$value."'";
            }
            if($i === 0){
                $sql = $sql . " WHERE $key = $value";
            }else{
                $sql = $sql . " AND $key = $value";
            }
            $i++;
        }  
    }
    $query = $pdo->prepare($sql);
    $query->execute();
    $errInfo = $query->errorInfo();
    dbCheckError($query);
    return $query->fetchAll();;
}

// Request to select one row from one table
function selectOne($table, $params = []){
    global $pdo;
    $sql = "SELECT * FROM $table";
    if(!empty($params)){
        $i = 0;
        foreach($params as $key => $value){
            if(!is_numeric($value)){
                $value = "'".$value."'";
            }
            if($i === 0){
                $sql = $sql . " WHERE $key = $value";
            }else{
                $sql = $sql . " AND $key = $value";
            }
            $i++;
        }
    }
    $query = $pdo->prepare($sql);
    $query->execute();
    $errInfo = $query->errorInfo();
    dbCheckError($query);
    return $query->fetch();;
}

//INSERT into table 
function insert($table, $params){
    global $pdo;
    $i = 0;
    $col = '';
    $mask = '';
    foreach($params as $key => $value){
        if($i === 0){
            $col = $col . $key;
            $mask = $mask . "'$value'";
        }else{
            $col = $col . ", $key";
            $mask = $mask . ", '$value'";
        }

        $i++;
    }
    $sql = "INSERT INTO $table ($col) VALUES ($mask)";
    $query = $pdo->prepare($sql);
    $query->execute($params);
    dbCheckError($query);
    return $pdo->lastInsertId();
}

//UPDATE request
function update($table, $paramsData, $paramsWhere){
    global $pdo;
    $i = 0;
    $set = '';
    foreach($paramsData as $key => $value){
        if($i === 0){
            $set = $key . " = " . "'$value'";
        }else{
            $set = $set . ", " . $key . " = " . "'$value'";
        }
        $i++;
    }
    $i = 0;
    $where = '';
    foreach($paramsWhere as $key => $value){
        if($i === 0){
            $where = $key . " = " . "'$value'";
        }else{
            $where = $where . ", " . $key . " = " . "'$value'";
        }
        $i++;
    }
    $sql = "UPDATE $table SET $set WHERE $where";
    $query = $pdo->prepare($sql);
    $query->execute($paramsData);
    dbCheckError($query);
}

//DELETE request
function deleteRow($table, $paramsWhere){
    global $pdo;
    $i = 0;
    $where = '';
    foreach($paramsWhere as $key => $value){
        if($i === 0){
            $where = "WHERE " . $key . " = " . "$value";
        }else{
            $where = $where . " AND " . $key . " = " . "'$value'";
        }
        $i++;
    }
    $sql = "DELETE FROM $table $where";
    $query = $pdo->prepare($sql);
    $query->execute($paramsWhere);
    dbCheckError($query);
}
?>