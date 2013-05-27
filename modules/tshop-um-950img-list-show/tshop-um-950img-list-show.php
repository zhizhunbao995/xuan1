<?php
/** 内容规则：
 */
?>
<div class="tb-module tshop-um tshop-um-950img-list-show">
<?php
//从用户那个获取数据
$itemString=$_MODULE['t-item'];
$idList=explode(',',$itemString);
$height = $_MODULE['img_height'];
$name = array($_MODULE['t-name0'],$_MODULE['t-name1'],$_MODULE['t-name2']);
$imgheight = $height>=600? 600 : $height<=310?310: $height;
//默认好看图片
$example = array("http://img02.taobaocdn.com/imgextra/i2/46353909/T2AtaWXhJbXXXXXXXX_!!46353909.png","http://img02.taobaocdn.com/imgextra/i2/46353909/T2QQ6.Xc0XXXXXXXXX_!!46353909.png","http://img03.taobaocdn.com/imgextra/i3/46353909/T2GGb.XlVXXXXXXXXX_!!46353909.png");
$imgbg = false;

//如果用户没有选择宝贝,计算数组数量还是为1,所以要处理下数据
$idList=clearnull($idList);
if(count($idList)==0){
	//宝贝选择器没有数据
	//$itemList=getItems(3,$shopCategoryManager,$itemManager);//获得宝贝对象列表
	//从系统获取的数据,一定要判断个数
	$itemNum = 3;
	$imgbg = true;
}else{
	//宝贝选择器有数据
	$itemList=$itemManager->queryByIds($idList,"hotsell");  
	$itemNum=count($idList);
}
$itemNum = $itemNum>3?3:$itemNum;
//function
function clearnull($items){
	foreach($items as $item){
		if($item){
		$newItems[]=$item;
		}else{
		continue;
		};
	}
	return $newItems;
}
function getItems($itemNum,$shopCategoryManager,$itemManager){
	$catArr=array();//分类数组
	$allShopCategory=$shopCategoryManager->queryAll();
	
	foreach($allShopCategory as $shopCategory){
		//echo $shopCategory->id."\n";
		$catArr[]=$shopCategory->id;      //类目ID
	}
	//$sonShopCategory = $shopCategoryManager->querySubCategories($catArr[1]);子类目选择
	$itemArr=array();//产品数组
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
		//echo var_dump($itemArr);
		//echo count($itemArr);
		return $itemArr;    
	}
?>
	<div class="xuan-imglist">
		<?php 
			creatTit($_MODULE["title"],$_MODULE["more"]);
		?>
		<ul>
<?php 
if(!$imgbg){
	for($i=0;$i<$itemNum;$i++){
		$item=$itemList[$i];
?>
			<li>
				<div class="img-box" style="height:<?php echo $imgheight.'px';?>;">
					<a href="<?php echo $uriManager->detailURI($item)?>"><img src="<?php echo $item->getPicUrl(310);?>" class="img_size" /></a>
				</div>
				<div class="img_info">
					<div class="info_self_custom">
						<?php echo $name[$i];?>
					</div>
					<div class="float_l count_hot" >
						<div class="info_title"><?=$item->title;?></div>
						<div class="info_sales">已累计售出<strong><?php echo $item->soldCount;?></strong>笔</div>
					</div>
					<div class="position info_price">
						<span>￥</span><strong ><?php echo number_format($item->discountPrice,0,'.','');?></strong>
					</div>
				</div>
			</li>
<?php 
}
}else{//进入示例图
		for($i=0;$i<$itemNum;$i++){
		$item=$itemList[$i];
?>
			<li>
				<div class="img-box" style="height:<?php echo $imgheight.'px';?>;background:url(<?php if($imgbg) {echo $example[$i]};?>) no-repeat;">
					<a href=""></a>
				</div>
				<div class="img_info">
					<div class="info_self_custom">
						New
					</div>
					<div class="float_l count_hot" >
						<div class="info_title">请选择宝贝</div>
						<div class="info_sales">已累计售出<strong>999</strong>笔</div>
					</div>
					<div class="position info_price">
						<span>￥</span><strong >68.00</strong>
					</div>
				</div>
			</li>	
<?php 
	}
}
?>			
		</ul>
	</div>
</div>
