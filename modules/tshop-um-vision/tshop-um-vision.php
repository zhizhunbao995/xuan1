<?php
/** ���ݹ���
 1.PHPҳ������ֻ�ܰ���һ����Ԫ�أ����������ǩԪ�أ��Ƽ�"div"Ԫ�أ�
 2.��Ԫ���ඨ�������class="tb-module tshop-um tshop-um-vision"��class���Կ����������Ҫ����ѡ�������壩
 3.Ԫ��class����ֵ��ֹ��"tb-"��"J_T"�ַ���ͷ,��[tb-module, J_TWidget, J_CartPluginTrigger, J_TokenSign]����
 4.��ֹʹ��<style>��ǩ��Ԫ�أ�
 5.��ֹʹ��<script>��ǩ��Ԫ�أ�
 6.��ֹʹ��<link>��ǩ��Ԫ�أ�
 7.��ֹʹ�ñ�ǩ��Ԫ�أ���id����
 8.����ʹ��Ԫ������style����
 */
?>
	<?php
/**
 * ��ʼ���PHPҳ��
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