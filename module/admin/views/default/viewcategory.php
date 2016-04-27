<div class="col-md-12">
	<table class="table_view">
	    <thead>
	        <tr>
	            <td>Name</td>
	            <td>Price</td>
	        </tr>
	    </thead>
	    <tbody>
			<?php foreach ($model_category as $value): ?>
		        <tr>
		            <td><a href="/admin/default/viewproduct/<?=$value['id_product']?>"><?=$value['name_product']?></a></td>
		            <td><?=$value['price']?></td>
		        </tr>
		    <?php endforeach ?>
		</tbody>
	</table>
</div>