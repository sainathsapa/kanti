$lastID="SELECT app_num FROM customer ORDER BY id DESC LIMIT 1  ";
    $rslt = $conn->query($lastID);
    while($result = $rslt->fetch_assoc())
    {
        echo $result['app_num'];
    }