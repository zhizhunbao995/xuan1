<?php
/** ���ݹ���
 1.PHPҳ������ֻ�ܰ���һ����Ԫ�أ����������ǩԪ�أ��Ƽ�"div"Ԫ�أ�
 2.��Ԫ���ඨ�������class="tb-module tshop-um tshop-um-close-light"��class���Կ����������Ҫ����ѡ�������壩
 3.Ԫ��class����ֵ��ֹ��"tb-"��"J_T"�ַ���ͷ,��[tb-module, J_TWidget, J_CartPluginTrigger, J_TokenSign]����
 4.��ֹʹ��<style>��ǩ��Ԫ�أ�
 5.��ֹʹ��<script>��ǩ��Ԫ�أ�
 6.��ֹʹ��<link>��ǩ��Ԫ�أ�
 7.��ֹʹ�ñ�ǩ��Ԫ�أ���id����
 8.����ʹ��Ԫ������style����
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
 * ��ʼ���PHPҳ��
 */
$changes = $_MODULE['changes'];
$list = $_MODULE["item-s"];
$typeSale = $_MODULE["types"];
$idList=explode(',',$list);
$idList=clearnull($idList);
if($changes=="auto"){//�Զ�ѡ��

	//����ѡ����û������

	$itemList=getItems(9,$shopCategoryManager,$itemManager);//��ñ��������б�
	//��ϵͳ��ȡ������,һ��Ҫ�жϸ���

}else{//�ֶ�ѡ��

	//����ѡ����������
	if (count($idList)>0) {
		$itemList=$itemManager->queryByIds($idList,$typeSale); 
	}
	 
}
function getItems($itemNum,$shopCategoryManager,$itemManager){
	$typeSale = $GLOBALS["typeSale"];
	$catArr=array();//��������
	$allManager= array();
	$allShopCategory=$shopCategoryManager->queryAll();
	foreach($allShopCategory as $shopCategory){////һ����

		//echo $shopCategory->id."\n";

		$catArr[]=$shopCategory->id;    //��ĿID
	}
	foreach ($catArr as $key => $value) {//������
		$t = $shopCategoryManager->querySubCategories($catArr[$key]);
		if(count($t) > 0){
			foreach ($t as $value) {
				array_push($allManager,$value->id);
			}
			
		}	
	}
	$itemArr=array();//��Ʒ����
	foreach($allManager as $catId){//���б���
		$itemList=$itemManager->queryByCategory($catId,$typeSale,$itemNum);//��ѯ�����б�
		foreach($itemList as $item){
			//�жϻ�ȡ�Ĳ�Ʒ�Ƿ�Ϊ��

			if($item->exist){
				array_push($itemArr,$item->id);
			}

		}
		   
	}
	$itemList=$itemManager->queryByIds($itemArr,$typeSale);  //������򱦱�
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
			<b class="price">��<?=$itemList[$i]->price;?></b>
			<b class="name"><?=$itemList[$i]->title;?></b>
			<b class="count">������<?=$itemList[$i]->soldCount;?>��</b>
		</span>
	</a>
<?php
}
?>
</div>
</div>
