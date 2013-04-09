<?php

/*
 内容规则：

 1.PHP页面内容只能包含一个根元素（允许任意标签元素，推荐"div"元素）

 2.根元素类定义包含：class="tb-module tshop-um tshop-um-wangwang"（class属性可以添加您需要的类选择器定义）

 3.元素class属性值禁止以"tb-"和"J_T"字符开头,除[tb-module, J_TWidget, J_CartPluginTrigger, J_TokenSign]以外

 4.禁止使用<style>标签（元素）

 5.禁止使用<script>标签（元素）

 6.禁止使用<link>标签（元素）

 7.禁止使用标签（元素）的id属性

 8.允许使用元素内联style属性
 */

?>

<div class="tb-module tshop-um tshop-um-wangwang">

<?php

/**
 * 开始设计PHP页面
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

