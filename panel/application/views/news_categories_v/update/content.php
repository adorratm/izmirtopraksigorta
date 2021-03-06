<?php defined('BASEPATH') or exit('No direct script access allowed'); ?>
<form id="updateNewsCategory" onsubmit="return false" action="" method="post">
    <div class="mb-3 nav-tabs-horizontal">
        <ul class="nav nav-tabs mb-3" id="myTab" role="tablist">
            <?php foreach($settings as $key =>$value):?>
            <li class="nav-item" role="presentation">
                <a class="nav-link <?= ($key == 0 ? 'active' : null )?>" id="lang-<?=$value->lang?>-tab" data-toggle="tab" href="#lang-<?=$value->lang?>" role="tab" aria-controls="lang-<?=$value->lang?>" aria-selected="true">Dil : <?=$value->lang?></a>
            </li>
            <?php endforeach;?>
        </ul>
        <div class="tab-content" id="myTabContent">
            <?php foreach($settings as $key =>$value):?>
                <?php $lang = $value->lang; ?>
                <div class="tab-pane fade <?= ($key == 0 ? 'show active' : null )?>" id="lang-<?=$lang?>" role="tabpanel" aria-labelledby="lang-<?=$lang?>-tab">
                    <div class="form-group">
                        <label>Başlık </label>
                        <input class="form-control form-control-sm rounded-0" placeholder="Başlık [Dil : <?=$lang?>]" name="title[<?=$lang?>]" value="<?= $item->title->$lang; ?>" required>
                    </div>
                </div>
            <?php endforeach?>
        </div>
    <button role="button" data-url="<?= base_url("news_categories/update/{$item->id}"); ?>" class="btn btn-sm btn-outline-primary rounded-0 btnUpdate">Güncelle</button>
    <a href="javascript:void(0)" onclick="closeModal('#newsCategoryModal')" class="btn btn-sm btn-outline-danger rounded-0">İptal</a>
    </div>
</form>