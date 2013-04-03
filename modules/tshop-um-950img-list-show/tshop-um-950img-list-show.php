<?php
/**
 内容规则：
 1.PHP页面内容只能包含一个根元素（允许任意标签元素，推荐"div"元素）
 2.根元素类定义包含：class="tb-module tshop-um tshop-um-950img-list-show"（class属性可以添加您需要的类选择器定义）
 3.元素class属性值禁止以"tb-"和"J_T"字符开头,除[tb-module, J_TWidget, J_CartPluginTrigger, J_TokenSign]以外
 4.禁止使用<style>标签（元素）
 5.禁止使用<script>标签（元素）
 6.禁止使用<link>标签（元素）
 7.禁止使用标签（元素）的id属性
 8.允许使用元素内联style属性
 */
?>
<div class="tb-module tshop-um tshop-um-950img-list-show">
<?php
//从用户那个获取数据
$itemString=$_MODULE['t-item'];
$idList=explode(',',$itemString);
$tt = "";

echo count($idList);
//如果用户没有选择宝贝,计算数组数量还是为1,所以要处理下数据
$idList=clearnull($idList);

if(count($idList)==0){
	//宝贝选择器没有数据
	$itemList=getItems(3,$shopCategoryManager,$itemManager);//获得宝贝对象列表
	//从系统获取的数据,一定要判断个数
	$itemNum=count($itemList);
}else{
	//宝贝选择器有数据
	$itemList=$itemManager->queryByIds($idList,"hotsell");  
	$itemNum=count($idList);
}
$itemNum = $itemNum>5?5:$itemNum;
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
		<ul>
<?php 
	for($i=0;$i<$itemNum;$i++){
		$item=$itemList[$i];
?>
			<li>
				<div class="img-box">
					<a href="<?php echo $uriManager->detailURI($item)?>"><img src="<?php echo $item->getPicUrl(310);?>" class="img_size"/></a>
				</div>
				<div class="img_info">
					<div class="info_self_custom">
						新款
					</div>
					<div class="float_l count_hot" >
						<div class="info_title"><?=$item->title;?></div>
						<div class="info_sales">已累计售出<strong><?php echo $item->soldCount;?></strong>笔</div>
					</div>
					<div class="position info_price">
						<Span>￥</span><strong ><?php echo number_format($item->discountPrice,0,'.','');?></strong>
					</div>
				</div>
			</li>
<?php 
}
?>			
		</ul>
	</div>
</div>
