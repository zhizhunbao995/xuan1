<?php

/** ���ݹ���

 1.PHPҳ������ֻ�ܰ���һ����Ԫ�أ����������ǩԪ�أ��Ƽ�"div"Ԫ�أ�

 2.��Ԫ���ඨ�������class="tb-module tshop-um tshop-um-header_scroll"��class���Կ����������Ҫ����ѡ�������壩

 3.Ԫ��class����ֵ��ֹ��"tb-"��"J_T"�ַ���ͷ,��[tb-module, J_TWidget, J_CartPluginTrigger, J_TokenSign]����

 4.��ֹʹ��<style>
��ǩ��Ԫ�أ�

 5.��ֹʹ��
<script>��ǩ��Ԫ�أ�

 6.��ֹʹ��<link>��ǩ��Ԫ�أ�

 7.��ֹʹ�ñ�ǩ��Ԫ�أ���id����

 8.����ʹ��Ԫ������style����
 */

?>

<?php

//ȫ������

//��������

$bgcolor=$_MODULE['cs-bgcolor'];

$boxHeight=$_MODULE['img_height']?$_MODULE['img_height']:380;

$allshop = $_MODULE['cetagorylist'];//�����Ŀ

$itemNum=0; //��ȡ�û��ṩ�ı�������

$itemList=array();  //��������

$imgList=array();   //ͼƬ����


//���û��Ǹ���ȡ����

$itemString=$_MODULE['cs1-item'];

$idList=explode(',',$itemString);

//����û�û��ѡ�񱦱�,����������������Ϊ1,����Ҫ����������

$idList=clearnull($idList);



if(count($idList)==0){

	//����ѡ����û������

	$itemList=getItems(9,$shopCategoryManager,$itemManager);//��ñ��������б�

	//��ϵͳ��ȡ������,һ��Ҫ�жϸ���

	$itemNum=count($itemList);

}else{

	//����ѡ����������

	$itemList=$itemManager->queryByIds($idList,"hotsell");  

	$itemNum=count($idList);

}

//print_r($itemList);

//��ȡͼƬ

$bimg=$_MODULE['cs1-bimg'];  //��ȡ��ͼƬ

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

// ȫ��ͼƬ��ַ

$num = 5;//ͼƬ��ַ����ת��ַһ��Ϊ10
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