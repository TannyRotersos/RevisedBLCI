<?php 


// connect and login to FTP server
$destination_path = "public_html/"; 
$ftp_server = "files.000webhost.com";
$ftp_conn = ftp_connect($ftp_server) or die("Could not connect to $ftp_server");
$login = ftp_login($ftp_conn, "blci", "intrudertanny");
ftp_pasv($ftp_conn, true);

$file1 = "teller1.txt";
$file2 = "teller2.txt";
$file3 = "teller3.txt";
$file4 = "teller4.txt";
$file5 = "teller5.txt";
$file6 = "teller6.txt";
$destination_file1 = $destination_path."serverfile1.txt";
$destination_file2 = $destination_path."serverfile2.txt";
$destination_file3 = $destination_path."serverfile3.txt";
$destination_file4 = $destination_path."serverfile4.txt";
$destination_file5 = $destination_path."serverfile5.txt";
$destination_file6 = $destination_path."serverfile6.txt";
// upload file
if (ftp_put($ftp_conn, $destination_file1, $file1, FTP_ASCII))
  {
  echo "";
  }
if (ftp_put($ftp_conn, $destination_file2, $file2, FTP_ASCII))
  {
  echo "";
  }
if (ftp_put($ftp_conn, $destination_file3, $file3, FTP_ASCII))
  {
  echo "";
  }
if (ftp_put($ftp_conn, $destination_file4, $file4, FTP_ASCII))
  {
  echo "";
  } 
if (ftp_put($ftp_conn, $destination_file5, $file5, FTP_ASCII))
  {
  echo "";
  }
if (ftp_put($ftp_conn, $destination_file6, $file6, FTP_ASCII))
  {
  echo "";
  }       
else
  {
  echo "";
  }
//close connection
ftp_close($ftp_conn);


?>
