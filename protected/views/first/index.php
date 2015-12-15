<?php

?>

<!--<form action="" method="post">
    <input type="text">
</form>-->
<form action="<?=Yii::app()->request->baseUrl;?>/first/create" method="post" >
    <div class="col-lg-12 col-md-12 col-xs-12 col-sm-12 all_column">
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
                    <i class="remove remove_column fa fa-minus"></i>
                </div>
            </div>

    <?php
}

?>
    </div>
    <div class="add_column"><span class="fa fa-plus"></span></div>
    <input type="submit" name="add" class="add_button pull-right">
</form>
<div hidden class="base_url">
    <?=Yii::app()->request->baseUrl;?>
</div>

<script>
    $(document).on('click','.remove_column',function() {
        var id = $(this).parent().parent().children('.id').text();


        if(id=='new'){
            $(this).parent().parent().remove();
        }else{

            var base_url = $('.base_url').text();
            $.post(base_url + '/index.php?r=first/delete', {id: id}, function (data) {
                if (data == 1) {
                    window.location.href = "";
                }
            });
        }


    });

i=1
    $('.add_column').on('click',function() {
         i++;
        $('.all_column').append('<div class="col-lg-12 col-md-12 col-xs-12 col-sm-12">' +
            '<div class="col-lg-2 col-md-2 col-xs-12 col-sm-12 id" hidden>new</div>' +
            '<div class="col-lg-2 col-md-2 col-xs-12 col-sm-12"><input type="text" class="form-control" name="test['+i+'][order_id]"></div>' +
            '<div class="col-lg-2 col-md-2 col-xs-12 col-sm-12"><input type="text" class="form-control" name="test['+i+'][price]"></div>' +
            '<div class="col-lg-2 col-md-2 col-xs-12 col-sm-12"><input type="text" class="form-control" name="test['+i+'][description]"></div>' +
            '<div class="col-lg-2 col-md-2 col-xs-12 col-sm-12"><input type="checkbox" name="test['+i+'][available]" value="1"></div>' +
            '<div class="col-lg-2 col-md-2 col-xs-12 col-sm-12">' +
            '<i class="remove remove_column fa fa-minus"></i></div></div>');
        var base_url = $('.base_url').text();

    });
    $('.add_button').on('click',function(){

    });

</script>



