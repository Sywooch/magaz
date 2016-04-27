<?php
$this->title = 'Home';
?>
<div class="col-md-12">
	<div class="col-md-2">
		<h3>Category</h3>
		<ul>
			<?php
				foreach ($model_category as $value) {
					echo "<a href='/site/category/".$value['id_category']."'><li>".$value['name_category']."</li></a>";		
				}
			?>
		</ul>
	</div>
	<div class="col-md-10">
		<?php
			foreach ($model_category as $category) {
				echo "<div>";
				echo "<h4>".$category['name_category']."</h4>";
				
					foreach ($model_category_product::find()->where(['id_category' => $category['id_category']])->with('product')->limit(2)->all()['0']['product'] as $value) {
						?>
							<div class="rama">
								<div>
									<img class="preview_product" src="/<?=$model_photo::find()->where(['id_product' => $value['id_product']])->one()['url']?>">
								</div>
								<p><a href="/site/product/<?=$value['id_product']?>"><?=$value['name_product']?></a></p>
							</div>
						<?
					}
				echo "</div>";
			}
		?>
	</div>
</div>
