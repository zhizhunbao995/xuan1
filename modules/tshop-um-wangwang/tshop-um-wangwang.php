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
/* 循环数组*/
$newarray = array();
/* 临时数组*/
$temp = array();
/* 几组内容 */
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
			for($j=0;$j<count($newarray[$c][0]);$j++){//看是否第一个 name的个数的循环
	?>	
			<div class="w_item">
				
				<a class="w_name" href="#" >
				<img src="<? echo $newarray[$c][2][$j]; ?>" class="w_img">
				<span><? echo $newarray[$c][0][$j]; ?></span></a>
				<? echo $uriManager->supportTag($newarray[$c][1][$j],"客服",2); ?>
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

