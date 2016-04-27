<div class="admin-default-index">
    <div class="col-md-12">
        <div class="col-md-4">
            <h3>Category</h3>
            <ul>
                <?php
                    foreach ($model_category as $value) {
                        echo "<li><a href='/admin/default/viewcategory/".$value['id_category']."'>".$value['name_category']."</li>";
                    }
                ?>
            </ul>
            <a href="/admin/default/category" class="btn btn-success">All category</a>
        </div>
        <div class="col-md-4">
            <h3>Product</h3>
            <ul>
                <?php
                    foreach ($model_product as $value) {
                        echo "<li><a href='/admin/default/viewproduct/".$value['id_product']."'>".$value['name_product']."</li>";
                    }
                ?>
            </ul>
            <a href="/admin/default/product" class="btn btn-success">All product</a>
        </div>
    </div>
</div>
