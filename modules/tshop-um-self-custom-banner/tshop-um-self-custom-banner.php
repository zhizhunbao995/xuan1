<div class="tb-module tshop-um tshop-um-self-custom-banner">
<?php
/**
 * 开始设计PHP页面
 */
$wh = explode("*", $_MODULE["shop_logo_width"]);
$wh = clearnull($wh) == null?array("auto","auto"):array("{$wh[0]}px","{$wh[1]}px");
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
	<div class="shop-name" >
<?php if($showfont == "show"){

?>
		<strong>
			<?php 
		if($_MODULE["shop_name"] ==""){
			echo $_shop->title;
		}else{
			echo $_MODULE["shop_name"];
		}
		?>
		</strong>
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
		<div class="shop-img-logo" style=<? echo "width:{$wh[0]};height:{$wh[1]}";?>>
			<?php echo "<img src='".$_MODULE["shop_logo_url"]."'>";?>			
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
