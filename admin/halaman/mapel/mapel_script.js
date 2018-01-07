$(document).ready(function(){

	//alert("success");

	var Modul=$('section#section-mapel');

	selectMapel();
	selectMapel();

	Modul.find("div#form").hide();

	Modul.find('button#btnTambah').click(function(){
		Modul.find("div#list").hide()
		Modul.find("div#form").fadeIn(1000);


	});

	Modul.find('button#btnBatal').click(function(){
		Modul.find("div#form").hide()
		Modul.find("div#list").fadeIn();

	});

	Modul.find('button#btnsimpan').click(function(){
		/*var idguru = Modul.find('input#idGuru').val();
		var nip = Modul.find('input#tnip').val();
		var nama = Modul.find('input#tnama').val();
		var jk = Modul.find('input#L').val();
		var alamat = Modul.find('textarea#talamat').val();
		var telpon = Modul.find('input#ttelpon').val();
		var mapel = Modul.find('select#tmapel').val();
		var aktif = Modul.find('input#1').val();*/

		$.ajax({
			type 	:'POST',
			dataType:'json',
			url		:'halaman/mapel/mapel_proses.php',
			//data 	:{action:'commit',PR_ID:idguru,PR_NIP:nip,PR_NAMA:nama,PR_JK:jk,PR_ALAMAT:alamat,PR_TELPON:telpon,PR_MAPEL:mapel,PR_AKTIF:aktif},
			data :$("#formInput").serialize(),
			success :function(json){
				alert(json);
			},
			complete:function(){
				Modul.find('form#formInput')[0].reset();
				Modul.find('input#idMapel').val("");
				selectMapel();
				Modul.find("div#form").hide();
				Modul.find("div#list").fadeIn();
			}

		});

	});

});

function selectMapel(){
	var Modul=$('section#section-mapel');

	$.ajax({
		type :"POST",
		dataType :'json',
		url : "halaman/mapel/mapel_proses.php",
		data :{action:'viewMapel'},
		success :function(json){
			var no=0;
			Modul.find('table#tabeldata tbody').empty();
			$.each(json, function(index, row) {
				no++;
				var isi = '<tr class="text-center">'+
								'<td>'+row.idmapel+'</td>'+
								'<td>'+row.nama_mapel+'</td>'+
								'<td>'+row.aktif+'</td>'+
								'<td><button class="btn btn-primary btn-xs edit">edit</button>'+
								'<button class="btn btn-danger btn-xs hapus" value="'+row.idmapel+'"">delete</button></td>'+

							'</tr>';
					Modul.find('table#tabeldata tbody').append(isi);
			});
			Modul.find(".hapus").click(function() {
			var idmapel = $(this).val();
			var confirmText="Anda yakin akan menghapus data ini?";
			if(confirm(confirmText)) {
			$.ajax({
				type : "post",
				dataType : "json",
				url : "halaman/mapel/mapel_proses.php",
				data : {action : "delete", idmapel : idmapel},
				success : function(){
					selectMapel();
						}
					});
				}
			});
		}
	});
}

function editData(){
	//alert(nip);
	var Modul=$('section#section-mapel');

	$.ajax({
		type 		:"POST",
		dataType 	:"json",
		url 		:"halaman/mapel/mapel_proses.php",
		data 		:{action:'viewEdit', id:idmapel},
		success 	:function(json){
			alert(json);
			Modul.find('input#idMapel').val(json[0].idMapel);
			Modul.find('input#idmapel').val(json[0].idmapel);
			Modul.find('input#nama_mapel').val(json[0].nama_mapel);
		},
		complete:function(){
			Modul.find("div#form").fadeIn();
			Modul.find("div#list").hide();
		}
	});
}