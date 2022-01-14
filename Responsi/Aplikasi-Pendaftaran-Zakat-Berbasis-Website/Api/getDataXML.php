<?php 
    include "../config/config.php";
    header('Content-type: text/xml');

    $query = "SELECT COUNT(*) AS Penzakat, (SELECT SUM(Jum_Bayar) FROM Daftar INNER JOIN zakat USING(ZakatID) WHERE ZakatID = 'ZB') AS ZB,
	(SELECT SUM(Jum_Bayar) FROM Daftar INNER JOIN zakat USING(ZakatID) WHERE ZakatID = 'ZU') AS ZU,
	(SELECT COUNT(*) FROM Confirm) AS Pendaftar  
	FROM Daftar INNER JOIN penzakat USING(PenzakatID)
    INNER JOIN zakat USING(ZakatID)
    INNER JOIN metode_bayar USING(PayID) ORDER BY Tanggal";
    $result = $connect->query($query);


    echo "<?xml version ='1.0'?>";
    echo "<data>";

    while ($data = mysqli_fetch_array($result)) {
        echo "<statistik>";
            echo "<penzakat>".$data['Penzakat']."</penzakat>";
            echo "<zakat_beras>". $data['ZB']. "</zakat_beras>";
            echo "<zakat_uang>". number_format($data['ZU'], 0, ',', '.'). "</zakat_uang>";
            echo "<pendaftar>". $data['Pendaftar']. "</pendaftar>";
        echo "</statistik>";
    }
    echo "</data>";

?>