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

$newarray = array();
$temp = array();
for ($i=1; $i < 2; $i++) { 
	$namelist=$_MODULE['w_name1'];
	$idlist=$_MODULE['w_id1'];
	$name=explode('|',$namelist);
	$id=explode('|',$idlist);
	array_push($temp,$name,$id);
	array_push($newarray,$temp);
	$temp = array();
}
echo var_dump($newarray);

?>
	<div class="w_list">
		<div class="w_cont">
	<?php 
		for($c=0;$c<count($newarray);$c++){
			
?>		<div class="w_box">
		<div class="w_sever"></div>
		<?php 
		for($i=0;$i<count($newarray[$c]);$i++){
			
	?>	
			<div class="w_item img<? echo $j+1; ?>"><a class="w_name" href="javascript:;">
				<span>
				<? echo $newarray[$c][$i][$j]; ?></span></a>

				<? echo $uriManager->supportTag($newarray[$c][$i][$j],222,2); ?>
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

