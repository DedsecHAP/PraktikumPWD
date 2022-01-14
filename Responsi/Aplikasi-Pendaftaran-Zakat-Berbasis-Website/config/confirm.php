<?php 
require "config.php";
require "function.php";

if (isset($_GET['id'])) {
    if (isset($_GET['action'])) {
        if ($_GET['action'] === 'Confirm') {
            $id = $_GET['id'];
            $data = GetDataMYSQL("SELECT * FROM Confirm WHERE ConfirmID = $id");
            $id_zakat = $data['ZakatID'];
            $id_person = $data['PenzakatID'];
            $id_metode = $data['PayID'];
            $jumlah_bayar = $data['Total_Bayar'];
            $insert = "INSERT INTO Daftar VALUES (NULL, $id_person, '$id_zakat', '$id_metode' , $jumlah_bayar, CURRENT_TIMESTAMP())";
            $GLOBALS['connect']->query($insert);
            $remove = "DELETE FROM Confirm WHERE ConfirmID = $id";
            $GLOBALS['connect']->query($remove);
        } else {
            $id = $_GET['id'];
            $remove = "DELETE FROM Confirm WHERE ConfirmID = $id";
            $GLOBALS['connect']->query($remove);
        }
        header('Location: ../dashboard/');
    }

}