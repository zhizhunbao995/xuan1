<?php
/** ���ݹ���
 */
?>
<div class="tb-module tshop-um tshop-um-950img-list-show">
<?php
//���û��Ǹ���ȡ����
$itemString=$_MODULE['t-item'];
$idList=explode(',',$itemString);
$height = $_MODULE['img_height'];
$name = array($_MODULE['t-name0'],$_MODULE['t-name1'],$_MODULE['t-name2']);
$imgheight = $height>=600? 600 : $height<=310?310: $height;
//Ĭ�Ϻÿ�ͼƬ
$example = array("http://img02.taobaocdn.com/imgextra/i2/46353909/T2AtaWXhJbXXXXXXXX_!!46353909.png","http://img02.taobaocdn.com/imgextra/i2/46353909/T2QQ6.Xc0XXXXXXXXX_!!46353909.png","http://img03.taobaocdn.com/imgextra/i3/46353909/T2GGb.XlVXXXXXXXXX_!!46353909.png");
$imgbg = false;

//����û�û��ѡ�񱦱�,����������������Ϊ1,����Ҫ����������
$idList=clearnull($idList);
if(count($idList)==0){
	//����ѡ����û������
	//$itemList=getItems(3,$shopCategoryManager,$itemManager);//��ñ��������б�
	//��ϵͳ��ȡ������,һ��Ҫ�жϸ���
	$itemNum = 3;
	$imgbg = true;
}else{
	//����ѡ����������
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
	$catArr=array();//��������
	$allShopCategory=$shopCategoryManager->queryAll();
	
	foreach($allShopCategory as $shopCategory){
		//echo $shopCategory->id."\n";
		$catArr[]=$shopCategory->id;      //��ĿID
	}
	//$sonShopCategory = $shopCategoryManager->querySubCategories($catArr[1]);����Ŀѡ��
	$itemArr=array();//��Ʒ����
	foreach($catArr as $catId){
		$itemList=$itemManager->queryByCategory($catId,"hotsell",$itemNum);//��ѯ�����б�
		foreach($itemList as $item){
		//echo $catId;
			//�жϻ�ȡ�Ĳ�Ʒ�Ƿ�Ϊ��
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
						<div class="info_sales">���ۼ��۳�<strong><?php echo $item->soldCount;?></strong>��</div>
					</div>
					<div class="position info_price">
						<span>��</span><strong ><?php echo number_format($item->discountPrice,0,'.','');?></strong>
					</div>
				</div>
			</li>
<?php 
}
}else{//����ʾ��ͼ
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
						<div class="info_title">��ѡ�񱦱�</div>
						<div class="info_sales">���ۼ��۳�<strong>999</strong>��</div>
					</div>
					<div class="position info_price">
						<span>��</span><strong >68.00</strong>
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
