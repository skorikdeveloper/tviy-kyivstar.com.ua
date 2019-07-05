
<div class="widget-need-help" style="background-image: url(<?= $all_info['bgc_img']?>)">
    <div class="container">
        <div class="row">
            <div class="col-md-6">

                <i class="fa fa-question-circle-o"></i>

                <p><?= $all_info['first_text']?></p>
                <p><?= $all_info['second_text']?></p>
                <div class="contacts">
                    <a href="tel:<?= str_replace("+", "", str_replace(" ", "", $all_info['tel']));?>"><?= $all_info['tel']?></a>
                    <p><?= $all_info['working_hours']?></p>
                </div>
            </div>
        </div>
    </div>
</div>

