<?php
echo "\nMasukkan No Telp      : ";
$no = trim(fgets(STDIN, 1024));

function curl($url, $var = null) {
      $curl = curl_init($url);
      curl_setopt($curl, CURLOPT_TIMEOUT, 25);
      if ($var != null) {
          curl_setopt($curl, CURLOPT_POST, true);
          curl_setopt($curl, CURLOPT_POSTFIELDS, $var);
      }
      curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
      curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, 2);
      curl_setopt($curl, CURLOPT_FOLLOWLOCATION, true);
      curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
      $result = curl_exec($curl);
      curl_close($curl);
      return $result;
  }
$curl = curl("https://idsystem404.000webhostapp.com/api/api-cekinfohlr.php?no=".$no);
$cek = json_decode($curl, TRUE);
$hasil = json_decode($curl);
if ($cek['status'] == "success") {  
echo "\n"; 
echo "NOMOR : ".$hasil->number."\n";
echo "KODE NOMOR : ".$hasil->number_code."\n";
echo "TIPE : ".$hasil->type."\n";
echo "NEGARA : ".$hasil->country."\n";
echo "KODE NEGARA : ".$hasil->country_code."\n";
echo "PROVIDER : ".$hasil->provider."\n";
echo "TIMEZONE : ".$hasil->timezone."\n\n";
        }
        else {
            echo "GAGAL! Masukkan Nomor Handphone yang benar!\n\n";
        }

?>