<?php

set_time_limit(0);//set_time_limit(0); digunakan untuk mengatur batas waktu eksekusi script PHP menjadi tak terbatas.


// where does the data come from ? In real world this would be a SQL query or something
$data_source_file = 'data.json'; //menentukan file sumber data yang akan dipantau. Dalam kasus nyata, ini bisa berupa query database atau sumber data lainnya.

// main loop
while (true) {

    // if ajax request has send a timestamp, then $last_ajax_call = timestamp, else $last_ajax_call = null
    $last_ajax_call = isset($_GET['timestamp']) ? (int)$_GET['timestamp'] : null;

    // PHP caches file data, like requesting the size of a file, by default. clearstatcache() clears that cache
    clearstatcache(); //digunakan untuk membersihkan cache file yang disimpan oleh PHP. Ini penting untuk memastikan bahwa kita mendapatkan informasi terbaru tentang file, seperti waktu terakhir modifikasi.
    // get timestamp of when file has been changed the last time
    $last_change_in_data_file = filemtime($data_source_file); //memeriksa apakah ada parameter

    // if no timestamp delivered via ajax or data.txt has been changed SINCE last ajax timestamp
    if ($last_ajax_call == null || $last_change_in_data_file > $last_ajax_call) {

        // get content of data.txt
        $data = file_get_contents($data_source_file);

        // put data.txt's content and timestamp of last data.txt change into array
        $result = array(
            'data_from_file' => json_decode($data),
            'timestamp' => $last_change_in_data_file
        );

        // encode to JSON, render the result (for AJAX)
        $json = json_encode($result);
        echo $json;

        // leave this loop step
        break;

    } else {
        // wait for 1 sec (not very sexy as this blocks the PHP/Apache process, but that's how it goes)
        sleep( 1 );
        continue;
    }
}
