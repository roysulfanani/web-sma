<section id="section-guru">
	<div class="row">
		<div class="col-lg-12">
			<div id="list">
				<div class="panel panel-primary">
					<div class="panel-heading">Data</div>
					<div class="panel-body">
					<button class="btn btn-primary" name="btnTambah" id="btnTambah">Tambah</button>
						<table class="table table-hover" id="tabelData">
							<thead>
								<tr class="text-center">
									<td>NIP</td>
									<td>Nama</td>
									<td>Telpon</td>
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
			
			<div id="form">
				<div class="panel panel-primary">
					<div class="panel-heading">Form</div>
					<div class="panel-body"> 
						<form class="form-horizontal" id="formInput">
							<input type="hidden" name="idGuru" id="idGuru">
							<input type="hidden" name="action" id="action" value="commit">
					<div class="form-group">
						<label class="col-md-3 control-label">NIP</label>
						<div class="col-md-9">
							<input type="text" class="form-control" name="tnip" id="tnip">
						</div>
					</div>
					<div class="form-group">
						<label class="col-md-3 control-label">Nama</label>
						<div class="col-md-9">
							<input type="text" class="form-control" name="tnama" id="tnama">
						</div>
					</div>
					<div class="row"></div>
					<div class="form-group">
						<label class="col-md-3 control-label">JK</label>
						<div class="col-md-9">
						<label class="radio-inline">
						<input type="radio" checked="true" name="JK" id="L" value="L">Laki-Laki
							</label>
						<label class="radio-inline">
						  <input type="radio" name="JK" id="P" value="P">Perempuan
						</label>
							</div>
						</div>
						<div class="row"></div>
						<div class="form-group">
							<label class="col-md-3 control-label">Alamat</label>
							<div class="col-md-9">
								<textarea name="talamat" id="talamat" class="form-control" rows="3"></textarea>
							</div>
						</div>
						<div class="form-group">
							<label class="col-md-3 control-label">Telpon</label>
							<div class="col-md-9">
								<input type="text" class="form-control" name="ttelpon" id="ttelpon">
							</div>
						</div>
						<div class="row"></div>
						<div class="form-group">
							<label class="col-md-3 control-label">Mapel</label>
							<div class="col-md-9">
								<select name="tmapel" id="tmapel" class="form-control">
								</select>
							</div>
						</div>
						<div class="row"></div>
						<div class="form-group">
						<label class="col-md-3 control-label">Aktif</label>
							<div class="col-md-9">
							<label class="radio-inline">
								<input type="radio" name="taktif" id="1" value="1">Ya
							</label>
							<label class="radio-inline">
								<input type="radio" name="taktif" id="0" value="0">Tidak
							</label>
							</div>
						</div>
						<div class="form-group">
							<div class="col-md-offset-3 col-md-9">
								<button class="btn btn-primary" type="button" name="btnsimpan" id="btnsimpan"><span class="glyphicon 					glyphicon-floppy-disk" aria-hidden="true"></span> Simpan</button>
								<button class="btn btn-danger" type="button" name="btnBatal" id="btnBatal"><span class="glyphicon glyphicon-remove" 	  aria-hidden="true"></span> Batal</button>
							</div>
						</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>

<script src="halaman/guru/guru_script.js" type="text/javascript"></script>