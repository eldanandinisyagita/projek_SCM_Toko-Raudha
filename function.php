<?php
session_start();

//membuat koneksi ke database
$conn = mysqli_connect("localhost","root","","db_toko_raudha");


//insert data barang
if (isset($_POST['tambahBarang'])) {
	$id_barang = $_POST['id_barang'];
	$nama_barang = $_POST['nama_barang'];
	$harga_barang = $_POST['harga_barang'];
	// $foto_barang = $_POST['foto_barang'];
	$modal_barang = $_POST['modal_barang'];
	$stok = $_POST['stok'];
	$rop = $_POST['rop'];
	$lot_sizing = $_POST['lot_sizing'];

	//foto barang
	$extension_used = array('png','jpg');
	$namafile = $_FILES['foto_barang']['name'];
	$dot = explode('.', $namafile);
	$extension = strtolower(end($dot));
	$size = $_FILES['foto_barang']['size'];
	$file_tmp = $_FILES['foto_barang']['tmp_name'];

	//enkripsi nama foto
	$foto = md5(uniqid($namafile, true) . time()).'.'.$extension;

	//validasi data sudah terdaftar atau belum
	$cek = mysqli_query($conn, "select * from barang where nama_barang='$nama_barang'");
	$hitung = mysqli_num_rows($cek);

	if($hitung < 1){
	
		//upload gambar
		if(in_array($extension, $extension_used) === true){
			if($size < 1500000){
				move_uploaded_file($file_tmp, 'foto_barang/'.$foto);
				
				$insertTable = mysqli_query($conn, "insert into barang (id_barang, nama_barang, harga_barang, foto_barang, modal_barang, stok, rop, lot_sizing) 
											values ('$id_barang','$nama_barang','$harga_barang','$foto','$modal_barang','$stok','$rop','$lot_sizing')");

				if ($insertTable) {
					header('location:index.php');
				} else {
					echo "Gagal";
					header('location:index.php');
				}
			}else{
				echo ' 
				<script>
					alert("Ukuran gambar terlalu besar !");
					window.location.href="index.php";
				</script>
				';
			}
			}else{
			echo ' 
			<script>
				alert("File gambar yang diupload harus PNG / JPG !");
				window.location.href="index.php";
			</script>
			';
		}

	} else{
		echo ' 
		<script>
			alert("Barang ini sudah terdaftar !");
			window.location.href="index.php";
		</script>
		';
	}
};

//insert data barang masuk
if(isset($_POST['tambahBarangMasuk'])){
	$id_barang_masuk = $_POST['id_barang_masuk'];
	$barang = $_POST['barang'];
	$supplier = $_POST['supplier'];
	$jml_masuk = $_POST['jml_masuk'];
	
	//Alogritma Tambah Stok
	$cekStokBarang = mysqli_query($conn, "select * from  barang where id_barang='$barang'");
	$takeStock	= mysqli_fetch_array($cekStokBarang);
	$stokSekarang = $takeStock['stok'];
	$tambahStok = $stokSekarang + $jml_masuk;

	$insertTableBarangMasuk = mysqli_query($conn, "insert into barang_masuk (id_brg_masuk, id_barang, id_supplier, jml_masuk)
												   values ('$id_barang_masuk','$barang','$supplier','$jml_masuk')");
	
	
	$updateTableBarang = mysqli_query($conn, "update barang set stok='$tambahStok' where id_barang='$barang'");
	
	
	if ($insertTableBarangMasuk && $updateTableBarang) {
		header('location:barangmasuk.php');
	} else {
		echo "Gagal";
		header('location:barangmasuk.php');
	}											   
};

//insert data barang masuk supplier
if(isset($_POST['tambahBarangMasukSupplier'])){
	$id_barang_masuk = $_POST['id_barang_masuk'];
	$barang = $_POST['barang'];
	$jml_masuk = $_POST['jml_masuk'];
	
	//Alogritma Tambah Stok
	$cekStokBarang = mysqli_query($conn, "select * from stoksupplier where id_barang='$barang'");
	$takeStock	= mysqli_fetch_array($cekStokBarang);
	$stokSekarang = $takeStock['stok'];
	$tambahStok = $stokSekarang + $jml_masuk;

	$insertTableBarangMasuk = mysqli_query($conn, "insert into barang_masuk_supplier (id_brg_masuk, id_barang, jml_masuk)
												   values ('$id_barang_masuk','$barang','$jml_masuk')");
	
	
	$updateTableBarang = mysqli_query($conn, "update stoksupplier set stok='$tambahStok' where id_barang='$barang'");
	
	
	if ($insertTableBarangMasuk && $updateTableBarang) {
		header('location:barangmasukSupplier.php');
	} else {
		echo "Gagal";
		header('location:barangmasukSupplier.php');
	}											   
};

//insert data barang Keluar Supplier
if(isset($_POST['tambahBarangkeluarSupplier'])){
	$id_barang_masuk = $_POST['id_barang_masuk'];
	$barang = $_POST['barang'];
	$supplier = $_POST['supplier'];
	$jml_masuk = $_POST['jml_masuk'];
	
	//Alogritma Tambah Stok
	$cekStokBarang = mysqli_query($conn, "select * from  barang where id_barang='$barang'");
	$cekStokBarangSupplier = mysqli_query($conn, "select * from  stoksupplier where id_barang='$barang'");
	$takeStock	= mysqli_fetch_array($cekStokBarang);
	$takeStockSupplier	= mysqli_fetch_array($cekStokBarangSupplier);
	$stokSekarang = $takeStock['stok'];
	$stokSekarangSupplier = $takeStockSupplier['stok'];
	$tambahStok = $stokSekarang + $jml_masuk;
	$kurangStokSupplier = $stokSekarangSupplier - $jml_masuk;

	$insertTableBarangMasuk = mysqli_query($conn, "insert into barang_masuk (id_brg_masuk, id_barang, id_supplier, jml_masuk)
												   values ('$id_barang_masuk','$barang','$supplier','$jml_masuk')");
	
	
	$updateTableBarang = mysqli_query($conn, "update barang set stok='$tambahStok' where id_barang='$barang'");
	$updateTableBarangSupplier = mysqli_query($conn, "update stoksupplier set stok='$kurangStokSupplier' where id_barang='$barang'");
	
	
	if ($insertTableBarangMasuk && $updateTableBarang) {
		header('location:barangkeluarSupplier.php');
	} else {
		echo "Gagal";
		header('location:barangkeluarSupplier.php');
	}											   
};

//insert data barang keluar
if(isset($_POST['tambahBarangKeluar'])){
	$id_barang_keluar = $_POST['id_barang_keluar'];
	$barang = $_POST['barang'];
	$customer = $_POST['customer'];
	$jml_keluar = $_POST['jml_keluar'];
	
	//Alogritma Kurang Stok
	$cekStokBarang = mysqli_query($conn, "select * from  barang where id_barang='$barang'");
	$takeStock	= mysqli_fetch_array($cekStokBarang);
	$stokSekarang = $takeStock['stok'];

	if($stokSekarang >= $jml_keluar){

		$kurangStok = $stokSekarang - $jml_keluar;

		$insertTableBarangKeluar = mysqli_query($conn, "insert into barang_keluar (id_brg_keluar, id_barang, id_cus, jml_keluar)
													values ('$id_barang_keluar','$barang','$customer','$jml_keluar')");
		
		
		$updateTableBarang = mysqli_query($conn, "update barang set stok='$kurangStok' where id_barang='$barang'");
		
		
		if ($insertTableBarangKeluar && $updateTableBarang) {
			header('location:barangkeluar.php');
		} else {
			echo "Gagal";
			header('location:barangkeluar.php');
		}
	}else{
		echo ' 
		<script>
			alert("Stok saat ini tidak mencukupi !");
			window.location.href="barangkeluar.php";
		</script>
		';
	}											   
};

//insert data barang keluar
if(isset($_POST['tambahBarangKeluarCustomer'])){
	$id_barang_keluar = $_POST['id_barang_keluar'];
	$barang = $_POST['barang'];
	$customer = $_POST['customer'];
	$jml_keluar = $_POST['jml_keluar'];
	
	//Alogritma Kurang Stok
	$cekStokBarang = mysqli_query($conn, "select * from  barang where id_barang='$barang'");
	$takeStock	= mysqli_fetch_array($cekStokBarang);
	$stokSekarang = $takeStock['stok'];

	if($stokSekarang >= $jml_keluar){

		$kurangStok = $stokSekarang - $jml_keluar;

		$insertTableBarangKeluar = mysqli_query($conn, "insert into barang_keluar (id_brg_keluar, id_barang, id_cus, jml_keluar)
													values ('$id_barang_keluar','$barang','$customer','$jml_keluar')");
		
		
		$updateTableBarang = mysqli_query($conn, "update barang set stok='$kurangStok' where id_barang='$barang'");
		
		
		if ($insertTableBarangKeluar && $updateTableBarang) {
			header('location:riwayatpembelian.php');
		} else {
			echo "Gagal";
			header('location:riwayatpembelian.php');
		}
	}else{
		echo ' 
		<script>
			alert("Stok saat ini tidak mencukupi !");
			window.location.href="riwayatpembelian.php";
		</script>
		';
	}											   
};


//insert data staff
if (isset($_POST['tambahStaff'])) {
	$id_staff = $_POST['id_staff'];
	$nama_staff = $_POST['nama_staff'];
	$nohandphone = $_POST['no_hp'];
	// $foto_staff = $_POST['foto_staff'];
	$username = $_POST['username'];
	$password = $_POST['password'];

	//foto staff
	$extension_used = array('png','jpg');
	$namafile = $_FILES['foto_staff']['name'];
	$dot = explode('.', $namafile);
	$extension = strtolower(end($dot));
	$size = $_FILES['foto_staff']['size'];
	$file_tmp = $_FILES['foto_staff']['tmp_name'];

	//enkripsi nama foto
	$foto = md5(uniqid($namafile, true) . time()).'.'.$extension;

	//upload gambar
	if(in_array($extension, $extension_used) === true){
		if($size < 1500000){
			move_uploaded_file($file_tmp, 'foto_staff/'.$foto);
			
			$insertTableStaff = mysqli_query($conn, "insert into staff (id_staff, nama_staff, no_hp, foto_staff, username, password) 
										values ('$id_staff','$nama_staff','$nohandphone','$foto','$username','$password')");

			if ($insertTableStaff) {
				header('location:staff.php');
			} else {
				echo "Gagal";
				header('location:staff.php');
			}
		}else{
			echo ' 
			<script>
				alert("Ukuran gambar terlalu besar !");
				window.location.href="staff.php";
			</script>
			';
		}
		}else{
		echo ' 
		<script>
			alert("File gambar yang diupload harus PNG / JPG !");
			window.location.href="staff.php";
		</script>
		';
	}
	
};

//insert data supplier
if (isset($_POST['tambahSupplier'])) {
	$id_supplier = $_POST['id_supplier'];
	$staff = $_POST['staff'];
	$nama_supplier = $_POST['nama_supplier'];
	$nohandphone = $_POST['no_hp'];

	$insertTableSupplier = mysqli_query($conn, "insert into supplier (id_supplier, id_staff, nama_supplier, no_hp) 
										values ('$id_supplier','$staff','$nama_supplier','$nohandphone')");

	if ($insertTableSupplier) {
		header('location:supplier.php');
	} else {
		echo "Gagal";
		header('location:supplier.php');
	}
};

//update data barang
if (isset($_POST['updateTambahBarang'])){
	$id_barang = $_POST['id_brg'];
	$nama_barang = $_POST['nama_barang'];
	$harga_barang = $_POST['harga_barang'];
	// $foto_barang = $_POST['foto_barang'];
	$modal_barang = $_POST['modal_barang'];
	$rop = $_POST['rop'];
	$lot_sizing = $_POST['lot_sizing'];

	//foto barang
	$extension_used = array('png','jpg');
	$namafile = $_FILES['foto_barang']['name'];
	$dot = explode('.', $namafile);
	$extension = strtolower(end($dot));
	$size = $_FILES['foto_barang']['size'];
	$file_tmp = $_FILES['foto_barang']['tmp_name'];

	//enkripsi nama foto
	$foto = md5(uniqid($namafile, true) . time()).'.'.$extension;

	if($size == 0){
		$updateTable = mysqli_query($conn, "update barang set nama_barang='$nama_barang', harga_barang='$harga_barang', modal_barang='$modal_barang', rop='$rop', lot_sizing='$lot_sizing'
										where id_barang='$id_barang'");

		if($updateTable){
			header('location:index.php');
		} else {
			echo "Gagal";
			header('location:index.php');
		}
	}else{
		move_uploaded_file($file_tmp, 'foto_barang/'.$foto);
		$updateTable = mysqli_query($conn, "update barang set nama_barang='$nama_barang', harga_barang='$harga_barang', foto_barang='$foto', modal_barang='$modal_barang', rop='$rop', lot_sizing='$lot_sizing'
										where id_barang='$id_barang'");

		if($updateTable){
			header('location:index.php');
		} else {
			echo "Gagal";
			header('location:index.php');
		}
	}
};


//update data barang Supplier
if (isset($_POST['updateTambahBarangSupplier'])){
	$id_barang = $_POST['id_brg'];
	$nama_barang = $_POST['nama_barang'];
	// $foto_barang = $_POST['foto_barang'];
	

	//foto barang
	$extension_used = array('png','jpg');
	$namafile = $_FILES['foto_barang']['name'];
	$dot = explode('.', $namafile);
	$extension = strtolower(end($dot));
	$size = $_FILES['foto_barang']['size'];
	$file_tmp = $_FILES['foto_barang']['tmp_name'];

	//enkripsi nama foto
	$foto = md5(uniqid($namafile, true) . time()).'.'.$extension;

	if($size == 0){
		$updateTable = mysqli_query($conn, "update stoksupplier set nama_barang='$nama_barang' where id_barang='$id_barang'");

		if($updateTable){
			header('location:indexSupplier.php');
		} else {
			echo "Gagal";
			header('location:indexSupplier.php');
		}
	}else{
		move_uploaded_file($file_tmp, 'foto_barang/'.$foto);
		$updateTable = mysqli_query($conn, "update stoksupplier set nama_barang='$nama_barang', foto_barang='$foto' where id_barang='$id_barang'");

		if($updateTable){
			header('location:indexSupplier.php');
		} else {
			echo "Gagal";
			header('location:indexSupplier.php');
		}
	}
};



//delete data barang
if(isset($_POST['deleteBarang'])){
	$id_barang = $_POST['id_brg'];

	$foto_barang = mysqli_query($conn, "select * from barang where id_barang ='$id_barang'");
	$get = mysqli_fetch_array($foto_barang);
	$foto = 'foto_barang/'.$get['foto_barang'];
	unlink($foto);

	$deleteTable = mysqli_query($conn, "delete from barang where id_barang='$id_barang'");

	if($deleteTable){
		header('location:index.php');
	} else {
		echo "Gagal";
		header('location:index.php');
	}
};

//delete data barang supplier
if(isset($_POST['deleteBarangSupplier'])){
	$id_barang = $_POST['id_brg'];

	$foto_barang = mysqli_query($conn, "select * from stoksupplier where id_barang ='$id_barang'");
	$get = mysqli_fetch_array($foto_barang);
	$foto = 'foto_barang/'.$get['foto_barang'];
	unlink($foto);

	$deleteTable = mysqli_query($conn, "delete from stoksupplier where id_barang='$id_barang'");

	if($deleteTable){
		header('location:indexSupplier.php');
	} else {
		echo "Gagal";
		header('location:indexSupplier.php');
	}
};


//update tambah barang masuk
if (isset($_POST['updateTambahBarangMasuk'])){
	$id_barang_masuk = $_POST['id_brg_masuk'];
	$id_barang = $_POST['id_barang'];
	$id_supplier = $_POST['id_supplier'];
	$jml_masuk = $_POST['jml_masuk'];

	$cekStokBarangMasuk = mysqli_query($conn, "select * from barang where id_barang='$id_barang'");
	$takeStock	= mysqli_fetch_array($cekStokBarangMasuk);
	$stokSekarang = $takeStock['stok'];

	$stokMasukSekarang = mysqli_query($conn, "select * from barang_masuk where id_brg_masuk='$id_barang_masuk'");
	$stokMasuk = mysqli_fetch_array($stokMasukSekarang);
	$stokMasukSekarang = $stokMasuk['jml_masuk'];

	if($jml_masuk > $stokMasukSekarang){
		$selisihStok = $jml_masuk - $stokMasukSekarang;
		$kurangkanStok = $stokSekarang + $selisihStok;
		$kurangiStok = mysqli_query($conn, "update barang set stok = '$kurangkanStok' where id_barang = '$id_barang'");
		$update = mysqli_query($conn, "update barang_masuk set jml_masuk = '$jml_masuk', id_supplier = '$id_supplier' where id_brg_masuk = '$id_barang_masuk'");
		
		if($kurangiStok&&$update){
			header('location:barangmasuk.php');
		}else{
			echo'gagal';
			header('location:barangmasuk.php');
		}
	
	}else{
		$selisihStok = $stokMasukSekarang - $jml_masuk;
		$kurangkanStok = $stokSekarang - $selisihStok;
		$kurangiStok = mysqli_query($conn, "update barang set stok = '$kurangkanStok' where id_barang = '$id_barang'");
		$update = mysqli_query($conn, "update barang_masuk set jml_masuk = '$jml_masuk', id_supplier = '$id_supplier' where id_brg_masuk = '$id_barang_masuk'");
		
		if($kurangiStok&&$update){
			header('location:barangmasuk.php');
		}else{
			echo'gagal';
			header('location:barangmasuk.php');
		}
	}
};


//update tambah barang masuk supplier
if (isset($_POST['updateTambahBarangMasukSupplier'])){
	$id_barang_masuk = $_POST['id_brg_masuk'];
	$id_barang = $_POST['id_barang'];
	$jml_masuk = $_POST['jml_masuk'];

	$cekStokBarangMasuk = mysqli_query($conn, "select * from stoksupplier where id_barang='$id_barang'");
	$takeStock	= mysqli_fetch_array($cekStokBarangMasuk);
	$stokSekarang = $takeStock['stok'];

	$stokMasukSekarang = mysqli_query($conn, "select * from barang_masuk_supplier where id_brg_masuk='$id_barang_masuk'");
	$stokMasuk = mysqli_fetch_array($stokMasukSekarang);
	$stokMasukSekarang = $stokMasuk['jml_masuk'];

	if($jml_masuk > $stokMasukSekarang){
		$selisihStok = $jml_masuk - $stokMasukSekarang;
		$kurangkanStok = $stokSekarang + $selisihStok;
		$kurangiStok = mysqli_query($conn, "update stoksupplier set stok = '$kurangkanStok' where id_barang = '$id_barang'");
		$update = mysqli_query($conn, "update barang_masuk_supplier set jml_masuk = '$jml_masuk' where id_brg_masuk = '$id_barang_masuk'");
		
		if($kurangiStok&&$update){
			header('location:barangmasukSupplier.php');
		}else{
			echo'gagal';
			header('location:barangmasukSupplier.php');
		}
	
	}else{
		$selisihStok = $stokMasukSekarang - $jml_masuk;
		$kurangkanStok = $stokSekarang - $selisihStok;
		$kurangiStok = mysqli_query($conn, "update stoksupplier set stok = '$kurangkanStok' where id_barang = '$id_barang'");
		$update = mysqli_query($conn, "update barang_masuk_supplier set jml_masuk = '$jml_masuk' where id_brg_masuk = '$id_barang_masuk'");
		
		if($kurangiStok&&$update){
			header('location:barangmasukSupplier.php');
		}else{
			echo'gagal';
			header('location:barangmasukSupplier.php');
		}
	}
};



//delete data barang masuk/barang keluar supplier
if(isset($_POST['deleteBarangMasuk'])){
	$id_barang_masuk = $_POST['id_brg_masuk'];
	$id_barang = $_POST['id_barang'];
	$jml_masuk = $_POST['jml_masuk'];

	$cekStokBarang = mysqli_query($conn, "select * from barang where id_barang = '$id_barang'");
	$takeStock = mysqli_fetch_array($cekStokBarang);

	$stok = $takeStock['stok'];

	$hasilDelete = $stok - $jml_masuk;

	$update = mysqli_query($conn, "update barang set stok = '$hasilDelete' where id_barang = '$id_barang'");
	$hapusData = mysqli_query($conn, "delete from barang_masuk where id_brg_masuk = '$id_barang_masuk'");
	

	if($update&&$hapusData){
		header('location:barangmasuk.php');
	
	}
	else{
		header('location:barangmasuk.php');
	}
 };


 //delete data barang masuk/barang keluar supplier
if(isset($_POST['deleteBarangKeluarSupplier'])){
	$id_barang_masuk = $_POST['id_brg_masuk'];
	$id_barang = $_POST['id_barang'];
	$jml_masuk = $_POST['jml_masuk'];

	$cekStokBarangSupplier = mysqli_query($conn, "select * from stoksupplier where id_barang = '$id_barang'");
	$takeStockSupplier = mysqli_fetch_array($cekStokBarangSupplier);

	$stokSupplier = $takeStockSupplier['stok'];

	$hasilDeleteSupplier = $stokSupplier + $jml_masuk;

	$updateSupplier = mysqli_query($conn, "update stoksupplier set stok = '$hasilDeleteSupplier' where id_barang = '$id_barang'");
	$hapusData = mysqli_query($conn, "delete from barang_masuk where id_brg_masuk = '$id_barang_masuk'");
	

	if($updateSupplier&&$hapusData){
		header('location:barangkeluarSupplier.php');
	}
	else{
		header('location:barangKeluarSupplier.php');
	}
 };


 //delete data barang masuk supplier
if(isset($_POST['deleteBarangMasukSupplier'])){
	$id_barang_masuk = $_POST['id_brg_masuk'];
	$id_barang = $_POST['id_barang'];
	$jml_masuk = $_POST['jml_masuk'];

	$cekStokBarangSupplier = mysqli_query($conn, "select * from stoksupplier where id_barang = '$id_barang'");
	$takeStockSupplier = mysqli_fetch_array($cekStokBarangSupplier);
	$stokSupplier = $takeStockSupplier['stok'];

	$stokSupplier = $takeStockSupplier['stok'];

	$hasilDeleteSupplier = $stokSupplier - $jml_masuk;

	$updateSupplier = mysqli_query($conn, "update stoksupplier set stok = '$hasilDeleteSupplier' where id_barang = '$id_barang'");
	$hapusData = mysqli_query($conn, "delete from barang_masuk_supplier where id_brg_masuk = '$id_barang_masuk'");
	

	if($updateSupplier&&$hapusData){
		header('location:barangmasukSupplier.php');
	}
	else{
		header('location:barangmasukSupplier.php');
	}
 };

 //update data barang keluar
if (isset($_POST['updateTambahBarangKeluar'])){
	$id_barang_keluar = $_POST['id_brg_keluar'];
	$id_barang = $_POST['id_barang'];
	$id_cus = $_POST['id_cus'];
	$jml_keluar = $_POST['jml_keluar'];

	$cekStokBarang = mysqli_query($conn, "select * from barang where id_barang='$id_barang'");
	$takeStock	= mysqli_fetch_array($cekStokBarang);
	$stokSekarang = $takeStock['stok'];

	$stokKeluarSekarang = mysqli_query($conn, "select * from barang_keluar where id_brg_keluar='$id_barang_keluar'");
	$stokKeluar = mysqli_fetch_array($stokKeluarSekarang);
	$stokKeluarSekarang = $stokKeluar['jml_keluar'];

	if($jml_keluar > $stokKeluarSekarang){
		$selisihStok = $jml_keluar - $stokKeluarSekarang;
		$kurangkanStok = $stokSekarang - $selisihStok;

		if($selisihStok <= $stokSekarang){
			$kurangiStok = mysqli_query($conn, "update barang set stok = '$kurangkanStok' where id_barang = '$id_barang'");
			$update = mysqli_query($conn, "update barang_keluar set jml_keluar = '$jml_keluar', id_cus = '$id_cus' where id_brg_keluar = '$id_barang_keluar'");
			
			if($kurangiStok&&$update){
				header('location:barangkeluar.php');
			}else{
				echo'gagal';
				header('location:barangkeluar.php');
			}
		}else{
			echo ' 
		<script>
			alert("Stok tidak mencukupi !");
			window.location.href="barangkeluar.php";
		</script>
		';
		}
	}else{
		$selisihStok = $stokKeluarSekarang - $jml_keluar;
		$kurangkanStok = $stokSekarang + $selisihStok;
		$kurangiStok = mysqli_query($conn, "update barang set stok = '$kurangkanStok' where id_barang = '$id_barang'");
		$update = mysqli_query($conn, "update barang_keluar set jml_keluar = '$jml_keluar', id_cus = '$id_cus' where id_brg_keluar = '$id_barang_keluar'");
		
		if($kurangiStok&&$update){
			header('location:barangkeluar.php');
		}else{
			echo'gagal';
			header('location:barangkeluar.php');
		}
	}
};

//delete data barang keluar
if(isset($_POST['deleteBarangKeluar'])){
	$id_barang_keluar = $_POST['id_brg_keluar'];
	$id_barang = $_POST['id_barang'];
	$jml_keluar = $_POST['jml_keluar'];

	$cekStokBarang = mysqli_query($conn, "select * from barang where id_barang = '$id_barang'");
	$takeStock = mysqli_fetch_array($cekStokBarang);
	$stok = $takeStock['stok'];

	$hasilDelete = $stok + $jml_keluar;

	$update = mysqli_query($conn, "update barang set stok = '$hasilDelete' where id_barang = '$id_barang'");
	$hapusData = mysqli_query($conn, "delete from barang_keluar where id_brg_keluar = '$id_barang_keluar'");

	if($update&&$hapusData){
		header('location:barangkeluar.php');
	}else{
		header('location:barangkeluar.php');
	}
 };


 //update data staff
if (isset($_POST['updateStaff'])){
	$id_staff = $_POST['id_staff'];
	$nama_staff = $_POST['nama_staff'];
	$no_handphone = $_POST['no_handphone'];
	//$foto_staff = $_POST['foto_staff'];
	$username = $_POST['username'];

	//foto staff
	$extension_used = array('png','jpg');
	$namafile = $_FILES['foto_staff']['name'];
	$dot = explode('.', $namafile);
	$extension = strtolower(end($dot));
	$size = $_FILES['foto_staff']['size'];
	$file_tmp = $_FILES['foto_staff']['tmp_name'];

	//enkripsi nama foto
	$foto = md5(uniqid($namafile, true) . time()).'.'.$extension;

	if($size == 0){
		$updateTable = mysqli_query($conn, "update staff set nama_staff='$nama_staff', no_hp='$no_handphone', username='$username'
										where id_staff='$id_staff'");

		if($updateTable){
			header('location:staff.php');
		} else {
			echo "Gagal";
			header('location:staff.php');
		}
	}else{
		move_uploaded_file($file_tmp, 'foto_staff/'.$foto);
		$updateTable = mysqli_query($conn, "update staff set nama_staff='$nama_staff', no_hp='$no_handphone', foto_staff='$foto', username='$username'
										where id_staff='$id_staff'");

		if($updateTable){
			header('location:staff.php');
		} else {
			echo "Gagal";
			header('location:staff.php');
		}
	}

	
};

//delete data staff
if(isset($_POST['deleteStaff'])){
	$id_staff = $_POST['id_staff'];
	
	$foto_staff = mysqli_query($conn, "select * from staff where id_staff ='$id_staff'");
	$get = mysqli_fetch_array($foto_staff);
	$foto = 'foto_staff/'.$get['foto_staff'];
	unlink($foto);

	$deleteTable = mysqli_query($conn, "delete from staff where id_staff='$id_staff'");

	if($deleteTable){
		header('location:staff.php');
	} else {
		echo "Gagal";
		header('location:staff.php');
	}
};

 //update data supplier
 if (isset($_POST['updateSupplier'])){
	$id_supplier = $_POST['id_supplier'];
	$id_staff = $_POST['id_staff'];
	$nama_supplier = $_POST['nama_supplier'];
	$no_handphone = $_POST['no_handphone'];

	$updateTable = mysqli_query($conn, "update supplier set nama_supplier='$nama_supplier', no_hp='$no_handphone', id_staff='$id_staff'
										where id_supplier='$id_supplier'");

	if($updateTable){
		header('location:supplier.php');
	} else {
		echo "Gagal";
		header('location:supplier.php');
	}
};

//delete data staff
if(isset($_POST['deleteSupplier'])){
	$id_supplier = $_POST['id_supplier'];

	$deleteTable = mysqli_query($conn, "delete from supplier where id_supplier='$id_supplier'");

	if($deleteTable){
		header('location:supplier.php');
	} else {
		echo "Gagal";
		header('location:supplier.php');
	}
};

//detail barang
function detailBarang($barang, $id_barang){
	global $conn;
	$query = "select * from $barang where id_barang = '$id_barang'";
	return $query_run = mysqli_query($conn, $query);
};


?>