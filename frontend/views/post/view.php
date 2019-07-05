<?php
use yii\helpers\Html;
?>

<?= $this->render('../layouts/banner', [
    'post' => $post,
    'lang_data' => $lang_data,
    'all_info' => $all_info
])?>
