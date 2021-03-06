<section id="section-informasi">
	<div class="row">
		<div class="col-lg-12">
			<div id="list"> <!-- list -->
				<div class="panel panel-primary">
					<div class="panel-heading">Data</div>
					<div class="panel-body">
					<div class="panel-panel-primary">
						<div class="row"> <!-- tombol -->
							<div class="col-lg-8">
								<button type="button" class="btn btn-primary" data-toggle="button"id="btnTambah"> Tambah 
								</button>
							</div>
						</div> <!-- tombol -->
						<table class="table table-hover" id="tabelData">
							<thead>
								<tr>
									<td>Nomer</td>
									<td>Judul</td>
									<td>Isi</td>
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
					<div class="panel-heading">Form Informasi</div>
					<div class="panel-body">
						<form class="form-horizonta" id="forminput">
						<input type="hidden" name="idinfo" id="idinfo">
						<input type="hidden" name="action" id="action" value="commit">
							<div class="form-group">
								<label class="col-md-4 control-label">Judul</label>
								<div class="col-md-8">
									<input type="text" class="form-control" name="tjudul" id="tjudul">
								</div>
							</div>

							<div class="form-group">
								<label class="col-md-4 control-label">Isi</label>
								<div class="col-md-8">
								<textarea class="form-control ckeditor" id="ckedtor" name="tisi"></textarea>
									<!--<input type="text" class="form-control" name="tnama" id="tnama">-->
								</div>
							</div>
							
							<div class="form-group">
								<label class="col-md-4 control-label">Aktif</label>
								<div class="col-md-8">
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

<script type="text/javascript" src="halaman/informasi/informasi.js"></script>