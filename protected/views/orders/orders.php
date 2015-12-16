<div class = "col-xs-12 col-sm-12 col-md-12 col-lg-12">
    <?php
    foreach($all_orders as $order){
        ?>
        <div class = "col-xs-12 col-sm-12 col-md-12 col-lg-12">
            <div class = "col-xs-12 col-sm-12 col-md-7 col-lg-7 orders_name" >
                <a class = "order_text" href = "<?=Yii::app()->baseUrl?>/orders/index/id/<?=$order['orders']?>" >
                    <span class = "orders_name">Orders number </span>
                </a>
                <div class = "orders_div">
                    <span class="spn_orders"><?=$order['orders']?></span>
                </div>
            </div>
            <div class = "col-xs-12 col-sm-12 col-md-1 col-lg-1">
                <span class = "fa fa-edit edit_orders_list" data-id="<?=$order['orders']?>"></span>
            </div>
        </div>
        <?php
    }
    ?>
</div>
<a href="<?=Yii::app()->baseUrl?>/orders/index/id/<?=$max_id?>" class="add_orders pull-right">Add Orders</a>
<script>
    $(document).on('click','.edit_orders_list',function(){

        $(this).removeClass('fa-edit');
        $(this).addClass('fa-save');
        var order_id = $(this).attr('data-id');
        var _this=$(this).parent().parent().children('.orders_name').children('.orders_div');
        _this.children(".spn_orders").remove();
        _this.append('<input type = "number" class="input_edit" value="'+order_id+'"/>');
        $(this).removeClass('edit_orders_list');
        $(this).addClass('save_orders_list');
    })

    $(document).on('click','.save_orders_list',function(){

        $(this).addClass('fa-edit');
        $(this).removeClass('fa-save');
        var order_id = $(this).attr('data-id');
        var input_val = $('.input_edit').val();
        var _this = $(this).parent().parent().children('.orders_name').children('.orders_div');
        _this.children(".input_edit").remove();
        _this.append('<span>'+input_val+'</span>');

        $.post('',{old_order:order_id,new_order:input_val},function(changed_orders){
            window.location.href = "";
        });

        $(this).removeClass('edit_orders_list');
        $(this).addClass('save_orders_list');
    });
</script>