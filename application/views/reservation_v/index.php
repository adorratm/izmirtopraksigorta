<?php defined('BASEPATH') or exit('No direct script access allowed'); ?>
<div class="page-banner-area item-bg1">
    <div class="d-table">
        <div class="d-table-cell">
            <div class="container">
                <div class="page-banner-content">
                    <h2><?= $languageJSON["reservation"]["reservation"]["value"] ?></h2>
                    <ul>
                        <li><a href="<?= base_url(); ?>" title="<?= strto("lower|upper", $languageJSON["routes"]["anasayfa"]) ?>"><?= strto("lower|upper", $languageJSON["routes"]["anasayfa"]) ?></a></li>
                        <li><?= $languageJSON["reservation"]["reservation"]["value"] ?></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>

<section class="book-appointment-area ptb-100">
    <div class="container">
        <div class="row">
            <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
                <div class="book-appointment-form">
                    <h2><?= $languageJSON["reservation"]["reservation"]["value"] ?></h2>
                    <form onsubmit="return false" id="checkinform" enctype="multipart/form-data" method="POST">
                        <div class="row">
                            <div class="col-12 col-sm-12 col-md-12 col-lg-6 col-xl-6">
                                <div class="form-group">
                                    <label><?= $languageJSON["reservationForm"]["namesurname"]["value"] ?></label>
                                    <input type="text" placeholder="<?= $languageJSON["reservationForm"]["namesurname"]["value"] ?>" name="full_name" minlength="2" maxlength="70" class="form-control" required>
                                </div>
                            </div>
                            <div class="col-12 col-sm-12 col-md-12 col-lg-6 col-xl-6">
                                <div class="form-group">
                                    <label><?= $languageJSON["reservationForm"]["emailaddress"]["value"] ?></label>
                                    <input type="email" placeholder="<?= $languageJSON["reservationForm"]["emailaddress"]["value"] ?>" name="email" class="form-control" required>
                                </div>
                            </div>
                            <div class="col-12 col-sm-12 col-md-12 col-lg-6 col-xl-6">
                                <div class="form-group">
                                    <label><?= $languageJSON["reservationForm"]["emailaddress"]["value"] ?></label>
                                    <input type="text" placeholder="<?= $languageJSON["reservationForm"]["phonenumber"]["value"] ?>" name="phone" minlength="11" maxlength="19" class="form-control" required>
                                </div>
                            </div>
                            <div class="col-12 col-sm-12 col-md-12 col-lg-6 col-xl-6">
                                <label><?= $languageJSON["reservationForm"]["gender"]["value"] ?></label>
                                <div class="form-group">
                                    <select name="gender">
                                        <option value="ERKEK"><?= $languageJSON["reservationForm"]["genderMale"]["value"] ?></option>
                                        <option value="KADIN"><?= $languageJSON["reservationForm"]["genderFemale"]["value"] ?></option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-12 col-sm-12 col-md-12 col-lg-6 col-xl-6">
                                <div class="form-group">
                                    <label><?= $languageJSON["reservationForm"]["birthday"]["value"] ?></label>
                                    <input type="text" name="birthday" class="date-pick form-control" value="<?= date('Y-m-d H:i:s', strtotime('+1 day', time())) ?>" data-default-date="<?= date('Y-m-d H:i:s', strtotime('+1 day', time())) ?>" data-flatpickr data-enable-time="true" data-enable-seconds="true" data-date-format="Y-m-d H:i:S" required>
                                </div>
                            </div>
                            <div class="col-12 col-sm-12 col-md-12 col-lg-6 col-xl-6">
                                <div class="form-group">
                                    <label><?= $languageJSON["reservationForm"]["checkin"]["value"] ?></label>
                                    <input type="text" name="checkin" class="date-pick form-control" value="<?= date('Y-m-d H:i:s', strtotime('+1 day', time())) ?>" data-default-date="<?= date('Y-m-d H:i:s', strtotime('+1 day', time())) ?>" data-flatpickr data-enable-time="true" data-enable-seconds="true" data-date-format="Y-m-d H:i:S" required>
                                </div>
                            </div>
                            <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                <div class="form-group">
                                    <label><?= $languageJSON["reservationForm"]["note"]["value"] ?></label>
                                    <textarea name="message" class="form-control" placeholder="<?= $languageJSON["reservationForm"]["note"]["value"] ?>"></textarea>
                                </div>
                            </div>
                            <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                <div class="banner-btn">
                                    <a href="javascript:void(0)" data-url="<?= base_url($languageJSON["routes"]["rezervasyon-yap"]) ?>" title="<?= $languageJSON["reservationForm"]["makereservation"]["value"] ?>" class="default-btn makeReservation"><?= $languageJSON["reservationForm"]["makereservation"]["value"] ?></a>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>