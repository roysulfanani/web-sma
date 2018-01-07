$(document).ready(function(){

	//alert("success");

	var Modul=$('section#section-dosen');

	selectDosen();
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
			url		:'halaman/dosen/dosen_proses.php',
			//data 	:{action:'commit',PR_ID:idguru,PR_NIP:nip,PR_NAMA:nama,PR_JK:jk,PR_ALAMAT:alamat,PR_TELPON:telpon,PR_MAPEL:mapel,PR_AKTIF:aktif},
			data :$("#formInput").serialize(),
			success :function(json){
				alert(json);
			},
			complete:function(){
				Modul.find('form#formInput')[0].reset();
				Modul.find('input#idDosen').val("");
				selectDosen();
				Modul.find("div#form").hide();
				Modul.find("div#list").fadeIn();
			}

		});

	});

});

function selectDosen(){
	var Modul=$('section#section-dosen');

	$.ajax({
		type :"POST",
		dataType :'json',
		url : "halaman/dosen/dosen_proses.php",
		data :{action:'viewDosen'},
		success :function(json){
			var no=0;
			Modul.find('table#tabelData tbody').empty();
			$.each(json, function(index, row) {
				no++;
				var isi = '<tr class="text-center">'+
								'<td>'+row.nip+'</td>'+
								'<td>'+row.nama_dosen+'</td>'+
								'<td>'+row.no_telpon+'</td>'+
								'<td>'+row.jenis_kelamin+'</td>'+
								'<td>'+row.tanggal_masuk_kerja+'</td>'+
								'<td><button class="btn btn-primary btn-xs edit" value="'+row.nip+'">edit</button>'+
								'<button class="btn btn-danger btn-xs hapus" value="'+row.nip+'"">delete</button></td>'+

							'</tr>';
					Modul.find('table#tabelData tbody').append(isi);

			});
			Modul.find(".hapus").click(function() {
			var nipDosen = $(this).val();
			var confirmText="Anda yakin akan menghapus data ini?";
			if(confirm(confirmText)) {
			$.ajax({
				type : "post",
				dataType : "json",
				url : "halaman/dosen/dosen_proses.php",
				data : {action : "delete", nip : nipDosen},
				success : function(){
					selectDosen();
						}
					});
				}
			});
		}
	});
}

function editData(nip){
	//alert(nip);
	var Modul=$('section#section-dosen');

	$.ajax({
		type 		:"POST",
		dataType 	:"json",
		url 		:"halaman/dosen/dosen_proses.php",
		data 		:{action:'viewEdit', id:nip},
		success 	:function(json){
			alert(json);
			Modul.find('input#idDosen').val(json[0].nip);
			Modul.find('input#tnip').val(json[0].nip);
			Modul.find('input#tnama').val(json[0].nama_dosen);
			Modul.find('input#ttelpon').val(json[0].no_telpon);
			Modul.find('input#talamat').val(json[0].alamat_dosen);
			Modul.find('input#jk').val(json[0].jk);
		},
		complete:function(){
			Modul.find("div#form").fadeIn();
			Modul.find("div#list").hide();
		}
	});
}
