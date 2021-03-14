<?php defined('BASEPATH') or exit('No direct script access allowed'); ?>
<div class="container-fluid mt-xl-50 mt-lg-30 mt-15 bg-white p-3">
    <div class="row">
        <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
            <h4 class="mb-3">
                Rezervasyon Listesi
                <a href="javascript:void(0)" data-url="<?= base_url("reservations/new_form"); ?>" class="float-right btn btn-sm btn-outline-primary rounded-0 createReservationBtn"><i class="fa fa-plus"></i>Yeni Ekle</a>
            </h4>
        </div><!-- END column -->
        <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
            <form id="filter_form" onsubmit="return false">
                <div class="d-flex flex-wrap">
                    <label for="search" class="flex-fill mx-1">
                        <input class="form-control form-control-sm rounded-0" placeholder="Arama Yapmak İçin Metin Girin." type="text" onkeypress="return runScript(event,'reservationTable')" name="search">
                    </label>
                    <label for="clear_button" class="mx-1">
                        <button class="btn btn-sm btn-outline-danger rounded-0 " onclick="clearFilter('filter_form','reservationTable')" id="clear_button" data-toggle="tooltip" data-placement="top" data-title="Filtreyi Temizle" data-original-title="" title=""><i class="fa fa-eraser"></i></button>
                    </label>
                    <label for="search_button" class="mx-1">
                        <button class="btn btn-sm btn-outline-success rounded-0 " onclick="reloadTable('reservationTable')" id="search_button" data-toggle="tooltip" data-placement="top" data-title="Ürün Ara"><i class="fa fa-search"></i></button>
                </div>
            </form>
            <table class="table table-hover table-striped table-bordered content-container reservationTable">

                <thead>
                    <th class="order"><i class="fa fa-reorder"></i></th>
                    <th class="order"><i class="fa fa-reorder"></i></th>
                    <th class="w50">#id</th>
                    <th>Adı Soyadı</th>
                    <th>Telefon Numarası</th>
                    <th>E-mail Adresi</th>
                    <th>Cinsiyet</th>
                    <th>Randevu Notu</th>
                    <th>Doğum Tarihi</th>
                    <th>Randevu Tarihi</th>
                    <th>Durum</th>
                    <th>Oluşturulma Tarihi</th>
                    <th>Güncelleme Tarihi</th>
                    <th class="nosort">İşlem</th>
                </thead>
                <tbody>
                </tbody>

            </table>
            <script>
                function obj(d) {
                    let appendeddata = {};
                    $.each($("#filter_form").serializeArray(), function() {
                        d[this.name] = this.value;
                    });
                    return d;
                }
                $(document).ready(function() {
                    TableInitializerV2("reservationTable", obj, {}, "<?= base_url("reservations/datatable") ?>", "<?= base_url("reservations/rankSetter") ?>", true);

                });
            </script>
        </div><!-- .widget -->
    </div><!-- END column -->
</div>

<div id="reservationModal"></div>

<script>
	$(document).ready(function() {
		$(document).on("click", ".createReservationBtn", function(e) {
			e.preventDefault();
			e.stopImmediatePropagation();
			let url = $(this).data("url");
			$('#reservationModal').iziModal('destroy');
			createModal("#reservationModal", "Yeni Rezervasyon Ekle", "Yeni Rezervasyon Ekle", 600, true, "20px", 0, "#e20e17", "#fff", 1040, function() {
				$.post(url, {}, function(response) {
					$("#reservationModal .iziModal-content").html(response);
					TinyMCEInit();
					flatPickrInit();
					$(".tagsInput").select2({
						width: 'resolve',
						theme: "classic",
						tags: true,
						tokenSeparators: [',', ' ']
					});
				});
			});
			openModal("#reservationModal");
			$("#reservationModal").iziModal("setFullscreen", false);
		});
		$(document).on("click", ".btnSave", function(e) {
			e.preventDefault();
			e.stopImmediatePropagation();
			let url = $(this).data("url");
			let formData = new FormData(document.getElementById("createReservation"));
			createAjax(url, formData, function() {
				closeModal("#reservationModal");
				$("#reservationModal").iziModal("setFullscreen", false);
				reloadTable("reservationTable");
			});
		});
		$(document).on("click", ".updateReservationBtn", function(e) {
			e.preventDefault();
			e.stopImmediatePropagation();
			$('#reservationModal').iziModal('destroy');
			let url = $(this).data("url");
			createModal("#reservationModal", "Rezervasyon Düzenle", "Rezervasyon Düzenle", 600, true, "20px", 0, "#e20e17", "#fff", 1040, function() {
				$.post(url, {}, function(response) {
					$("#reservationModal .iziModal-content").html(response);
					TinyMCEInit();
					flatPickrInit();
					$(".tagsInput").select2({
						width: 'resolve',
						theme: "classic",
						tags: true,
						tokenSeparators: [',', ' ']
					});
				});
			});
			openModal("#reservationModal");
			$("#reservationModal").iziModal("setFullscreen", false);
		});
		$(document).on("click", ".btnUpdate", function(e) {
			e.preventDefault();
			e.stopImmediatePropagation();
			let url = $(this).data("url");
			let formData = new FormData(document.getElementById("updateReservation"));
			createAjax(url, formData, function() {
				closeModal("#reservationModal");
				$("#reservationModal").iziModal("setFullscreen", false);
				reloadTable("reservationTable");
			});
		});
	});
</script>