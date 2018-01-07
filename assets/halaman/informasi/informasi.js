$(document).ready(function() {
	//alert("Sukses");

	var Modul = $('section#section-informasi');

	selectinformasi();

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
				var isi = CKEDITOR.instances.ckedtor.getData();
				var datastring = $("#forminput").serialize();
				datastring += '&PR_isi='+isi;
				//alert("test");
				$.ajax({
					type 	: "POST",
					dataType 	: 'json',
					url 		: "halaman/informasi/informasi_proses.php",
					/*data 		:{action:'commit', PR_ID:idguru, PR_NIP:nip,PR_NAMA:nama,PR_JK:jk,PR_ALAMAT:alamat,PR_MAPEL:mapel,PR_AKTIF:aktif},*/
					data 		:datastring,
					success 	: function(json) {
						alert(json);
					},
					complete:function() {
						Modul.find("form#forminput")[0].reset();
						Modul.find("input#idinfo").val("");
						selectinformasi();
						Modul.find("div#form").hide();
						Modul.find("div#list").fadeIn();
					}

			});
	});
});


function selectinformasi() {
	var Modul = $('section#section-informasi');

	$.ajax({
		type 	: "POST",
		dataType 	: 'json',
		url 		: "halaman/informasi/informasi_proses.php",
		data 		:{action:'viewinformasi'},
		success 	: function(json) {
			//alert(json);
			var no=0;
			Modul.find('table#tabelData tbody').empty() ;
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
								'<td>'+row.judul+'</td>'+
								'<td>'+row.isi+'</td>'+
								'<td>'+icon+'</td>'+
								'<td><button type="button" class="btn btn-warning btn-xs edit" onclick="editData('+row.idinformasi+')">edit</button> <button type="button" class="btn btn-danger btn-xs hapus" value="'+row.idinformasi+'")">delete</button></td>'+
							'</tr>';

				Modul.find('table#tabelData tbody').append(isi);
				});
				Modul.find("button.hapus").click(function(){
					var id = $(this).val();
					var confirmText = "Anda yakin akan menghapus data ini?"
					if (confirm(confirmText)) {
						$.ajax({
							type 		: "POST",
							dataType	: "json",
							url			: "halaman/informasi/informasi_proses.php",
							data 		: {action:"delete", id : id},
							success		: function() {
								selectinformasi();
							}
						});
					}
				});
			}
		});
	}