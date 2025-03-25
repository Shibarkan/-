<?php
session_start();
$date = new DateTime();
$today = $date->format('l'); // Nama hari dalam bahasa Inggris
$workouts = isset($_SESSION['schedule'][$today]) ? $_SESSION['schedule'][$today] : [];
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Jadwal Gym</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 p-6">
    <div class="max-w-lg mx-auto bg-white p-6 rounded-lg shadow-lg text-center">
        <h1 class="text-3xl font-bold mb-4">Selamat Datang di Jadwal Gym</h1>
        <a href="addjadwal.php" class="bg-blue-500 text-white px-4 py-2 rounded">Tambah Jadwal</a>
    </div>

    <!-- Popup jadwal hari ini -->
    <div id="today-popup" class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center">
        <div class="bg-white p-6 rounded-lg shadow-lg w-96">
            <h2 class="text-xl font-bold">Jadwal Latihan Hari Ini (<?php echo $today; ?>)</h2>
            <ul class="mt-3 space-y-2">
                <?php if (!empty($workouts)) : ?>
                    <?php foreach ($workouts as $workout) : ?>
                        <li class="p-2 rounded <?php echo (strtotime(date('H:i')) < strtotime('18:00')) ? 'bg-green-500 text-white' : 'bg-gray-300'; ?>">
                            <?php echo htmlspecialchars($workout); ?>
                        </li>
                    <?php endforeach; ?>
                <?php else : ?>
                    <p>Tidak ada jadwal hari ini.</p>
                <?php endif; ?>
            </ul>
            <button onclick="closePopup()" class="bg-red-500 text-white px-4 py-2 rounded mt-3">Tutup</button>
        </div>
    </div>

    <script>
        function closePopup() {
            document.getElementById("today-popup").style.display = "none";
        }
    </script>
</body>
</html>
