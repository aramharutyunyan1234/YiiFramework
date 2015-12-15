<?php

?>

<!--<form action="" method="post">
    <input type="text">
</form>-->

<?php
foreach($migr_selects as $migr_select){
    ?>
    <div class="col-lg-12 col-md-12 col-xs-12 col-sm-12">
        <div class="col-lg-2 col-md-2 col-xs-12 col-sm-12 id" hidden><?=$migr_select['id']?></div>
        <div class="col-lg-2 col-md-2 col-xs-12 col-sm-12"><?=$migr_select['order_id']?></div>
        <div class="col-lg-2 col-md-2 col-xs-12 col-sm-12"><?=$migr_select['price']?></div>
        <div class="col-lg-2 col-md-2 col-xs-12 col-sm-12"><?=$migr_select['description']?></div>
        <div class="col-lg-2 col-md-2 col-xs-12 col-sm-12"><input type="checkbox" <?=($migr_select['available']==1) ? 'checked':''?>></div>
        <div class="col-lg-2 col-md-2 col-xs-12 col-sm-12">
            <span class="remove remove_column fa fa-minus">-</span>
        </div>
    </div>

    <?php
}

?>
<div hidden class="base_url">
    <?=Yii::app()->request->baseUrl;?>
</div>

<script>
    $('.remove_column').on('click',function(){
        var id = $(this).parent().parent().children('.id').text();
        var base_url=$('.base_url').text();
        $.post(base_url+'/index.php?r=first/delete',{id:id},function(data){
            if(data==1){
                window.location.href = "";
            }
        });



//        $.ajax()
    })
</script>



