<?php

/*
 ���ݹ���

 1.PHPҳ������ֻ�ܰ���һ����Ԫ�أ����������ǩԪ�أ��Ƽ�"div"Ԫ�أ�

 2.��Ԫ���ඨ�������class="tb-module tshop-um tshop-um-wangwang"��class���Կ����������Ҫ����ѡ�������壩

 3.Ԫ��class����ֵ��ֹ��"tb-"��"J_T"�ַ���ͷ,��[tb-module, J_TWidget, J_CartPluginTrigger, J_TokenSign]����

 4.��ֹʹ��<style>��ǩ��Ԫ�أ�

 5.��ֹʹ��<script>��ǩ��Ԫ�أ�

 6.��ֹʹ��<link>��ǩ��Ԫ�أ�

 7.��ֹʹ�ñ�ǩ��Ԫ�أ���id����

 8.����ʹ��Ԫ������style����
 */

?>

<div class="tb-module tshop-um tshop-um-wangwang">

<?php

/**
 * ��ʼ���PHPҳ��
 */
/* ѭ������*/
$newarray = array();
/* ��ʱ����*/
$temp = array();
/* �������� */
$items = array();
for ($n=1; $n < 4; $n++) { 	
	if($_MODULE['s_'.$n] == "show"){
		global $items;
		array_push($items,$_MODULE['s_'.$n]);
	}
}
for ($i=1; $i < count($items)+1; $i++) { 
	$namelist=$_MODULE['w_name'.$i];
	$idlist=$_MODULE['w_id'.$i];
	$imglist=$_MODULE['w_img'.$i];
	$name=explode('|',$namelist);
	$id=explode('|',$idlist);
	$img=explode('|',$imglist);
	array_splice($name, 3);
	array_splice($id, 3);
	array_splice($img, 3);
	array_push($temp,$name,$id,$img);
	array_push($newarray,$temp);
	$temp = array();
}
?>
	<div class="w_list">
		<div class="w_cont">
	<?php 
		for($c=0;$c<count($newarray);$c++){
			
?>		<div class="w_box">
		<div class="w_sever"></div>
		<?php 
			for($j=0;$j<count($newarray[$c][0]);$j++){//���Ƿ��һ�� name�ĸ�����ѭ��
	?>	
			<div class="w_item">
				
				<a class="w_name" href="#" >
				<img src="<? echo $newarray[$c][2][$j]; ?>" class="w_img">
				<span><? echo $newarray[$c][0][$j]; ?></span></a>
				<? echo $uriManager->supportTag($newarray[$c][1][$j],"�ͷ�",2); ?>
			</div>
		<?php 
	}
	?>
		</div>
		<?php 
	}
	?>
		</div>
	</div>
</div>

