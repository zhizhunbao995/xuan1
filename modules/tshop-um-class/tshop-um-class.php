<?php 



	$itemf=$_MODULE['class-font'];
	$itemfu=$_MODULE['class-font-url'];
	$itemfu = explode("|", $itemfu);
	$font = explode("|", $itemf);


?>
<div class="tb-module tshop-um tshop-um-class">
	<div class="clear">
	<div class="class-title">
	<h1>�����Ƽ�
		<div class="hot">
			<?
				foreach ($font as $key => $value) {
					echo "<a href=".$itemfu[$key].">{$value}</a>";
				}
			?>
		</div>
	</h1>
	<div class="class-img">
		<a href="<?php echo $_MODULE['class-img'];?>"><img src="<?php echo $_MODULE['class-url'];?>"></a>
	</div>
</div>

<ul>
<?php
 $subCategories = $shopCategoryManager->queryAll();//һ����Ŀ
 $l = $shopCategoryManager->queryById($subCategories[0]->id);
 $shopCategory = array();
// ��Ŀѡ�������
$itemString=$_MODULE['t-item'];
$idList=json_decode($itemString);

if(empty($idList)){
	foreach ($subCategories as $vid) {
		$sublist = $shopCategoryManager->querySubCategories($vid->id);//һ�����������Ŀ
		$qone =  $shopCategoryManager->queryById($vid->id);
?>
	<li>
		<div class="first-m"><a href="<?=$uriManager->shopCategoryURI($qone);?>"><?php 	 echo $qone->name;?></a></div>
		<? if(count($sublist) != 0) {
		?>
		<div class="first-sub">
			<?php
				foreach ($sublist as $sub) {
			?>
			<a href="<?=$uriManager->shopCategoryURI($sub);?>"><?php echo $sub->name;?></a>
			<?php
				}
			}
			?>
		</div>
	</li>
<?		
	}
}else{
	foreach($idList as $shopCategory){
	$one =  $shopCategoryManager->queryById($shopCategory->{rid});
	$childlist = explode(",",$shopCategory->{childIds});
?>

	<li>
		<div class="first-m"><a href="<?=$uriManager->shopCategoryURI($one);?>"><?php 	 echo $one->name;?></a></div>
		<div class="first-sub">
			<?php
				foreach($childlist as $sub){
	  				$l = $shopCategoryManager->queryById($sub);
			?>

			<a href="<?=$uriManager->shopCategoryURI($l);?>"><?php echo $l->name;?></a>
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
