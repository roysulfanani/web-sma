$(document).ready(function() {
	//alert("Sukses");

	var Modul = $('section#section-mapel');

	//selectguru();
	selectMapel();
	
	Modul.find("div#form").hide();

	Modul.find('button#btnTambah').click(function() {
			Modul.find("div#list").hide();
			Modul.find("div#form").fadeIn();
		});

	Modul.find('button#btnBatal').click(function() {
				Modul.find("div#form").hide();
				Modul.find("div#list").fadeIn();
			});

	Modul.find('button#btnSimpan').click(function() {
				/*var idguru =Modul.find('input#idGuru').val();
				var nip =Modul.find('input#tnip').val();
				var nama =Modul.find('input#tnama').val();
				var jk =Modul.find('div#jk').val();
				var alamat =Modul.find('textarea#talamat').val();
				var mapel =Modul.find('input#tmapel').val();
				var aktif =Modul.find('input#aktif').val();*/
				//alert("test");
				$.ajax({
					type 	: "POST",
					dataType 	: 'json',
					url 		: "halaman/mapel/mapel_proses.php",
					/*data 		:{action:'commit', PR_ID:idguru, PR_NIP:nip,PR_NAMA:nama,PR_JK:jk,PR_ALAMAT:alamat,PR_MAPEL:mapel,PR_AKTIF:aktif},*/
					data 		:$("#forminput").serialize(),
					success 	: function(json) {
						//alert(json);
					},
					complete:function() {
						Modul.find("form#forminput")[0].reset();
						Modul.find("input#idmapel").val("");
						selectMapel();
						Modul.find("div#form").hide();
						Modul.find("div#list").fadeIn();
					}

			});
		

	});

	function selectMapel() {
		var Modul = $('section#section-mapel');

		$.ajax({
			type 		: "POST",
			dataType 	: 'json',
			url 		: "halaman/mapel/mapel_proses.php",
			data 		:{action:'viewMapel'},
			success 	: function(json) {
				//alert(json);
				var no=0;
				Modul.find('table#tabelData tbody').empty();
				$.each(json, function(index, row) {
					no++;
					var icon;
					if (row.aktif == 1) {
						icon = "<span class=\"glyphicon glyphicon-ok\" style=\"color:blue\"></span>";
					} else {
						icon = "<span class=\"glyphicon glyphicon-remove\" style=\"color:red\"></span>";
					}
					var isi = 	'<tr>'+
									'<td>'+no+'</td>'+
									'<td>'+row.nama_mapel+'</td>'+
									'<td>'+icon+'</td>'+
									'<td><button type="button" class="btn btn-warning btn-xs edit" onclick="editData('+row.idmapel+')">edit</button> <button type="button" class="btn btn-danger btn-xs hapus" value="'+row.nip+'" onclick="return confirm(\'Apakah anda yakin akan menghapus data?\')">delete</button></td>'+
								'</tr>';

					Modul.find('table#tabelData tbody').append(isi);
				});

				Modul.find("button.hapus").click(function(){
					var id = $(this).val();
					$.ajax({
						type 		: "POST",
						dataType	: "json",
						url			: "halaman/mapel/mapel_proses.php",
						data 		: {action:"delete", idmapel : id},
						success		: function() {
							selectMapel();
						}
					});
				});
				
			}
		});
	}

});

function editData(idmapel) {
	//alert(idmapel);
	var Modul=$('section#section-mapel');	
	$.ajax({
		type 		: "POST",
		dataType	: 'json',
		url			: "halaman/mapel/mapel_proses.php",
		data 		: {action:'viewEdit', idmapel:idmapel},
		success		: function(json) {
			Modul.find('input#idmapel').val(json[0].idmapel);
			Modul.find('input#tnama').val(json[0].nama_mapel);
			Modul.find('div#aktif').val(json[0].aktif);
		},
		complete:function(){
			Modul.find("div#form").fadeIn();
			Modul.find("div#list").hide();
		}
	});
}

/*function selectMapel(){
	var Modul = $('section#section-guru');
	Modul.find("select#tmapel").empty();

		$.ajax({
			type 		: "POST",
			dataType 	: 'json',
			url 		: "halaman/guru/guru_proses.php",
			data 		:{action:'viewMapel'},
			success 	: function(json) {
				//alert(json);
				var isiOption = '<option value="">- Pilih Mapel -</option>';
				$.each(json, function(index, row) {
					isiOption += '<option value="'+row.idmapel+'">'+row.nama_mapel+'</option>';
				});

				Modul.find("select#tmapel").append(isiOption);
			}
		}); 
}*/