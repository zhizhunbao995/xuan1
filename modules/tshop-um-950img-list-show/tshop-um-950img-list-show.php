<?php
/**
 ���ݹ���
 1.PHPҳ������ֻ�ܰ���һ����Ԫ�أ����������ǩԪ�أ��Ƽ�"div"Ԫ�أ�
 2.��Ԫ���ඨ�������class="tb-module tshop-um tshop-um-950img-list-show"��class���Կ����������Ҫ����ѡ�������壩
 3.Ԫ��class����ֵ��ֹ��"tb-"��"J_T"�ַ���ͷ,��[tb-module, J_TWidget, J_CartPluginTrigger, J_TokenSign]����
 4.��ֹʹ��<style>��ǩ��Ԫ�أ�
 5.��ֹʹ��<script>��ǩ��Ԫ�أ�
 6.��ֹʹ��<link>��ǩ��Ԫ�أ�
 7.��ֹʹ�ñ�ǩ��Ԫ�أ���id����
 8.����ʹ��Ԫ������style����
 */
?>
<div class="tb-module tshop-um tshop-um-950img-list-show">
<?php
//���û��Ǹ���ȡ����
$itemString=$_MODULE['t-item'];
$idList=explode(',',$itemString);
$tt = "";

echo count($idList);
//����û�û��ѡ�񱦱�,����������������Ϊ1,����Ҫ����������
$idList=clearnull($idList);

if(count($idList)==0){
	//����ѡ����û������
	$itemList=getItems(3,$shopCategoryManager,$itemManager);//��ñ��������б�
	//��ϵͳ��ȡ������,һ��Ҫ�жϸ���
	$itemNum=count($itemList);
}else{
	//����ѡ����������
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
						�¿�
					</div>
					<div class="float_l count_hot" >
						<div class="info_title"><?=$item->title;?></div>
						<div class="info_sales">���ۼ��۳�<strong><?php echo $item->soldCount;?></strong>��</div>
					</div>
					<div class="position info_price">
						<Span>��</span><strong ><?php echo number_format($item->discountPrice,0,'.','');?></strong>
					</div>
				</div>
			</li>
<?php 
}
?>			
		</ul>
	</div>
</div>
