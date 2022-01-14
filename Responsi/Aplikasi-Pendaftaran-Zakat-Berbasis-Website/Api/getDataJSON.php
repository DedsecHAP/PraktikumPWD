<?php 
    include "../config/config.php";

    $query = "SELECT * FROM Daftar INNER JOIN Penzakat USING(PenzakatID)
    INNER JOIN Zakat USING(ZakatID)
    INNER JOIN Metode_Bayar USING(PayID) ORDER BY Tanggal";
    $result = $connect->query($query);

    $respon["Penzakat"] = array();
    while ($data = mysqli_fetch_object($result)) {
        $h = $data;
        array_push($respon["Penzakat"], $h);
    }
    $query = "SELECT COUNT(*) AS Penzakat, (SELECT SUM(Jum_Bayar) FROM Daftar INNER JOIN zakat USING(ZakatID) WHERE ZakatID = 'ZB') AS ZB,
	(SELECT SUM(Jum_Bayar) FROM Daftar INNER JOIN zakat USING(ZakatID) WHERE ZakatID = 'ZU') AS ZU,
	(SELECT COUNT(*) FROM Confirm) AS Pendaftar  
	FROM Daftar INNER JOIN penzakat USING(PenzakatID)
    INNER JOIN zakat USING(ZakatID)
    INNER JOIN metode_bayar USING(PayID) ORDER BY Tanggal";
    $result = $connect->query($query);

    $respon["Statistik"] = array();
    while ($data = mysqli_fetch_object($result)) {
        $h = $data;
        array_push($respon["Statistik"], $h);
    }
    header('content-type: application/json');
    echo json_encode($respon);
?>