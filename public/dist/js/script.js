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
});
