<?php
header("Content-Disposition: attachment; filename=".$_GET['img']."\n\n");
header("Content-Type: application/octet-stream");
$enlace = "../../resources/files/careers/" . $_GET['img'];
header("Content-Length: ".filesize($enlace));
readfile($enlace);