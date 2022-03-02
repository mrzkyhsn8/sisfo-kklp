<?php include('config/connect-db.php'); ?>
<?php
    $ID = $_POST['id'];
        $query = mysqli_query($mysqli, "SELECT * FROM tb_penanggung_jawab WHERE id_penempatan = $ID");
        
        
            echo "<option value=''> --- Pilih --- </option>";
            while($data = mysqli_fetch_array($query)){
                echo "<option value='".$data['id']."'>".$data['nama_penanggung_jawab']."</option>";
            }
        
    
?>