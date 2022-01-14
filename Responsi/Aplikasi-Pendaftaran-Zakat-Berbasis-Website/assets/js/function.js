function Modif(value, action) {
    if (action === "Hapus") {
        var result = confirm("Yakin ingin Menghapus ?");
        if (result == true) {
            window.location.href = "../config/delete.php?id=" + value;
        } else {
            alert("Anda Membatalkan Konfirmasi");
        }
    } else {
        var result = confirm("Yakin ingin Mengedit ?");
        if (result == true) {
            window.location.href = "../config/edit.php?id=" + value;
        } else {
            alert("Anda Membatalkan Konfirmasi");
        }
    }
}

function Terima(value, action) {
    if (action === "Confirm") {
        var result = confirm("Yakin ingin Menerima ?");
        if (result == true) {
            window.location.href = "../config/confirm.php?id=" + value + "&action=" + action;
        } else {
            alert("Anda Membatalkan Konfirmasi");
        }
    } else {
        var result = confirm("Yakin ingin Menolak ?");
        if (result == true) {
            window.location.href = "../config/confirm.php?id=" + value + "&action=" + action;
        } else {
            alert("Anda Membatalkan Konfirmasi");
        }
    }
}


function Jumlah(value) {
    var jumlah = document.getElementById('jenis_zakat').value;
    jumlah = jumlah * value;
    if (jumlah != 0) {
        if (jumlah < 1000) {
            document.getElementById('total').value = jumlah + ' Kg';
        } else {
            document.getElementById('total').value = Rupiah(jumlah);
        }
    }
}

function Rupiah(angka) {
    var rupiah = '';
    var angkarev = angka.toString().split('').reverse().join('');
    for (var i = 0; i < angkarev.length; i++)
        if (i % 3 == 0) rupiah += angkarev.substr(i, 3) + '.';
    return 'Rp. ' + rupiah.split('', rupiah.length - 1).reverse().join('');
}

function Satuan(ukuran) {
    document.getElementById('jum_jiwa').value = 1;
    var jumlah = document.getElementById('jum_jiwa').value;
    jumlah = jumlah * ukuran;
    if (jumlah < 1000) {
        document.getElementById('total').value = jumlah + ' Kg';
    } else {
        document.getElementById('total').value = Rupiah(jumlah);
    }
}

function Menghitung() {
    var Harga = document.getElementById('pilihan_ZA').value;
    var Jiwa = document.getElementById('jum_jiwa').value;
    var Hasil = Harga * Jiwa;
    if (Harga < 1000) {
        document.getElementById('output-jenis').value = "Zakat Beras";
        document.getElementById('output-ukuran').value = Harga + " Kg";
        document.getElementById('output-hasil').value = Hasil + " Kg";
    } else {
        document.getElementById('output-jenis').value = "Zakat Uang";
        document.getElementById('output-ukuran').value = Rupiah(Harga);
        document.getElementById('output-hasil').value = Rupiah(Hasil);
    }
    document.getElementById('output-jiwa').value = Jiwa + " Jiwa";
}
