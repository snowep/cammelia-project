/** @format */

$(function () {
	$(".modalUbah").on("click", function () {
		const npsn = $(this).data("npsn");

		$.ajax({
			url: "http://localhost:8080/cammelia-project/public/school/getEdit",
			data: { npsn: npsn },
			method: "POST",
			dataType: "json",
			success: function (data) {
				console.log(data);
				$("#npsnEdit").val(data.npsn);
				$("#nnsEdit").val(data.nns);
				$("#namaSekolah").val(data.name);
				$("#alamatSekolah").val(data.address);
			}
		});
	});

	$(".modalUbahUser").on("click", function () {
		const id = $(this).data("id");

		$.ajax({
			url: "http://localhost:8080/cammelia-project/public/user/getEdit",
			data: { id: id },
			method: "POST",
			dataType: "json",
			success: function (data) {
				console.log(data);
				$("#idEdit").val(data.id);
				$("#namaEdit").val(data.fullname);
				$("#emailEdit").val(data.email);
				$("#usernameEdit").val(data.username);
				$("#roleEdit").val(data.level);
				$("#statusEdit").val(data.status);
			}
		});
	});

	$.ajax({
		url: "http://localhost:8080/cammelia-project/public/user/getUserByUsername",
		dataType: "json",
		success: function (data) {
			console.log(data);
			//if data.level == admin
			if (data.level == "admin") {
				//make input readonly
				$("#namaEdit").prop("readonly", true);
				$("#emailEdit").prop("readonly", true);
				$("#usernameEdit").prop("readonly", true);
				$("#roleEdit").prop("readonly", true);
				$("#statusEdit").prop("readonly", true);
			}
			if (data.status != "active") {
				$("#buttonAdd").addClass("disabled");
				$("#buttonEdit").addClass("disabled");
				$("#buttonDelete").addClass("disabled");
			}
		}
	});
});
