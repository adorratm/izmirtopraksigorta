<?php defined('BASEPATH') or exit('No direct script access allowed'); ?>
<form id="updateReservation" onsubmit="return false" method="post" enctype="multipart/form-data">
    <div class="form-group">
        <label>Randevu Tarihi</label>
        <input type="text" name="checkin" placeholder="Randevu Tarihi" class="form-control form-control-sm datetimepicker" data-flatpickr data-alt-input="true" data-enable-time="true" data-enable-seconds="true" value="<?= (!empty($item->checkin) ? $item->checkin : date("Y-m-d H:i:s")) ?>" data-default-date="<?= (!empty($item->checkin) ? $item->checkin : date("Y-m-d H:i:s")) ?>" data-date-format="Y-m-d H:i:S" required>
    </div>
    <div class="form-group">
        <label>Doğum Tarihi</label>
        <input type="text" name="birthday" placeholder="Doğum Tarihi" class="form-control form-control-sm datetimepicker" data-flatpickr data-alt-input="true" data-enable-time="true" data-enable-seconds="true" value="<?= (!empty($item->birthday) ? $item->birthday : date("Y-m-d H:i:s")) ?>" data-default-date="<?= (!empty($item->birthday) ? $item->birthday : date("Y-m-d H:i:s")) ?>" data-date-format="Y-m-d H:i:S" required>
    </div>
    <div class="form-group">
        <label>Adınız Soyadınız</label>
        <input class="form-control form-control-sm rounded-0" placeholder="Adınız Soyadınız" name="full_name" minlength="2" maxlength="70" value="<?=$item->full_name?>" required>
    </div>
    <div class="form-group">
        <label>Telefon Numaranız</label>
        <input class="form-control form-control-sm rounded-0" placeholder="Telefon Numaranız" name="phone" minlength="11" maxlength="19" value="<?=$item->phone?>" required>
    </div>
    <div class="form-group">
        <label>E-mail Adresiniz</label>
        <input class="form-control form-control-sm rounded-0" type="email" placeholder="E-mail Adresiniz" name="email" value="<?=$item->email?>" required>
    </div>
    <div class="form-group">
        <label>Cinsiyet</label>
        <select name="gender" id="gender" class="form-control form-control-sm rounded-0">
            <option value="ERKEK" <?=($item->gender == "ERKEK" ? "selected" : null)?>>Erkek</option>
            <option value="KADIN" <?=($item->gender == "KADIN" ? "selected" : null)?>>Kadın</option>
        </select>
    </div>
    <div class="form-group">
        <label>Randevu Notu</label>
        <textarea name="message" id="message" cols="30" rows="10" class="form-control"><?=$item->message?></textarea>
    </div>
    <button role="button" data-url="<?= base_url("reservations/update/$item->id"); ?>" class="btn btn-sm btn-outline-primary rounded-0 btnUpdate">Güncelle</button>
    <a href="javascript:void(0)" onclick="closeModal('#reservationModal')" class="btn btn-sm btn-outline-danger rounded-0n">İptal</a>
</form>