$(document).ready(() => {
	$("#kode_wilayah").on("change", function (evt) {
		let url = $(this).data("url");
		let kode_wilayah = this.value;
		let getDesa = getJSON(url, { kode_wilayah });

		if (getDesa.status == "success") {
			let { data } = getDesa;
			let html = '<option value="">-- Pilih Desa -- </option>';
			data.forEach((item) => {
				html += `<option value='${item.id_desa}'>
                            ${item.nama_desa}
                        </option>`;
			});

			$("#id_desa").html(html);
			$("#id_desa").selectpicker("refresh");
		}
	});

	$("#id_desa").on("change", function (evt) {
		let jenis_pendaftaran = $("#jenis_pendaftaran").val();
		let url = $(this).data("url2");
		if (jenis_pendaftaran == 1) {
			url = $(this).data("url");
		} else if (jenis_pendaftaran == 5) {
			url = $(this).data("url3");
		}

		let id_desa = this.value;
		let getDesa = getJSON(url, { id_desa });

		let html = '<option value="">-- Pilih Sekolah Tujuan -- </option>';
		if (getDesa.status == "success") {
			let { data } = getDesa;
			data.forEach((item) => {
				html += `<option value='${item.id_sekolah}'>
                            ${item.nama_sekolah}
                        </option>`;
			});
		}

		$("#sekolah_tujuan").html(html);
		$("#sekolah_tujuan").selectpicker("refresh");
	});

	$("#sekolah_tujuan").on("change", function () {
		let url = $("form").data("baseurl") + "/getKuotaZonasi";
		let id_sekolah = this.value;
		let zonasi = $("#jenis_pendaftaran").val();
		let getKuota = getJSON(url, { id_sekolah });

		if (getKuota.status == "success") {
			let { data } = getKuota;
			let kuota;

			switch (zonasi) {
				case "1":
					kuota = data[0].sisa_zonasi;
					break;
				case "2":
					kuota = data[0].sisa_afirmasi;
					break;
				case "3":
					kuota = data[0].sisa_pindahan;
					break;
				case "4":
					kuota = data[0].sisa_prestasi;
					break;
				case "5":
					kuota = data[0].sisa_umum;
					break;
				default:
					break;
			}

			if (kuota < 1) {
				Swal.fire("Gagal!", "Kuota sudah penuh", "error");
				$("#btn").attr("disabled", true);
			} else {
				$("#btn").attr("disabled", false);
			}

			let alert = `<h4 class=".text-secondary">Sisa Kuota : ${kuota} siswa</h3>`;
			$("#sisa_kuota").empty().append(alert);
		}
	});

	$("#jenis_pendaftaran").on("change", function () {
		let id_sekolah = $("#sekolah_tujuan").val();

		if (id_sekolah !== "") {
			let url = $("form").data("baseurl") + "/getKuotaZonasi";
			let zonasi = $("#jenis_pendaftaran").val();
			let getKuota = getJSON(url, { id_sekolah });

			if (getKuota.status == "success") {
				let { data } = getKuota;
				let kuota;

				switch (zonasi) {
					case "1":
						kuota = data[0].sisa_zonasi;
						break;
					case "2":
						kuota = data[0].sisa_afirmasi;
						break;
					case "3":
						kuota = data[0].sisa_pindahan;
						break;
					case "4":
						kuota = data[0].sisa_prestasi;
						break;
					case "5":
						kuota = data[0].sisa_umum;
						break;
					default:
						break;
				}

				if (kuota < 1) {
					Swal.fire("Gagal!", "Kuota sudah penuh", "error");
					$("#btn").attr("disabled", true);
				} else {
					$("#btn").attr("disabled", false);
				}
			}
		}
	});
});
