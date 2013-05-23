<div class="tb-module tshop-um tshop-um-class">
	<div class="clear">
	<div class="class-title">
	<h1>宝贝推荐</h1>
	<div class="class-img">
		<a href="<?php echo $_MODULE['class-img'];?>"><img src="<?php echo $_MODULE['class-url'];?>"></a>
	</div>
</div>
<?php
 $subCategories = $shopCategoryManager->queryAll();

 $l = $shopCategoryManager->queryById($subCategories[0]->id);
//echo $uriManager->shopIntrURI();//域名
 //echo $uriManager->shopCategoryURI($l);
 //echo $uriManager->searchURI();
 $num = 0;
// 类目选择器输出
 $itemString=$_MODULE['t-item'];
 $idList=json_decode($itemString);
foreach ($idList as  $value) {
	$shopCategory =  $shopCategoryManager->queryById($value->{rid});
	echo $shopCategory->{uri}."      ";
	$array = explode(",",$value->{childIds});
	foreach ($array as $id) {
		$subShopCategory =  $shopCategoryManager->queryById($id);
		//echo  $uriManager->shopCategoryURI ($subShopCategory);
	}
}
?>
<ul>
<?php 
	foreach($subCategories as $shopCategory){
	 $sublist = $shopCategoryManager->querySubCategories($shopCategory->id);
	 if($num++<6){//限制5次
	
?>
	<li>
		<div class="first-m"><a href="<?=$uriManager->shopCategoryURI($shopCategory);?>"><?php 	 echo $shopCategory->name;?></a></div>
		<div class="first-sub">
			<?php
					foreach($sublist as $sub){
	  				$l = $shopCategoryManager->queryById($sub->id);
			?>

			<a href="<?=$uriManager->shopCategoryURI($l);?>"><?php echo $sub->name;?></a>
			<?php
				}
			?>
		</div>
	</li>
<?php
	
}
	}
?>
</ul>
</div>
</div>
