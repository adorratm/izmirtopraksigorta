<?php defined('BASEPATH') or exit('No direct script access allowed'); ?>
<form id="createReservation" onsubmit="return false" method="post" enctype="multipart/form-data">
    <div class="form-group">
        <label>Randevu Tarihi</label>
        <input type="text" name="checkin" placeholder="Randevu Tarihi" class="form-control form-control-sm datetimepicker" data-flatpickr data-alt-input="true" data-enable-time="true" data-enable-seconds="true" value="<?= date("Y-m-d H:i:s") ?>" data-default-date="<?= date("Y-m-d H:i:s") ?>" data-date-format="Y-m-d H:i:S" required>
    </div>
    <div class="form-group">
        <label>Doğum Tarihi</label>
        <input type="text" name="birthday" placeholder="Doğum Tarihi" class="form-control form-control-sm datetimepicker" data-flatpickr data-alt-input="true" data-enable-time="true" data-enable-seconds="true" value="<?= date("Y-m-d H:i:s",strtotime("+1 Day")) ?>" data-default-date="<?= date("Y-m-d H:i:s",strtotime("+1 Day")) ?>" data-date-format="Y-m-d H:i:S" required>
    </div>
    <div class="form-group">
        <label>Adınız Soyadınız</label>
        <input class="form-control form-control-sm rounded-0" placeholder="Adınız Soyadınız" name="full_name" required>
    </div>
    <div class="form-group">
        <label>Telefon Numaranız</label>
        <input class="form-control form-control-sm rounded-0" placeholder="Telefon Numaranız" name="phone" required>
    </div>
    <div class="form-group">
        <label>E-mail Adresiniz</label>
        <input class="form-control form-control-sm rounded-0" placeholder="E-mail Adresiniz" name="email" required>
    </div>
    <div class="form-group">
        <label>Cinsiyet</label>
        <select name="gender" id="gender" class="form-control form-control-sm rounded-0">
            <option value="ERKEK">Erkek</option>
            <option value="KADIN">Kadın</option>
        </select>
    </div>
    <div class="form-group">
        <label>Randevu Notu</label>
        <textarea name="message" id="message" cols="30" rows="10" class="form-control"></textarea>
    </div>
    <button role="button" data-url="<?= base_url("reservations/save"); ?>" class="btn btn-sm btn-outline-primary rounded-0 btnSave">Kaydet</button>
    <a href="javascript:void(0)" onclick="closeModal('#reservationModal')" class="btn btn-sm btn-outline-danger rounded-0n">İptal</a>
</form>