<?php
use LDAP\Result;

$db = mysqli_connect("localhost", "root", "", "rental");


function query($query)
{
    global $db;
    $result = mysqli_query($db, $query);
    $rows = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $rows[] = $row;

    }
    return $rows;
}

function peminjaman($data)
{
    global $db;

    $username = htmlspecialchars($data["username"]);
    $waktu_peminjaman = htmlspecialchars($data["waktu_peminjaman"]);
    $ps = htmlspecialchars($data["ps"]);
    $harga = htmlspecialchars($data["harga"]);

    $query = "INSERT INTO peminjaman
    VALUES
    ('', '$username', '$waktu_peminjaman', '$ps', '$harga')
    ";
    mysqli_query($db, $query);
    return mysqli_affected_rows($db);
}
?>