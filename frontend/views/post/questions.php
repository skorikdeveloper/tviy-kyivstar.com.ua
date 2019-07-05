<?php
use yii\helpers\Html;
?>

<?= $this->render('../layouts/banner', [
    'post' => $post,
    'lang_data' => $lang_data,
    'all_info' => $all_info
])?>

<div class="site" id="questions-page">
    <div class="container">
        <div class="row">
            <div class="col-md-12">

                <?php foreach ($all_info['question_blocks'] as $question_block) {
                    echo '<div class="accordion-wrapper">';
                    echo '<h2 class="text-center title_block">'.$question_block['title_block'].'</h2>';
                ?>
                    <ul class="accordion">
                        <?php foreach ($question_block['questions'] as $row) :?>
                        <li>
                            <a href="#" rel="nofollow" class="accordion-href"><?= $row['question']?> <i class="fa fa-plus-square"></i><i class="fa fa-minus-square"></i></a>
                            <div class="accordion-content"><?= $row['answer']?></div>
                        </li>
                        <?php endforeach;?>
                    </ul>

                <?php echo '</div>'; } ?>

            </div>
        </div>
    </div>
</div>
