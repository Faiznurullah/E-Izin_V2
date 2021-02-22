
/*Ini Untuk Membuat Database*/
 CREATE DATABASE db_surat;


/*Ini Untuk Membuat Table Admin*/
CREATE TABLE `admin`(

  `id` int(25) NOT NULL AUTO_INCREMENT,
  `username` varchar(120) NOT NULL,
  `password` varchar(200) NOT NULL,
  `nama` varchar(200) NOT NULL,
  `foto` varchar(200) NOT NULL,
   PRIMARY KEY(id)

);



   INSERT INTO `admin` (`id`, `username`, `password`,`nama`,`foto`) VALUES
   (1, 'admin', '5f4dcc3b5aa765d61d8327deb882cf99','Admin Website', 'admin.png');

   -- Username = admin dan password = password

   CREATE TABLE siswa(

   id int(50) NOT NULL AUTO_INCREMENT,
   nama varchar(200) NOT NULL,
   kelas varchar(220) NOT NULL,
   nik varchar(240) NOT NULL,
   PRIMARY KEY(id)

   );


  CREATE TABLE kelas(

  id int(50) NOT NULL AUTO_INCREMENT,
  nama_kelas varchar(220) NOT NULL,
  wali_kelas varchar(220) NOT NULL,
  PRIMARY KEY(id)
  );



   CREATE TABLE surat(

   id int(50) NOT NULL AUTO_INCREMENT,
   nama varchar(200) NOT NULL,
   kelas varchar(220) NOT NULL,
   nik varchar(240) NOT NULL,
   tanggal varchar(240) NOT NULL,
   file varchar(240) NOT NULL,
   PRIMARY KEY(id)

   );
