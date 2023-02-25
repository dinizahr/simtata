<?php
session_start();
session_destroy();
echo "<script>
    window.alert('Anda telah logout dari aplikasi ini!');
    window.location.href='landing/landing.php';
    </script>";
?>


