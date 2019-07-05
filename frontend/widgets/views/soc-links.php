<ul>
    <?php foreach($soc_links as $link): ?>
        <li><a href="<?= $link['url_link']?>" title="<?= $link['name_link']?>" target="_blank"><i class="fa <?= $link['class_link']?>" aria-hidden="true"></i></a></li>
   <?php endforeach; ?>
</ul>