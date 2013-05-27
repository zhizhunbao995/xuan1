<?php
/** 内容规则：
 1.PHP页面内容只能包含一个根元素（允许任意标签元素，推荐"div"元素）
 2.根元素类定义包含：class="tb-module tshop-um tshop-um-close-light"（class属性可以添加您需要的类选择器定义）
 3.元素class属性值禁止以"tb-"和"J_T"字符开头,除[tb-module, J_TWidget, J_CartPluginTrigger, J_TokenSign]以外
 4.禁止使用<style>标签（元素）
 5.禁止使用<script>标签（元素）
 6.禁止使用<link>标签（元素）
 7.禁止使用标签（元素）的id属性
 8.允许使用元素内联style属性
 */
?>
<div class="tb-module tshop-um tshop-um-close-light">
<?php
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
/**
 * 开始设计PHP页面
 */
$changes = $_MODULE['changes'];
$list = $_MODULE["item-s"];
$typeSale = $_MODULE["types"];
$idList=explode(',',$list);
$idList=clearnull($idList);
if($changes=="auto"){//自动选择

	//宝贝选择器没有数据

	$itemList=getItems(9,$shopCategoryManager,$itemManager);//获得宝贝对象列表
	//从系统获取的数据,一定要判断个数

}else{//手动选择

	//宝贝选择器有数据
	if (count($idList)>0) {
		$itemList=$itemManager->queryByIds($idList,$typeSale); 
	}
	 
}
function getItems($itemNum,$shopCategoryManager,$itemManager){
	$typeSale = $GLOBALS["typeSale"];
	$catArr=array();//分类数组
	$allManager= array();
	$allShopCategory=$shopCategoryManager->queryAll();
	foreach($allShopCategory as $shopCategory){////一级类

		//echo $shopCategory->id."\n";

		$catArr[]=$shopCategory->id;    //类目ID
	}
	foreach ($catArr as $key => $value) {//二级类
		$t = $shopCategoryManager->querySubCategories($catArr[$key]);
		if(count($t) > 0){
			foreach ($t as $value) {
				array_push($allManager,$value->id);
			}
			
		}	
	}
	$itemArr=array();//产品数组
	foreach($allManager as $catId){//所有宝贝
		$itemList=$itemManager->queryByCategory($catId,$typeSale,$itemNum);//查询宝贝列表
		foreach($itemList as $item){
			//判断获取的产品是否为空

			if($item->exist){
				array_push($itemArr,$item->id);
			}

		}
		   
	}
	$itemList=$itemManager->queryByIds($itemArr,$typeSale);  //最后排序宝贝
	//echo count($itemArr);
	return $itemList; 
}
?>
		
<div class="close-top">

	<div class="l" style="background:url('http://img03.taobaocdn.com/imgextra/i3/46353909/T2ZiDHXn4aXXXXXXXX_!!46353909.png') no-repeat;"></div>
		<?php
		if (count($idList)==0 && $changes!="auto") {
	?>
		<div class="l" style="background:url('http://img04.taobaocdn.com/imgextra/i4/46353909/T2FHPPXndXXXXXXXXX_!!46353909.png') no-repeat;"></div>
		<div class="l" style="background:url('http://img02.taobaocdn.com/imgextra/i2/46353909/T2dpzPXitXXXXXXXXX_!!46353909.png') no-repeat;"></div>
		<div class="l" style="background:url('http://img04.taobaocdn.com/imgextra/i4/46353909/T2B8zPXaBXXXXXXXXX_!!46353909.png') no-repeat;"></div>
		<div class="l" style="background:url('http://img02.taobaocdn.com/imgextra/i2/46353909/T2h9PPXXVXXXXXXXXX_!!46353909.png') no-repeat;"></div>
		<div class="l" style="background:url('http://img02.taobaocdn.com/imgextra/i2/46353909/T2lRiaXgRcXXXXXXXX_!!46353909.png') no-repeat;"></div>
		<div class="l" style="background:url('http://img04.taobaocdn.com/imgextra/i4/46353909/T2Cx2PXgxXXXXXXXXX_!!46353909.png') no-repeat;"></div>
		<div class="l" style="background:url('http://img04.taobaocdn.com/imgextra/i4/46353909/T2htnOXldaXXXXXXXX_!!46353909.png') no-repeat;"></div>
		<div class="l" style="background:url('http://img02.taobaocdn.com/imgextra/i2/46353909/T2e6zOXdhaXXXXXXXX_!!46353909.png') no-repeat;"></div>
		<div class="l" style="background:url('http://img02.taobaocdn.com/imgextra/i2/46353909/T2lRiaXgRcXXXXXXXX_!!46353909.png') no-repeat;"></div>
	<?php
		return ;}
	 ?>

	<?php
	$num = count($itemList)>9?9:count($itemList);

	for ($i=0; $i < $num; $i++) { 	
?>
	<div class="l" style="background:url('<?php echo $itemList[$i]->getPicUrl(220,220);?>') no-repeat;"></div>
<?php
}
?>
</div>

<div class="close-pop J_TWidget hidden" data-widget-type="Popup" data-widget-config="{
          'trigger':'.close-top',
          'align':{
                  'node':'.close-top',
                  'offset':[0,0],
                  'points':['tl','tl']
                  }
            }">
    	<a  class="pop" style="background:url('http://img03.taobaocdn.com/imgextra/i3/46353909/T2ZiDHXn4aXXXXXXXX_!!46353909.png') no-repeat;"></a>
	<?php
	for ($i=0; $i < $num; $i++) { 
		
?> 
	<a href="<?php echo $uriManager->detailURI($itemList[$i]);?>" class="pop"  target="_blank">
		<img src="<?php echo $itemList[$i]->getPicUrl(220,220);?>" /> 
		<i></i>
		<span>
			<b class="price">￥<?=$itemList[$i]->price;?></b>
			<b class="name"><?=$itemList[$i]->title;?></b>
			<b class="count">销量：<?=$itemList[$i]->soldCount;?>件</b>
		</span>
	</a>
<?php
}
?>
</div>
</div>
