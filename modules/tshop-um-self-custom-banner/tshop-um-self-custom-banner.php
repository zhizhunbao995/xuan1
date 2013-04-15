<?php
/** 内容规则：
 1.PHP页面内容只能包含一个根元素（允许任意标签元素，推荐"div"元素）
 2.根元素类定义包含：class="tb-module tshop-um tshop-um-self-custom-banner"（class属性可以添加您需要的类选择器定义）
 3.元素class属性值禁止以"tb-"和"J_T"字符开头,除[tb-module, J_TWidget, J_CartPluginTrigger, J_TokenSign]以外
 4.禁止使用<style>标签（元素）
 5.禁止使用<script>标签（元素）
 6.禁止使用<link>标签（元素）
 7.禁止使用标签（元素）的id属性
 8.允许使用元素内联style属性
 */
?>
<div class="tb-module tshop-um tshop-um-self-custom-banner">
<?php
/**
 * 开始设计PHP页面
 */
$w = $_MODULE["shop_w"];
$wlist = explode("|", $w);
$showfont = $_MODULE["shop_font"];
$catArr=array();
$itemArr=array();//产品数组
$itemNum =1;
$allShopCategory=$shopCategoryManager->queryAll();
foreach($allShopCategory as $shopCategory){
	//echo $shopCategory->id."\n";
	$catArr[]=$shopCategory->id;      //类目ID
}
foreach($catArr as $catId){
	$itemList=$itemManager->queryByCategory($catId,"hotsell",$itemNum);//查询宝贝列表
	foreach($itemList as $item){
	//echo $catId;
		//判断获取的产品是否为空
		if($item->exist){
			array_push($itemArr,$item);
			if(count($itemArr) > ($itemNum-1)) 
				break;
		}
	}
		if(count($itemArr) > ($itemNum-1)) break;
	}
?>
<div style="height:119px; background:none;">
	<div class="shop-name">
<?php if($showfont == "show"){

?>
		<strong><?=$_MODULE["shop_name"]?></strong>
		<Span><?php 
		if($_MODULE["shop_name_in"] ==""){
			echo $_shop->introduction;
		}else{
			echo $_MODULE["shop_name_in"];
		}

		?></Span>
<?php 
}else{

?>
		<div class="shop-img-logo">
			<?php echo "<img src='".$_MODULE["shop_logo_url"]."' >"; ?>			
		</div>
<?php 
}
?>
	</div>
	<div class="btn-list">
		<a class="btn1" href="<?php echo $uriManager->favoriteLink();?>" title="收藏店铺">收藏</a>
		<a class="btn3" href="<?php 
		if($_MODULE["shop_recommend"] == ""){
			echo $_shop->logoUrl;
		}else{
			echo $_MODULE["shop_recommend"];
		}
		?>" title="推荐宝贝">推荐</a>
		<div class="btn2" >客服<div class="J_TWidget hidden" data-widget-type="Popup" data-widget-config="{
		      'trigger':'.btn2',
		      'align':{
		              'node':'.btn2',
		              'offset':[-1,0],
		              'points':['tl','tr']
		              }
		        }">
		    <div class="pop-btn2">
		 <?php   
		 		$t = count($wlist)>4? 4:count($wlist);
		    	for ($i=0; $i < $t; $i++) { 
					 echo $uriManager->supportTag($wlist[$i],"客服",1);
				}  
		?>
		    </div>
		</div>
	</div>
	</div>
</div>
</div>
