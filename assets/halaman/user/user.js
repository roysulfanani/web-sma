$(document).ready(function() {
	//alert("Sukses");

	var Modul = $('section#section-user');

	Modul.find("div#form").hide();

	Modul.find('button#btnTambah').click(function() {
			Modul.find("div#list").hide();
			Modul.find("div#form").fadeIn();
		});

Modul.find('button#btnBatal').click(function() {
			Modul.find("div#form").hide();
			Modul.find("div#list").fadeIn();
		});
});