$(document).ready(function(){

	//alert("success");

	var Modul=$('section#section-informasi');

	selectInformasi();

	Modul.find("div#form").hide();

	Modul.find('button#btnTambah').click(function(){
		Modul.find("div#list").hide()
		Modul.find("div#form").fadeIn();


	});

	Modul.find('button#btnBatal').click(function(){
		Modul.find("div#form").hide()
		Modul.find("div#list").fadeIn();

	});
		Modul.find('button#btnsimpan').click(function(){
		var isi = CKEDITOR.instances.tisi.getData();
		var dataString = $("#formInput").serialize();
		dataString += '&PR_ISI='+isi;

		$.ajax({
			type 	:'POST',
			dataType:'json',
			url		:'halaman/informasi/informasi_proses.php',
			data : dataString,
			success :function(json){
				alert(json);
			},
			complete:function(){
				Modul.find('form#formInput')[0].reset();
				Modul.find('input#idinformasi').val("");
				selectInformasi();
				Modul.find("div#form").hide();
				Modul.find("div#list").fadeIn();
			}

		});

	});

});



function selectInformasi(){
	var Modul=$('section#section-informasi');

	$.ajax({
		type :"POST",
		dataType :'json',
		url : "halaman/informasi/informasi_proses.php",
		data :{action:'viewInformasi'},
		success :function(json){
			var no=1;
			Modul.find('table#tabelData tbody').empty();
			$.each(json, function(index, row) {
				var icon;
				if (row.aktif == 1) {
						icon = "<span class=\"glyphicon glyphicon-ok\"></span>";
					}else{
						icon = "<span class=\"glyphicon glyphicon-remove\"></span>";
					}

				var isi =   '<tr class="text-center">'+
								'<td>'+(no++)+'</td>'+
								'<td>'+row.judul+'</td>'+
								'<td>'+icon+'</td>'+
								'<td><button class="btn btn-primary btn-xs edit" onclick="editData('+row.idinformasi+')">edit</button>'+  
								  '<button class="btn btn-danger btn-xs hapus" value="'+row.idinformasi+'">delete</button></td>'+
							'</tr>';
					Modul.find('table#tabelData tbody').append(isi);
				});

					Modul.find("hapus").click(function() {
					var id = $(this).val();
					$.ajax({
					type : "post",
					dataType : "json",
					url : "halaman/informasi/informasi_proses.php",
					data : {action : "delete", id:id},
					success : function(){
					selectInformasi();
							}
						});
					});


		}
	});
}