<?php
/** 内容规则：
 1.PHP页面内容只能包含一个根元素（允许任意标签元素，推荐"div"元素）
 2.根元素类定义包含：class="tb-module tshop-um tshop-um-vision"（class属性可以添加您需要的类选择器定义）
 3.元素class属性值禁止以"tb-"和"J_T"字符开头,除[tb-module, J_TWidget, J_CartPluginTrigger, J_TokenSign]以外
 4.禁止使用<style>标签（元素）
 5.禁止使用<script>标签（元素）
 6.禁止使用<link>标签（元素）
 7.禁止使用标签（元素）的id属性
 8.允许使用元素内联style属性
 */
?>
	<?php
/**
 * 开始设计PHP页面
 */
$imgheight = $_MODULE["imgheight"]>500?500:$_MODULE["imgheight"];
$imgsrc = $_MODULE["imgsrc"];
$asrc = $_MODULE["asrc"];
$color = $_MODULE["color"];
?>
<div class="tb-module tshop-um tshop-um-vision" style="height:<?php echo $imgheight;?>px;">

<Div style="width: 2400px;height:<?php echo $imgheight;?>px;position: absolute;z-index: 5;margin-left: -1200px;left: 50%;top: 0;zoom: 1;background:<?=$color;?>;" class="box">
		<span class="top-shadow"></span>
	<span class="right-shadow"></span>
	<span class="left-shadow"></span>
	<span class="bottom-shadow"></span>
	<Div>
		<a href="<?php echo $asrc;?>"><div style="background-image:url('<?php echo $imgsrc;?>');height:<?php echo $imgheight;?>px;" class="img" ></div>
	</a>
	</Div>
</Div>
</div>