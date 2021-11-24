<?php
    session_start();
    echo 
    "<h2>Tambah User</h2>
    <form method=post action=input_user.php>
        <table>
            <tr><td>Username</td><td> : <input name='id_user' type='text'></td></tr>
            <tr><td>Password</td><td> : <input name='password' type='password'></td></tr>
            <tr><td>Nama Lengkap</td><td> : <input name='nama' type='text'></td></tr>
            <tr><td>Email </td><td> : <input name='email' type='text'></td></tr>
            <tr>
                <td>Permiss Level 
                </td>
                <td>:
                    <select name='permiss'>
                        <option value=''>Pilih Hak Akses</option>";
                        if ($_SESSION['Permission'] == "Super Admin")
                            echo "<option value='Super Admin'>Super Admin</option>";
                        echo "<option value='Admin'>Admin</option>
                    </select>
                </td>
            </tr>
            <tr><td colspan=2><input type='submit' value='SIMPAN'></td></tr>
        </table>
    </form>";
?>