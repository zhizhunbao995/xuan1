<div class="tb-module tshop-um tshop-um-tabimg">
<?php
/**
 * 开始设计PHP页面
 */
$empty = array("","","","","","","","","");
$list = $_MODULE["baobei"];
$idList=explode(',',$list);
$idList=clearnull($idList);
$itemList=$itemManager->queryByIds($idList,"_hotsell");
$output = array_slice($empty, 0, 9-count($itemList));
$itemList = array_merge($itemList,$output);
$resize = $_MODULE["resize"];
$Sizeimg = explode('*',$resize);
?>
<div class="J_TWidget" data-widget-type="Slide" 
data-widget-config="{'navCls':'yslider-stick','contentCls':'yslider-stage','activeTriggerCls':'selected',
'delay':0.1,'effect':'fade','easing':'easeOutStrong','duration':0.8,'autoplay':false}">
    <div class="yslider-stage">
<?php 
	for ($i=0; $i < count($itemList); $i++) {
	if($itemList[$i] !=""){
		$itemurl_m = $uriManager->detailURI($itemList[$i]);
		$itemtitle_m  = $itemList[$i]->title;
		$imgurl_m = $itemList[$i]->getPicUrl($Sizeimg[0],$Sizeimg[1]);	
		$itemRmb = $itemList[$i]->price;
		$sold = $itemList[$i]->soldCount;
		$ccount = $itemList[$i]->collectedCount;
	}
	else{
		$itemurl_m = "http://img02.taobaocdn.com/imgextra/i2/46353909/T2QQ6.Xc0XXXXXXXXX_!!46353909.png";
		$itemtitle_m  = "还没有宝贝呀！ 赶快进行添加还没有宝贝呀！";
		$imgurl_m = "http://img02.taobaocdn.com/imgextra/i2/46353909/T2QQ6.Xc0XXXXXXXXX_!!46353909.png";	
		$itemRmb = "888.00";
		$sold = "0";
		$ccount = "0";
	}
	
?>
        <div class="contimg">
            <a target="_blank" style="background:url(<?=$imgurl_m;?>) no-repeat center center;" class="img">
            </a>
            <Span class="cainfo">
            	<a href="<?=$itemurl_m;?>" target="_blank"><?=$itemtitle_m;?></a>
            	<strong>RMB:<i><?=$itemRmb;?></i></strong>
            	<strong>最近30天售出 :<i><?=$sold;?> </i>件</strong>
            	<strong>收藏人气 : <i><?=$ccount;?></i></strong>
            	<div class="twoma"><img src="<?php echo 'https://chart.googleapis.com/chart?cht=qr&chs=80x80&choe=UTF-8&chld=L|2&chl='.$itemurl_m ;?>" /></div>
            </Span>
        </div>
<?php 
	}
?>
    </div>
    <ul class="yslider-stick">
<?php 
	for ($k=0; $k < count($itemList); $k++) { 
		if($itemList[$k] !=""){
			$itemurl = $uriManager->detailURI($itemList[$k]);
			$itemtitle  = $itemList[$k]->title;
			$imgurl = $itemList[$k]->getPicUrl(220,220);
			$itemRmb = $itemList[$k]->price;
			$sold = $itemList[$k]->soldCount;	
		}
		else{
			$itemurl = "#";
			$itemtitle  = "还没有宝贝呀！ 赶快进行添加还没有宝贝呀！";
			$imgurl = "http://img02.taobaocdn.com/imgextra/i2/46353909/T2QQ6.Xc0XXXXXXXXX_!!46353909.png";	
			$itemRmb = "123.00";
			$sold = "123";
		}
?>
        <li >
            <a href="<?php echo $itemurl;?>" target="_blank">
                <img width="405" height="220" alt="<?php echo $itemtitle;?>" src="<?php echo $imgurl;?>"/>
	            <Span class="list">
	            	<strong>RMB:<i><?=$itemRmb;?></i></strong>
	            	<strong>最近30天售出 :<i><?=$sold;?> </i>件</strong>
	            </Span>
            </a>
        </li>
<?php 
}
?>
    </ul>
    <Div class="clear"></Div>
</div>
</div>
