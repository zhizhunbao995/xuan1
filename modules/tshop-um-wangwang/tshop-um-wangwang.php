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
$namelist=$_MODULE['w_name'];
$idlist=$_MODULE['w_id'];
$name=explode('|',$namelist);
$id=explode('|',$idlist);
function getWang(){

}

?>
	<div class="w_list">
		<div class="w_cont">
	<?php 
		for($c=0;$c<2;$c++){
			
?>		<div class="w_box">
		<div class="w_sever">�ͷ�����</div>
		<?php 
		for($i=0;$i<count($name);$i++){
			
	?>	
			<div class="w_item"><span><? echo $name[$i]; ?></span><? echo $uriManager->supportTag($id[$i],222,2); ?></div>
		
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

