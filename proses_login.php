<?php

//* Includde Koneksi Ke database
include_once("admin/config/connect-db.php");

//* Include Base Url
include_once("admin/config/base-url.php");


$username = $_POST['username'];
$pass = md5($_POST['password']);


if (!isset($_POST['status']) || $_POST['status'] == "") {
	echo "error-none";

} elseif ($_POST['status'] == 1) {
	$login = mysqli_query($mysqli, "SELECT * FROM tb_user WHERE username = '$username' AND password='$pass' AND status = 1");
	$row = mysqli_fetch_array($login);
	if ($row['username'] == $username and $row['password'] == $pass) {
		session_start();
		$_SESSION['nama'] = $row['nama_lengkap'];
		$_SESSION['username'] = $row['username'];
		$_SESSION['status'] = 'USER';
		$_SESSION['id'] = $row['id'];
		$_SESSION['id_kklp'] = $row['id_kklp'];
		// Jika Sukses, redirect halaman menggunakan javascript
		echo json_encode(array('status' => 'ok', 'url' => $base_url_back . '/index.php'));

	} else {

		// Jika Sukses, redirect halaman menggunakan javascript
		/* echo '<script language="javascript"> window.location.href = "'.$base_url_front.'/index.php" </script>'; */
		echo "error";

	}

} else if ($_POST['status'] == 2) {
	$login = mysqli_query($mysqli, "SELECT * FROM tb_user_admin WHERE username = '$username' AND password='$pass'");
	$row = mysqli_fetch_array($login);
	if ($row['username'] == $username and $row['password'] == $pass) {
		session_start();
		$_SESSION['nama'] = $row['nama'];
		$_SESSION['username'] = $row['username'];
		$_SESSION['status'] = 'ADMIN';
		$_SESSION['id'] = $row['id'];
		// Jika Sukses, redirect halaman menggunakan javascript
		echo json_encode(array('status' => 'ok', 'url' => $base_url_back . '/index.php'));

	} else {

		// Jika Sukses, redirect halaman menggunakan javascript
		/* echo '<script language="javascript"> window.location.href = "'.$base_url_front.'/index.php" </script>'; */
		echo "error";

	}

} else if ($_POST['status'] == 3) {
	$login = mysqli_query($mysqli, "SELECT * FROM tb_penanggung_jawab WHERE NIP = '$username'");
	$row = mysqli_fetch_array($login);
	if ($row['NIP'] == $username) {
		session_start();
		$_SESSION['nama'] = $row['nama_penanggung_jawab'];
		$_SESSION['username'] = $row['nama_penanggung_jawab'];
		$_SESSION['status'] = 'PJ';
		$_SESSION['id'] = $row['id'];
		$_SESSION['id_penempatan'] = $row['id_penempatan'];
		// Jika Sukses, redirect halaman menggunakan javascript
		echo json_encode(array('status' => 'ok', 'url' => $base_url_back . '/index.php'));

	} else {

		// Jika Sukses, redirect halaman menggunakan javascript
		/* echo '<script language="javascript"> window.location.href = "'.$base_url_front.'/index.php" </script>'; */
		echo "error";

	}

}

?>