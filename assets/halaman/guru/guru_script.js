$(document).ready(function() {
	//alert("Sukses");

	var Modul = $('section#section-guru');

	selectguru();
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
					url 		: "halaman/guru/guru_proses.php",
					/*data 		:{action:'commit', PR_ID:idguru, PR_NIP:nip,PR_NAMA:nama,PR_JK:jk,PR_ALAMAT:alamat,PR_MAPEL:mapel,PR_AKTIF:aktif},*/
					data 		:$("#forminput").serialize(),
					success 	: function(json) {
						//alert(json);
					},
					complete:function() {
						Modul.find("form#forminput")[0].reset();
						Modul.find("input#idGuru").val("");
						selectguru();
						Modul.find("div#form").hide();
						Modul.find("div#list").fadeIn();
					}

			});
		

	});

	function selectguru() {
		var Modul = $('section#section-guru');

		$.ajax({
			type 		: "POST",
			dataType 	: 'json',
			url 		: "halaman/guru/guru_proses.php",
			data 		:{action:'viewguru'},
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
									'<td>'+row.nama+'</td>'+
									'<td>'+row.alamat+'</td>'+
									'<td>'+icon+'</td>'+
									'<td><button type="button" class="btn btn-warning btn-xs edit" onclick="editData('+row.nip+')">edit</button> <button type="button" class="btn btn-danger btn-xs hapus" value="'+row.nip+'">delete</button></td>'+
								'</tr>';

					Modul.find('table#tabelData tbody').append(isi);
				});

				Modul.find("button.hapus").click(function(){
					var nipguru = $(this).val();
					var confirmText = "Anda yakin akan menghapus data ini?"
					if (confirm(confirmText)) {
						$.ajax({
							type 		: "POST",
							dataType	: "json",
							url			: "halaman/guru/guru_proses.php",
							data 		: {action:"delete", nip : nipguru},
							success		: function() {
								selectguru();
							}
						});
					}
				});
				
			}
		});
	}

});

function editData(nip) {
	alert(nip);
	var Modul=$('section#section-guru');	
	$.ajax({
		type 		: "POST",
		dataType	: 'json',
		url			: "halaman/guru/guru_proses.php",
		data 		: {action:'viewEdit', nip:nip},
		success		: function(json) {
			Modul.find('input#idGuru').val(json[0].nip);
			Modul.find('input#tnip').val(json[0].nip);
			Modul.find('input#tnama').val(json[0].nama);
			Modul.find('textarea#talamat').val(json[0].alamat);
			Modul.find('select#tmapel').val(json[0].mapel);
		},
		complete:function(){
			Modul.find("div#form").fadeIn();
			Modul.find("div#list").hide();
		}
	});
}

function selectMapel(){
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
}