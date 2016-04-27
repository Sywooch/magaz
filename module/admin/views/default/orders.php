
<table class="table_view">
    <thead>
        <tr>
        	<td>№ Orders</td>
            <td>Name</td>
            <td>Email</td>
            <td>Product</td>
            <td>Count</td>
            <td>Price</td>
            <td></td>
        </tr>
    </thead>
    <tbody>
		<?php foreach ($orders as $value): ?>
	        <tr>
	            <td><?=$value['id_orders']?></td>
	            <td><?=$value['name_user']?></td>
	            <td><?=$value['email_user']?></td>
	            <td><a href="/admin/default/viewproduct/<?=$value['id_product']?>"><?=$value['name_product']?></a></td>
	            <td><?=$value['count']?></td>
	            <td><?=$value['price'] * $value['count']?></td>
	            <td><a href="/admin/default/deleteorder/<?=$value['id_orders']?>">Delete</a></td>
	        </tr>
	    <?php endforeach ?>
	</tbody>
</table>