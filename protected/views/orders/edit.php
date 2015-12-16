<form action = "" method="post">
    <div class = "col-xs-12 col-sm-12 col-lg-12 col-md-12">
        <div class = "col-xs-12 col-sm-12 col-lg-3 col-md-3">
            <input type = "text" name = "order_id" value = "<?=$editOrders['order_id']?>">
        </div>
        <div class = "col-xs-12 col-sm-12 col-lg-3 col-md-3">
            <input type = "text" name="price"  value = "<?=$editOrders['price']?>">
        </div>
        <div class="col-xs-12 col-sm-12 col-lg-3 col-md-3">
            <input type = "text" name = "description" value = "<?=$editOrders['description']?>">
        </div>
        <div class="col-xs-12 col-sm-12 col-lg-3 col-md-3">
            <input type = "hidden" name = "available">
            <input type = "checkbox" value="1" name="available" <?=($editOrders['available']==1)?'checked':''?>>
        </div>
        <div class="col-xs-12 col-sm-12 col-lg-12 col-md-12">
            <input type = "submit" value = "Save" class = "pull-right">
        </div>
    </div>
</form>
<a href="<?=Yii::app()->request->baseUrl;?>/orders/orders">Back</a>

