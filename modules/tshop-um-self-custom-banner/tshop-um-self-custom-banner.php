<?php
/** ���ݹ���
 1.PHPҳ������ֻ�ܰ���һ����Ԫ�أ����������ǩԪ�أ��Ƽ�"div"Ԫ�أ�
 2.��Ԫ���ඨ�������class="tb-module tshop-um tshop-um-self-custom-banner"��class���Կ����������Ҫ����ѡ�������壩
 3.Ԫ��class����ֵ��ֹ��"tb-"��"J_T"�ַ���ͷ,��[tb-module, J_TWidget, J_CartPluginTrigger, J_TokenSign]����
 4.��ֹʹ��<style>��ǩ��Ԫ�أ�
 5.��ֹʹ��<script>��ǩ��Ԫ�أ�
 6.��ֹʹ��<link>��ǩ��Ԫ�أ�
 7.��ֹʹ�ñ�ǩ��Ԫ�أ���id����
 8.����ʹ��Ԫ������style����
 */
?>
<div class="tb-module tshop-um tshop-um-self-custom-banner">
<?php
/**
 * ��ʼ���PHPҳ��
 */
$w = $_MODULE["shop_w"];
$wlist = explode("|", $w);
$showfont = $_MODULE["shop_font"];
$catArr=array();
$itemArr=array();//��Ʒ����
$itemNum =1;
$allShopCategory=$shopCategoryManager->queryAll();
foreach($allShopCategory as $shopCategory){
	//echo $shopCategory->id."\n";
	$catArr[]=$shopCategory->id;      //��ĿID
}
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
		<a class="btn1" href="<?php echo $uriManager->favoriteLink();?>" title="�ղص���">�ղ�</a>
		<a class="btn3" href="<?php 
		if($_MODULE["shop_recommend"] == ""){
			echo $_shop->logoUrl;
		}else{
			echo $_MODULE["shop_recommend"];
		}
		?>" title="�Ƽ�����">�Ƽ�</a>
		<div class="btn2" >�ͷ�<div class="J_TWidget hidden" data-widget-type="Popup" data-widget-config="{
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
					 echo $uriManager->supportTag($wlist[$i],"�ͷ�",1);
				}  
		?>
		    </div>
		</div>
	</div>
	</div>
</div>
</div>
