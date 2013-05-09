<?php
/** 内容规则：
 1.PHP页面内容只能包含一个根元素（允许任意标签元素，推荐"div"元素）
 2.根元素类定义包含：class="tb-module tshop-um tshop-um-class"（class属性可以添加您需要的类选择器定义）
 3.元素class属性值禁止以"tb-"和"J_T"字符开头,除[tb-module, J_TWidget, J_CartPluginTrigger, J_TokenSign]以外
 4.禁止使用<style>标签（元素）
 5.禁止使用<script>标签（元素）
 6.禁止使用<link>标签（元素）
 7.禁止使用标签（元素）的id属性
 8.允许使用元素内联style属性
 */
?>
<div class="tb-module tshop-um tshop-um-class">
	<div class="clear">
	<div class="class-title">
	<h1>宝贝推荐</h1>
	<div class="class-img">
		<a href="<?php echo $_MODULE['class-img'];?>"><img src="<?php echo $_MODULE['class-url'];?>"></a>
	</div>
</div>
<?php
/**
 * 开始设计PHP页面
 */

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
