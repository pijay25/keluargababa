<?php
session_start();
if(!isset($_SESSION['login'])){
    header("Location: login.php");
    exit;
}

// Cek login
if(!isset($_SESSION['login'])){
    header("Location: login.php");
    exit;
}

// Logout
if(isset($_GET['logout'])){
    session_destroy();
    header("Location: login.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<title>Beranda Keren</title>

<!-- Import Google Font -->
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">

<!-- Bootstrap Icons -->
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
    }

    .sidebar h2 {
        margin-bottom: 30px;
        font-weight: 600;
        font-size: 22px;
        text-align: center;
    }

    .menu {
        margin-top: 20px;
    }

    .menu a {
        display: block;
        padding: 12px;
        margin-bottom: 10px;
        border-radius: 10px;
        text-decoration: none;
        color: white;
        background: rgba(255, 255, 255, 0.2);
        transition: 0.3s;
        font-size: 15px;
    }

    .menu a:hover {
        background: rgba(255, 255, 255, 0.35);
        transform: translateX(5px);
    }

    .logout {
        position: absolute;
        bottom: 30px;
        left: 25px;
        width: 210px;
        padding: 12px;
        text-align: center;
        border-radius: 10px;
        background: rgba(255, 0, 0, 0.4);
        color: white;
        text-decoration: none;
        transition: 0.3s;
    }

    .logout:hover {
        background: rgba(255, 0, 0, 0.6);
    }

    /* ================= CONTENT ================= */
    .content {
        flex: 1;
        padding: 35px;
        color: white;
        overflow-y: auto;
    }

    .title {
        font-size: 32px;
        font-weight: 600;
        margin-bottom: 25px;
        text-shadow: 0 2px 3px rgba(0,0,0,0.2);
    }

    /* ================= CARDS ================= */
    .cards {
        display: flex;
        gap: 25px;
        flex-wrap: wrap;
    }

    .card {
        width: 280px;
        height: 140px;
        background: rgba(255, 255, 255, 0.2);
        backdrop-filter: blur(10px);
        border-radius: 20px;
        padding: 20px;
        color: white;
        box-shadow: 0 10px 25px rgba(0,0,0,0.2);
        transition: 0.4s;
        position: relative;
    }

    .card:hover {
        transform: translateY(-8px);
        background: rgba(255, 255, 255, 0.3);
    }

    .card i {
        font-size: 40px;
    }

    .card-title {
        font-size: 18px;
        margin-top: 10px;
        font-weight: 600;
    }

    .big-panel {
        margin-top: 30px;
        width: 97%;
        height: 250px;
        background: rgba(255, 255, 255, 0.2);
        border-radius: 20px;
        backdrop-filter: blur(10px);
        box-shadow: 0 10px 25px rgba(0,0,0,0.2);
        padding: 20px;
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

    <a class="logout" href="login.php">
        <i class="bi bi-power"></i> Keluar
    </a>
</div>

<!-- ================= CONTENT ================= -->
<div class="content">
    <div class="title">Selamat Datang, <?= $_SESSION['nama']; ?> 👋</div>

    <div class="cards">
        <div class="card">
            <i class="bi bi-people-fill"></i>
            <div class="card-title">Total Anggota</div>
            <div>23 Orang</div>
        </div>

        <div class="card">
            <i class="bi bi-check2-circle"></i>
            <div class="card-title">Penilaian Selesai</div>
            <div>12 Penilaian</div>
        </div>

        <div class="card">
            <i class="bi bi-journal-bookmark-fill"></i>
            <div class="card-title">Daily Report</div>
            <div>5 Laporan Baru</div>
        </div>
    </div>

    <div class="big-panel">
        <h3>Status Program & Aktivitas</h3>
        <p>Anda bisa menambahkan grafik, tabel data, atau notifikasi penting di panel besar ini.</p>
    </div>
</div>

</body>
</html>
