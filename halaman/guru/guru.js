$(document).ready(function(){

	//alert("success");

	var Modul=$('section#section-guru');

	Modul.find("div#form").hide();

	Modul.find('button#btnTambah').click(function(){
		Modul.find("div#list").hide()
		Modul.find("div#form").fadeIn();


	});

	Modul.find('button#btnBatal').click(function(){
		Modul.find("div#form").hide()
		Modul.find("div#list").fadeIn();

	});

});

function selectGuru (){
	var Modul=$('section#section-guru');

	$.ajax(){
		type :"POST",
		dataType :'json',
		url : "halaman/guru/guru_proses.php",
		data :[action:'viewGuru'],
		success :function(json){
			var no :0;
			Modul.find('table#tabelData tbody').empty();
			$.each(json, function(index, row) {
				no++;
				var isi = '<tr>'+
								'<td>'+row.nip+'</td>'+
								'<td>'+row.nama+'</td>'+
								'<td>'+row.telpon+'</td>'+
								'<td>'+row.zktif+'</td>'+
								'<td>edit-delete</td>'+
							'</tr>'+

			}
		}
	}
}