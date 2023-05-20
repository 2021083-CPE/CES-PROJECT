<?php
if (isset($_GET['file'])) {
    $filePath = $_GET['file'];

    header('Content-Type: application/pdf');
    header('Content-Disposition: inline; filename="project.pdf"');

    readfile($filePath);
    exit;
} else {
    echo 'Invalid file.';
}
?>
