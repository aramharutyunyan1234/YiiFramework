<span>Order ID </span><span class="order_id"><?=$order_id?></span>
<a href="orders/add_orders"></a>
<form action="<?=Yii::app()->request->baseUrl;?>/orders/create" method="post" id="orders_form" >
    <div class="col-lg-12 col-md-12 col-xs-12 col-sm-12 all_column">
        <div class="col-lg-12 col-md-12 col-xs-12 col-sm-12">
            <div class="col-lg-2 col-md-2 col-xs-12 col-sm-12 id" ><b><span>ID</span></b></div>
            <div class="col-lg-2 col-md-2 col-xs-12 col-sm-12" hidden><b><span>Order ID</span></b></div>
            <div class="col-lg-2 col-md-2 col-xs-12 col-sm-12"><b><span>Price</span></b></div>
            <div class="col-lg-2 col-md-2 col-xs-12 col-sm-12"><b><span>Description</span></b></div>
            <div class="col-lg-2 col-md-2 col-xs-12 col-sm-12"><b><span>Available</span></b></div>
            <div class="col-lg-2 col-md-2 col-xs-12 col-sm-12">
                <b><i class="remove remove_column ">Remove</i></b>
            </div>
        </div>
<?php
foreach($migr_selects as $migr_select){
    ?>
            <div class="col-lg-12 col-md-12 col-xs-12 col-sm-12">
                <div class="col-lg-2 col-md-2 col-xs-12 col-sm-12 id" ><?=$migr_select['id']?></div>
                <div class="col-lg-2 col-md-2 col-xs-12 col-sm-12" hidden><?=$migr_select['order_id']?></div>
                <div class="col-lg-2 col-md-2 col-xs-12 col-sm-12"><?=$migr_select['price']?></div>
                <div class="col-lg-2 col-md-2 col-xs-12 col-sm-12"><?=$migr_select['description']?></div>
                <div class="col-lg-2 col-md-2 col-xs-12 col-sm-12"><?=($migr_select['available']==1) ? '<span class="fa fa-check-square-o"></span>':'<span class="fa fa-square-o"></span>'?></div>
                <div class="col-lg-2 col-md-2 col-xs-12 col-sm-12">
                    <i class="remove remove_column fa fa-minus"></i>
                    <a href="<?=Yii::app()->request->baseUrl;?>/orders/edit/id/<?=$migr_select['id']?>"><span class="fa fa-edit"></span></a>
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
<a href=" <?=Yii::app()->request->baseUrl;?>/orders/orders">Back</a>
<script>
    $(document).on('click','.remove_column',function() {
        var id = $(this).parent().parent().children('.id').text();
        if(id=='new'){
            $(this).parent().parent().remove();
        }else{
            var base_url = $('.base_url').text();
            $.post(base_url + '/orders/delete', {id: id}, function (data) {
                if (data == 1) {
                    window.location.href = "";
                }
            });
        }
    });
    i=1;
    $('.add_column').on('click',function() {
         i++;
        $('.all_column').append('<div class="col-lg-12 col-md-12 col-xs-12 col-sm-12">' +
            '<div class="col-lg-2 col-md-2 col-xs-12 col-sm-12 id" hidden>new</div>' +
            '<div class="col-lg-2 col-md-2 col-xs-12 col-sm-12"><input type="hidden"  value="'+$('.order_id').text()+'" class="form-control order_id" name="test['+i+'][order_id]"></div>' +
            '<div class="col-lg-2 col-md-2 col-xs-12 col-sm-12"><input type="number" class="form-control price" name="test['+i+'][price]" ></div>' +
            '<div class="col-lg-2 col-md-2 col-xs-12 col-sm-12"><input type="text" class="form-control description" name="test['+i+'][description]" ></div>' +
            '<div class="col-lg-2 col-md-2 col-xs-12 col-sm-12"><input type="hidden" name="test['+i+'][available]" value="0" ><input type="checkbox" name="test['+i+'][available]" value="1"  class="available" ></div>' +
            '<div class="col-lg-2 col-md-2 col-xs-12 col-sm-12">' +
            '<i class="remove remove_column fa fa-minus"></i></div></div>');
        var base_url = $('.base_url').text();
    });

    $( "#orders_form" ).submit(function( event ) {
        event.preventDefault();

        var price = $('.price').val();
        var description = $('.description').val();
        var k=1;
        $.each( $('input[type="text"]'), function( key, value ) {
            if($(value).val()==''){
                $(this).css('border','1px solid red');
                k=0;
            }e
        });
        $.each( $('input[type="number"]'), function( key, value ) {
            if($(value).val()==''){
                $(this).css('border','1px solid red');
                k=0;
            }
        });
        if(k == 1){
            $( "#orders_form" ).submit();
        }
    });
</script>



