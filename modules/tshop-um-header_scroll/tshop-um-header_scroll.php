<?php

/** 内容规则：

 1.PHP页面内容只能包含一个根元素（允许任意标签元素，推荐"div"元素）

 2.根元素类定义包含：class="tb-module tshop-um tshop-um-header_scroll"（class属性可以添加您需要的类选择器定义）

 3.元素class属性值禁止以"tb-"和"J_T"字符开头,除[tb-module, J_TWidget, J_CartPluginTrigger, J_TokenSign]以外

 4.禁止使用<style>
标签（元素）

 5.禁止使用
<script>标签（元素）

 6.禁止使用<link>标签（元素）

 7.禁止使用标签（元素）的id属性

 8.允许使用元素内联style属性
 */

?>

<?php

//全局数据

//背景设置

$bgcolor=$_MODULE['cs-bgcolor'];

$boxHeight=$_MODULE['img_height']?$_MODULE['img_height']:380;

$allshop = $_MODULE['cetagorylist'];//获得类目

$itemNum=0; //读取用户提供的宝贝数量

$itemList=array();  //宝贝数据

$imgList=array();   //图片数据


//从用户那个获取数据

$itemString=$_MODULE['cs1-item'];

$idList=explode(',',$itemString);

//如果用户没有选择宝贝,计算数组数量还是为1,所以要处理下数据

$idList=clearnull($idList);



if(count($idList)==0){

	//宝贝选择器没有数据

	$itemList=getItems(9,$shopCategoryManager,$itemManager);//获得宝贝对象列表

	//从系统获取的数据,一定要判断个数

	$itemNum=count($itemList);

}else{

	//宝贝选择器有数据

	$itemList=$itemManager->queryByIds($idList,"hotsell");  

	$itemNum=count($idList);

}

//print_r($itemList);

//获取图片

$bimg=$_MODULE['cs1-bimg'];  //获取大图片

$bimgArr=explode(',',$bimg);

$bimgArr=clearnull($bimgArr);

if(count($bimgArr)==0){

$imgList=$provide_imgList;

}else{

$imgList=$bimgArr;

}

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

// 全新图片地址

$num = 5;//图片地址和跳转地址一共为10
?>



<div class="tb-module tshop-um tshop-um-header_scroll" 
	>
	<div  class="mall-slide J_TWidget dd" data-widget-type="Carousel" 

data-widget-config="{'navCls':'ks-switchable-nav','contentCls':'ks-switchable-content','effect':'<?php echo $_MODULE['effect']; ?>','easing': 'easeOutStrong', 'steps':1, 'circular': false, 

'prevBtnCls': 'mall-prev', 'nextBtnCls': 'mall-next', 'disableBtnCls': 'disable' }">
		<a   class="mall-prev"></a>
		<a   class="mall-next"></a>
		<div  class="mall-content clearfix" style="height:<?php echo $boxHeight.'px';?>
			" >
			<ul class="ks-switchable-content">
				<?php

	for($i = 1;$i<=$num;$i++){

?>
				<li class="big-piclist">
					<a href="<? echo $_MODULE["img".$i."_href"];?>
						" target="_blank">
						<img  src = "<? echo $_MODULE["img".$i];?>" alt=""></a>
				</li>
				<?php 

	}

?></ul>
			<ul class="ks-switchable-nav">
				<?php

	for($i = 1;$i<=$num;$i++){

	if($i == 1){

		$classon = "ks-active";

	}else{

		$classon = "";

	}

?>
				<li class="<? echo $classon;?>
					">
					<? echo $_MODULE["img".$i."_text"];?></li>
				<?php 

	}

?></ul>
		</div>
	</div>

</div>