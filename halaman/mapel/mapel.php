<section id="section-mapel">
	<div class="row">
		<div class="col-lg-12">
			<div id="list">
				<div class="panel panel-primary">
					<div class="panel-heading">Data Mapel</div>
					<div class="panel-body">
					<button class="btn btn-primary" name="btnTambah" id="btnTambah">Tambah</button>
						<table class="table table-hover" id="tabeldata">
							<thead>
								<tr class="text-center">
									<td>ID Mapel</td>
									<td>Nama Mapel</td>
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
							<input type="hidden" name="idMapel" id="idMapel">
							<input type="hidden" name="action" id="action" value="commit">
					<div class="form-group">
						<label class="col-md-3 control-label">Nama Mapel</label>
						<div class="col-md-9">
							<input type="text" class="form-control" name="namamapel" id="namamapel">
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
</section>

<script src="halaman/mapel/mapel_script.js" type="text/javascript"></script>