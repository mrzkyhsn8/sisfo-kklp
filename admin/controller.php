<?php
    
    include 'config/connect-db.php';
    include 'config/base-url.php';
    include 'config/auth.php';
 
	$page    = $_GET['page'];
	$action  = $_GET['action'];

	/* KODE ARSIP */
	if($page == "penempatan" && $action == "insert")
	{

		 $kode = $_POST['kode'];
		 $nama_penempatan = $_POST['nama_penempatan'];

		$result = mysqli_query($mysqli, "INSERT INTO tb_penempatan SET
											nama_penempatan = '$nama_penempatan'"); 

		  if($result){ 
		      echo '<script language="javascript"> window.location.href = "'.$base_url_back.'/index.php?page=penempatan" </script>';
		  }else{
		      echo "Maaf, Terjadi kesalahan saat mencoba untuk menyimpan data ke database.";
		  }

	}elseif($page == "penempatan" && $action == "update")
	{

		  $ID = $_POST['id'];
		  $nama_penempatan = $_POST['nama_penempatan'];

				  $result = mysqli_query($mysqli, "UPDATE tb_penempatan SET
				  									nama_penempatan = '$nama_penempatan'
													WHERE id = '$ID'") or die(mysqli_error($mysqli));

		  
		 if($result){ 
		      echo '<script language="javascript"> window.location.href = "'.$base_url_back.'/index.php?page='.$page.'" </script>';
		  }else{
		      echo "Maaf, Terjadi kesalahan saat mencoba untuk menyimpan data ke database.";
		  }

	
	}elseif($page == "penempatan" && $action == "delete")
	{

		  $ID = $_GET['id'];
		  $page1 = $_GET['page1'];

				  $result = mysqli_query($mysqli, "DELETE FROM tb_penempatan WHERE id = $ID") or die(mysqli_error($mysqli));

		  
		 if($result){ 
		      echo '<script language="javascript"> window.location.href = "'.$base_url_back.'/index.php?page='.$page.'" </script>';
		  }else{
		      echo "Maaf, Terjadi kesalahan saat mencoba untuk menyimpan data ke database.";
		  }

	}
	/* PENANGGUNG JAWAB */
	if($page == "penanggung_jawab" && $action == "insert")
	{

		 $kode = $_POST['kode'];
		 $nama_penanggung_jawab = $_POST['nama_penanggung_jawaw'];

		$result = mysqli_query($mysqli, "INSERT INTO tb_penanggung_jawab SET
											nama_penanggung_jawab = '$nama_penanggung_jawab'"); 

		  if($result){ 
		      echo '<script language="javascript"> window.location.href = "'.$base_url_back.'/index.php?page=penempatan" </script>';
		  }else{
		      echo "Maaf, Terjadi kesalahan saat mencoba untuk menyimpan data ke database.";
		  }

	}elseif($page == "penanggung_jawab" && $action == "update")
	{

		  $ID = $_POST['id'];
		  $nama_penanggung_jawab = $_POST['nama_penanggung_jawab'];

				  $result = mysqli_query($mysqli, "UPDATE tb_penanggung_jawab SET
				  									nama_penanggung_jawab = '$nama_penanggung_jawab'
													WHERE id = '$ID'") or die(mysqli_error($mysqli));

		  
		 if($result){ 
		      echo '<script language="javascript"> window.location.href = "'.$base_url_back.'/index.php?page='.$page.'" </script>';
		  }else{
		      echo "Maaf, Terjadi kesalahan saat mencoba untuk menyimpan data ke database.";
		  }

	
	}elseif($page == "penanggung_jawab" && $action == "delete")
	{
		  $ID = $_GET['id'];
		  $page1 = $_GET['page1'];

				  $result = mysqli_query($mysqli, "DELETE FROM tb_penanggung_jawab WHERE id = $ID") or die(mysqli_error($mysqli));

		  
		 if($result){ 
		      echo '<script language="javascript"> window.location.href = "'.$base_url_back.'/index.php?page='.$page.'" </script>';
		  }else{
		      echo "Maaf, Terjadi kesalahan saat mencoba untuk menyimpan data ke database.";
		  }
	}

	/* PESERTA KKLP */
	if($page == "peserta-kklp" && $action == "insert")
	{

		 $id_kklp = $_POST['id_kklp'];
		 $nomor_induk = $_POST['nomor_induk'];
		 $nama_lengkap = $_POST['nama_lengkap'];
		 $jkel = $_POST['jkel'];
		 $prodi = $_POST['prodi'];
		 $no_hp = $_POST['no_hp'];
		 $email = $_POST['email'];
		 $username = $_POST['username'];
		 $password = md5($_POST['password']);

		$result = mysqli_query($mysqli, "INSERT INTO tb_user SET
											id_kklp = '$id_kklp',
											nomor_induk = '$nomor_induk',
											nama_lengkap = '$nama_lengkap',
											jkel = '$jkel',
											prodi = '$prodi',
											no_hp = '$no_hp',
											email = '$email',
											username = '$username',
											password = '$password',
											status = 1"); 

		  if($result){ 
		      echo '<script language="javascript"> window.location.href = "'.$base_url_back.'/index.php?page=peserta-kklp&id='.$id_kklp.'" </script>';
		  }else{
		      echo "Maaf, Terjadi kesalahan saat mencoba untuk menyimpan data ke database.";
		  }

	}elseif($page == "peserta-kklp-new" && $action == "insert")
	{

		 $id_kklp = $_POST['id_kklp'];
		 $nomor_induk = $_POST['nomor_induk'];
		 $nama_lengkap = $_POST['nama_lengkap'];
		 $jkel = $_POST['jkel'];
		 $prodi = $_POST['prodi'];
		 $no_hp = $_POST['no_hp'];
		 $email = $_POST['email'];
		 $username = $_POST['username'];
		 $password = md5($_POST['password']);

		$result = mysqli_query($mysqli, "INSERT INTO tb_user SET
											id_kklp = '$id_kklp',
											nomor_induk = '$nomor_induk',
											nama_lengkap = '$nama_lengkap',
											jkel = '$jkel',
											prodi = '$prodi',
											no_hp = '$no_hp',
											email = '$email',
											username = '$username',
											password = '$password',
											status = 1"); 

		if($result){ 
			echo 'success';
		}else{
			echo "Maaf, Terjadi kesalahan saat mencoba untuk menyimpan data ke database.";
		}

	}elseif($page == "peserta-kklp" && $action == "update")
	{

		  $ID = $_POST['id'];
		  	$id_kklp = $_POST['id_kklp'];
			$nomor_induk = $_POST['nomor_induk'];
			$nama_lengkap = $_POST['nama_lengkap'];
			$jkel = $_POST['jkel'];
			$prodi = $_POST['prodi'];
			$no_hp = $_POST['no_hp'];
			$email = $_POST['email'];
			$username = $_POST['username'];
			if ($_POST['password'] == "" || !isset($_POST['password'])) {
				$result = mysqli_query($mysqli, "UPDATE tb_user SET
													id_kklp = '$id_kklp',
													nomor_induk = '$nomor_induk',
													nama_lengkap = '$nama_lengkap',
													jkel = '$jkel',
													prodi = '$prodi',
													no_hp = '$no_hp',
													email = '$email',
													username = '$username'
													WHERE id = '$ID'") or die(mysqli_error($mysqli));
			} else {
				$password = md5($_POST['password']);
				$result = mysqli_query($mysqli, "UPDATE tb_user SET
													id_kklp = '$id_kklp',
													nomor_induk = '$nomor_induk',
													nama_lengkap = '$nama_lengkap',
													jkel = '$jkel',
													prodi = '$prodi',
													no_hp = '$no_hp',
													email = '$email',
													username = '$username',
													password = '$password'
													WHERE id = '$ID'") or die(mysqli_error($mysqli));
			}

		 if($result){ 
		      echo '<script language="javascript"> window.location.href = "'.$base_url_back.'/index.php?page=peserta-kklp&id='.$id_kklp.'"</script>';
		  }else{
		      echo "Maaf, Terjadi kesalahan saat mencoba untuk menyimpan data ke database.";
		  }

	
	}elseif($page == "peserta-kklp" && $action == "delete")
	{
		  $ID = $_GET['id'];
		  $id_kklp = $_GET['id_kklp'];

				  $result = mysqli_query($mysqli, "DELETE FROM tb_user WHERE id = $ID") or die(mysqli_error($mysqli));

		  
		 if($result){ 
			echo '<script language="javascript"> window.location.href = "'.$base_url_back.'/index.php?page=peserta-kklp&id='.$id_kklp.'"</script>';
		  }else{
		      echo "Maaf, Terjadi kesalahan saat mencoba untuk menyimpan data ke database.";
		  }
	}

	/* PENERIMAAN KKLP */
	if($page == "penerimaan-kklp" && $action == "insert")
	{

		$asal_instansi 	= $_POST['asal_instansi'];
		$tgl_masuk = $_POST['tgl_masuk'];
		$tgl_keluar = $_POST['tgl_keluar'];
		$id_penempatan 	= $_POST['id_penempatan'];
		$id_penanggung_jawab 	= $_POST['id_penanggung_jawab'];
		
		
			$type	       = $_FILES["file_name"]["type"];
		  	$namaFile      = "file-".date('Y-m-d H-i-s')."-terima.pdf";
			$namaSementara = $_FILES['file_name']['tmp_name'];
			$size          = $_FILES['file_name']['size'];
			$dirUpload     = "assets/pdf/terima/";
			$file_disposisi = $dirUpload.$namaFile;
			move_uploaded_file($namaSementara, $dirUpload.$namaFile);

		$result = mysqli_query($mysqli, "INSERT INTO tb_kklp SET
											asal_instansi = '$asal_instansi', 
											tgl_masuk = '$tgl_masuk', 
											tgl_keluar = '$tgl_keluar', 
											id_penempatan = '$id_penempatan', 
											id_penanggung_jawab = '$id_penanggung_jawab', 
											file_name = 'assets/pdf/terima/$namaFile'"); 

		  if($result){ 
		      echo '<script language="javascript"> window.location.href = "'.$base_url_back.'/index.php?page=penerimaan-peserta" </script>';
		  }else{
		      echo "Maaf, Terjadi kesalahan saat mencoba untuk menyimpan data ke database.";
		  }

	}elseif($page == "penerimaan-kklp" && $action == "update")
	{

		$ID 		= $_POST['id'];
		$asal_instansi 	= $_POST['asal_instansi'];
		$tgl_masuk = $_POST['tgl_masuk'];
		$tgl_keluar = $_POST['tgl_keluar'];
		$id_penempatan 	= $_POST['id_penempatan'];
		$id_penanggung_jawab 	= $_POST['id_penanggung_jawab'];
		
		if ($_FILES["file_name"]["name"] <> "") {

			$type	       = $_FILES["file_name"]["type"];
		  	$namaFile      = "file-".date('Y-m-d H-i-s')."-terima.pdf";
			$namaSementara = $_FILES['file_name']['tmp_name'];
			$size          = $_FILES['file_name']['size'];
			$dirUpload     = "assets/pdf/terima/";
			$file_disposisi = $dirUpload.$namaFile;
			move_uploaded_file($namaSementara, $dirUpload.$namaFile);

			$result = mysqli_query($mysqli, "UPDATE tb_kklp SET
												asal_instansi = '$asal_instansi', 
												tgl_masuk = '$tgl_masuk', 
												tgl_keluar = '$tgl_keluar', 
												id_penempatan = '$id_penempatan', 
												id_penanggung_jawab = '$id_penanggung_jawab', 
												file_name = 'assets/pdf/terima/$namaFile'
												WHERE id = $ID") or die (mysqli_error($mysqli));
		} else {

			$result = mysqli_query($mysqli, "UPDATE tb_kklp SET
												asal_instansi = '$asal_instansi', 
												tgl_masuk = '$tgl_masuk', 
												tgl_keluar = '$tgl_keluar', 
												id_penempatan = '$id_penempatan', 
												id_penanggung_jawab = '$id_penanggung_jawab' WHERE id = $ID") or die (mysqli_error($mysqli));
		}

		  if($result){ 
		      echo '<script language="javascript"> window.location.href = "'.$base_url_back.'/index.php?page=penerimaan-peserta" </script>';
		  }else{
		      echo "Maaf, Terjadi kesalahan saat mencoba untuk menyimpan data ke database.";
		  }
	
	}elseif($page == "penerimaan-kklp" && $action == "delete")
	{

		  $ID = $_GET['id'];
		  $page1 = $_GET['page1'];

				  $result = mysqli_query($mysqli, "DELETE FROM smasuk WHERE id_surat = $ID") or die(mysqli_error($mysqli));

		  
		 if($result){ 
		      echo '<script language="javascript"> window.location.href = "'.$base_url_back.'/index.php?page=penerimaan-peserta" </script>';
		  }else{
		      echo "Maaf, Terjadi kesalahan saat mencoba untuk menyimpan data ke database.";
		  }

	}


	/* Settings */
	if($page == "settings" && $action == "insert")
	{

		 $page1 = $_POST['page1'];
		 $nama = $_POST['nama'];
		 $username = $_POST['username'];
		 $password = MD5($_POST['password']);
		 $email = $_POST['email'];
		 $status = $_POST['status'];

		$result = mysqli_query($mysqli, "INSERT INTO tb_users SET
											nama = '$nama',
											username = '$username',
											password = '$password',
											email = '$email',
											status = '$status'"); 

		  if($result){ 
		      echo '<script language="javascript"> window.location.href = "'.$base_url_back.'/index.php?page='.$page1.'" </script>';
		  }else{
		      echo "Maaf, Terjadi kesalahan saat mencoba untuk menyimpan data ke database.";
		  }

	}elseif($page == "settings" && $action == "update")
	{

		 $ID = $_POST['id'];
		 $page1 = $_POST['page1'];
		 $nama = $_POST['nama'];
		 $username = $_POST['username'];
		 $password = $_POST['password'];
		 $email = $_POST['email'];
		 $status = $_POST['status'];

		 if (is_null($password)) {
		 	$result = mysqli_query($mysqli, "UPDATE tb_users SET
											nama = '$nama',
											username = '$username',
											email = '$email',
											status = '$status' WHERE id = $ID"); 
		 }else{
		 	$pass = MD5($password);
		 	$result = mysqli_query($mysqli, "UPDATE tb_users SET
											nama = '$nama',
											username = '$username',
											password = '$pass',
											email = '$email',
											status = '$status' WHERE id = $ID"); 
		 }

		  if($result){ 
		      echo '<script language="javascript"> window.location.href = "'.$base_url_back.'/index.php?page='.$page1.'" </script>';
		  }else{
		      echo "Maaf, Terjadi kesalahan saat mencoba untuk menyimpan data ke database.";
		  }

	
	}elseif($page == "settings" && $action == "delete")
	{

		  $ID = $_GET['id'];
		  $page1 = $_GET['page1'];

				  $result = mysqli_query($mysqli, "DELETE FROM tb_users WHERE id = $ID") or die(mysqli_error($mysqli));

		  
		 if($result){ 
		      echo '<script language="javascript"> window.location.href = "'.$base_url_back.'/index.php?page='.$page.'" </script>';
		  }else{
		      echo "Maaf, Terjadi kesalahan saat mencoba untuk menyimpan data ke database.";
		  }

	}
?>