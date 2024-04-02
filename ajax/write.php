<?php

// Membuka file 'data.json' dalam mode 'w+' (baca/tulis, dan membuat jika tidak ada)
$data_source_file = fopen("data.json", "w+");

// Menghapus tag HTML dari data POST untuk 'message' untuk mencegah XSS (Cross-Site Scripting)
$_POST['message'] = strip_tags($_POST['message']);
// Menghapus tag HTML dari data POST untuk 'name' untuk mencegah XSS
$_POST['name'] = strip_tags($_POST['name']);

// Mengkodekan array POST menjadi string JSON
$message = json_encode($_POST);	

// Menulis string JSON ke dalam file 'data.json'
fwrite($data_source_file, $message);
// Menutup file 'data.json' setelah operasi penulisan selesai
fclose($data_source_file);
