<?php
session_start();
include "koneksi.php";

if(!isset($_SESSION['login'])){
    header("Location: login.php");
    exit;
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<title>Data Anggota</title>

<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">

<style>
    body {
        margin: 0;
        font-family: "Poppins", sans-serif;
        background: linear-gradient(135deg, #9d7a5b, #cbb89d, #e1d7c8);
        height: 100vh;
        display: flex;
        overflow: hidden;
        background-size: 300% 300%;
        animation: bgMove 10s infinite alternate ease-in-out;
    }

    @keyframes bgMove {
        0% { background-position: 0% 50%; }
        100% { background-position: 100% 50%; }
    }

    /* ================= SIDEBAR ================= */
    .sidebar {
        width: 260px;
        height: 100vh;
        background: rgba(255, 255, 255, 0.15);
        backdrop-filter: blur(12px);
        padding: 25px;
        box-shadow: 3px 0 12px rgba(0,0,0,0.1);
        color: white;
        position: fixed;
        left: 0;
        top: 0;
    }

    .sidebar h2 {
        margin-bottom: 30px;
        font-weight: 600;
        font-size: 22px;
        text-align: center;
    }

    .menu a {
        display: block;
        padding: 12px;
        margin-bottom: 10px;
        border-radius: 12px;
        text-decoration: none;
        color: white;
        background: rgba(255, 255, 255, 0.2);
        transition: 0.3s;
        font-size: 15px;
        display: flex;
        align-items: center;
        gap: 8px;
    }

    .menu a:hover {
        background: rgba(255, 255, 255, 0.35);
        transform: translateX(5px);
    }

    /* ================= CONTENT ================= */
    .content {
        flex: 30;
        margin-left: 300px;
        padding: 35px;
        color: white;
        overflow-y: auto;
    }

    h2 {
        font-size: 32px;
        font-weight: 600;
        text-shadow: 0 2px 3px rgba(0,0,0,0.2);
        margin-bottom: 25px;
    }

    /* ================= CARD WRAPPER ================= */
    .card {
        width: 97%;
        background: rgba(255, 255, 255, 0.2);
        backdrop-filter: blur(10px);
        border-radius: 20px;
        padding: 25px;
        color: white;
        box-shadow: 0 10px 25px rgba(0,0,0,0.2);
        margin-bottom: 25px;
    }

    /* TOP BAR */
    .top-bar {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 15px;
    }

    .top-bar input {
        width: 280px;
        padding: 10px 15px;
        border-radius: 12px;
        border: none;
        outline: none;
        background: rgba(255,255,255,0.8);
        font-size: 15px;
    }

    .add-btn {
        padding: 10px 15px;
        background: rgba(255, 255, 255, 0.25);
        border-radius: 12px;
        color: white;
        text-decoration: none;
        font-weight: 600;
        display: flex;
        align-items: center;
        gap: 8px;
        transition: 0.3s;
    }

    .add-btn:hover {
        background: rgba(255, 255, 255, 0.4);
    }

    /* ================= TABLE ================= */
  table {
        width: 98%;
        border-collapse: collapse;
        background: #d6c3ac;
        border-radius: 10px;
        overflow: hidden;
    }

    table th {
        background: #b69c7d;
        padding: 12px;
        text-align: left;
        color: white;
    }

    table td {
        padding: 12px;
        border-bottom: 1px solid #cbb8a6;
    }


</style>

</head>
<body>

<!-- ================= SIDEBAR ================= -->
<div class="sidebar">
    <h2><i class="bi bi-grid-fill"></i> Dashboard</h2>

    <div class="menu">
        <a href="index.php"><i class="bi bi-house"></i> Beranda</a>
        <a href="Anggota.php"><i class="bi bi-people"></i> Anggota</a>
        <a href="PenilaiPM.php"><i class="bi bi-person-badge"></i> Penilai PM</a>
        <a href="#"><i class="bi bi-journal-text"></i> Daily Report</a>
    </div>
</div>

<!-- ================= CONTENT ================= -->
<div class="content">

    <h2>Data Anggota</h2>

    <div class="card">

        <div class="top-bar">
            <input type="text" id="searchInput" placeholder="Cari nama, alamat, atau kontak...">
            <a href="#" class="add-btn"><i class="bi bi-plus-circle"></i> Tambah Anggota</a>
        </div>

        <table>
            <tr>
                <th>Nama</th>
                <th>Alamat</th>
                <th>Kontak</th>
            </tr>

            <?php
            $data = mysqli_query($koneksi, "SELECT * FROM anggota ORDER BY id_anggota DESC");
            while($row = mysqli_fetch_assoc($data)):
            ?>

            <tr>
                <td><?= $row['nama']; ?></td>
                <td><?= $row['alamat']; ?></td>
                <td><?= $row['kontak']; ?></td>
            </tr>

            <?php endwhile; ?>
        </table>

    </div>
</div>

<script>
    // LIVE SEARCH
    document.getElementById("searchInput").addEventListener("keyup", function() {
        let filter = this.value.toUpperCase();
        let rows = document.querySelectorAll("table tr");

        rows.forEach((row, i) => {
            if (i === 0) return;
            let cols = row.getElementsByTagName("td");
            let match = false;

            for (let col of cols) {
                if (col.textContent.toUpperCase().includes(filter)) {
                    match = true;
                    break;
                }
            }
            row.style.display = match ? "" : "none";
        });
    });
</script>

</body>
</html>
