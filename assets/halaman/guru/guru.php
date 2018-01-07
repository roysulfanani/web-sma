<section id="section-guru">
	<div class="row">
		<div class="col-lg-12">
			<div id="list"> <!-- list -->
				<div class="panel panel-primary">
					<div class="panel-heading">Data</div>
					<div class="panel-body">
					<div class="panel-panel-primary">
						<div class="row"> <!-- tombol -->
							<div class="col-lg-12">
								<button type="button" class="btn btn-primary" data-toggle="button"id="btnTambah"> Tambah 
								</button>
							</div>
						</div> <!-- tombol -->
						<table class="table table-hover" id="tabelData">
							<thead>
								<tr>
									<td>NIP</td>
									<td>Nama</td>
									<td>Alamat</td>
									<td>Aktif</td>
									<td>Aksi</td>
								</tr>
							</thead>
							<tbody>
								<tr>
								<td>&nbsp;</td>
								<td>&nbsp;</td>
								<td>&nbsp;</td>
								<td>&nbsp;</td>
								<td>&nbsp;</td>
								</tr>
							</tbody>
						</table>
					
					</div>
				</div>
				</div>
			</div> <!-- akhir list -->
			
			<div id="form"> <!-- form -->
				<div class="panel panel-primary">
					<div class="panel-heading">Form</div>
					<div class="panel-body">
						<form class="form-horizonta" id="forminput">
						<input type="hidden" name="idGuru" id="idGuru">
						<input type="hidden" name="action" id="action" value="commit">
							<div class="form-group">
								<label class="col-md-4 control-label">NIP</label>
								<div class="col-md-8">
									<input type="text" class="form-control" name="tnip" id="tnip">
								</div>
							</div>
							<div class="form-group">
								<label class="col-md-4 control-label">Nama</label>
								<div class="col-md-8">
									<input type="text" class="form-control" name="tnama" id="tnama">
								</div>
							</div>
							
							<div class="form-group">
								<label class="col-md-4 control-label">Jenis Kelamin</label>
								<div class="col-md-8" id="jk">
									<label>
										<input type="radio" name="JK" id="L" value="L">
										Laki-Laki
									</label>
									<label>
										<input type="radio" name="JK" id="P" value="P">
										Perempuan
									</label>
									
								</div>
							</div>
							
							<div class="form-group">
								<label class="col-md-4 control-label">Alamat</label>
								<div class="col-md-8">
									<textarea name="talamat" id="talamat" class="form-control" rows="3"></textarea>
								</div>
							</div>
							
							<div class="form-group">
								<label class="col-md-4 control-label">Mapel</label>
								<div class="col-md-8">
									<select name="tmapel" id="tmapel" class="form-control">
									  <option>Matematika</option>
									  <option>Fisika</option>
									  <option>Sejarah</option>
									  <option>Penjas</option>
									  <option>Bahasa</option>
									</select>
								</div>
							</div>
							<div class="form-group">
								<label class="col-md-4 control-label">Aktif</label>
								<div class="col-md-8" id="aktif">
									<label>
										<input type="radio" name="taktif" id="1" value="1">
										Ya
									</label>
									<label>
										<input type="radio" name="taktif" id="0" value="0">
										Tidak
									</label>
									
								</div>
							</div>
							
							<div class="form-group">
								<div class="col-sm-offset-4 col-sm-8">
								  <button name="btnSimpan" id="btnSimpan" type="button" class="btn btn-primary"><span class="glyphicon glyphicon-floppy-disk"></span>  Simpan</button>
								  <button name="btnBatal" id="btnBatal" type="reset" class="btn btn-danger"><span class="glyphicon glyphicon-remove"></span>  Batal</button>
								</div>
							</div>
						</form>
					</div>
					
			</div> <!-- akhir form -->
		</div>
	</div>
	</div>
</section>

<script type="text/javascript" src="halaman/guru/guru_script.js"></script>
