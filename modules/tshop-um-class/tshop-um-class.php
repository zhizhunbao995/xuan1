<?php
/** ���ݹ���
 1.PHPҳ������ֻ�ܰ���һ����Ԫ�أ����������ǩԪ�أ��Ƽ�"div"Ԫ�أ�
 2.��Ԫ���ඨ�������class="tb-module tshop-um tshop-um-class"��class���Կ����������Ҫ����ѡ�������壩
 3.Ԫ��class����ֵ��ֹ��"tb-"��"J_T"�ַ���ͷ,��[tb-module, J_TWidget, J_CartPluginTrigger, J_TokenSign]����
 4.��ֹʹ��<style>��ǩ��Ԫ�أ�
 5.��ֹʹ��<script>��ǩ��Ԫ�أ�
 6.��ֹʹ��<link>��ǩ��Ԫ�أ�
 7.��ֹʹ�ñ�ǩ��Ԫ�أ���id����
 8.����ʹ��Ԫ������style����
 */
?>
<div class="tb-module tshop-um tshop-um-class">
	<div class="clear">
	<div class="class-title">
	<h1>�����Ƽ�</h1>
	<div class="class-img">
		<a href="<?php echo $_MODULE['class-img'];?>"><img src="<?php echo $_MODULE['class-url'];?>"></a>
	</div>
</div>
<?php
/**
 * ��ʼ���PHPҳ��
 */

 $subCategories = $shopCategoryManager->queryAll();

 $l = $shopCategoryManager->queryById($subCategories[0]->id);
//echo $uriManager->shopIntrURI();//����
 //echo $uriManager->shopCategoryURI($l);
 //echo $uriManager->searchURI();
 $num = 0;
// ��Ŀѡ�������
 $itemString=$_MODULE['t-item'];
 $idList=json_decode($itemString);
foreach ($idList as  $value) {
	$shopCategory =  $shopCategoryManager->queryById($value->{rid});
	echo $shopCategory->{uri}."      ";
	$array = explode(",",$value->{childIds});
	foreach ($array as $id) {
		$subShopCategory =  $shopCategoryManager->queryById($id);
		//echo  $uriManager->shopCategoryURI ($subShopCategory);
	}
}
?>
<ul>
<?php 
	foreach($subCategories as $shopCategory){
	 $sublist = $shopCategoryManager->querySubCategories($shopCategory->id);
	 if($num++<6){//����5��
	
?>
	<li>
		<div class="first-m"><a href="<?=$uriManager->shopCategoryURI($shopCategory);?>"><?php 	 echo $shopCategory->name;?></a></div>
		<div class="first-sub">
			<?php
					foreach($sublist as $sub){
	  				$l = $shopCategoryManager->queryById($sub->id);
			?>

			<a href="<?=$uriManager->shopCategoryURI($l);?>"><?php echo $sub->name;?></a>
			<?php
				}
			?>
		</div>
	</li>
<?php
	
}
	}
?>
</ul>
</div>
</div>
