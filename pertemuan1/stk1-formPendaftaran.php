<?php



?>
<!DOCTYPE html>
<html>
	<head>
		<title>Belajar PHP</title>
	</head>
	<body>
		<h2>Form Pendaftaran</h2>
		<form action="stk1-cetak.php" method="POST">
			<table>
				<tr>
					<td><label for="npm">NPM :</label>
					</td><td><input type="text" name="npm" id="npm"/>
					</td>
				</tr>
				<tr>
					<td><label for="nama">NAMA :</label>
					</td><td>	<input type="text" name="nama" id="nama"/>
					</td>
				</tr>
				<tr>
					<td><label for="jk">JENIS KELAMIN :</label>
						</td><td><select name="jk" id="jk">
							<option value="">--- Pilih Jenis Kelamin ---</option>
							<option value="Laki-Laki">Laki-Laki</option>
							<option value="Perempuan">Perempuan</option>
						</select>
					</td>
				</tr>
				<tr>
					<td><button type="submit" onClick="alert('Data Pendaftaran Dikirim');">Kirim</button></td>
				</tr>
			</table>
		</form>
	</body>
</html>