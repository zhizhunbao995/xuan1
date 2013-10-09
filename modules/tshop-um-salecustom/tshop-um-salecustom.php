<div class="tb-module tshop-um tshop-um-salecustom">
<?php
/**
 * 开始设计PHP页面
 */
$list = array();
$c = $_MODULE["color"];
$h = $_MODULE["height"];
$u =$_MODULE["imgurl"];
$url = $u ==""?:$u;
$color = $c  ==""?"transparent":$c ;
$height = $h==""?560:$h;
for ($i=0; $i < 6; $i++) { 
	$w=$_MODULE["box{$i}-width"];
	$f=$_MODULE["box{$i}-fixed"];
	$u=$_MODULE["box{$i}-url"];
	$temp = array();
	array_push($temp,$w,$f,$u);
	array_push($list, $temp);
}
?>
	<div class="custom" style="height:<? echo $height;?>px;background-image:url(<? echo $url;?>);">
		<?
			for ($j=0,$l = count($list); $j < $l; $j++) { 
				$w = explode(",", $list[$j][0]);
				$t = explode(",", $list[$j][1]);
				$w_h = clearnull($w)==null?array(0,0):$w;
				$t_l = clearnull($t)==null?array(0,0):$t;
				echo "<a href='{$list[$j][2]}' target='_blank' style='width:{$w_h[0]}px;height:{$w_h[1]}px;top:{$t_l[0]}px;left:{$t_l[1]}px;border:1px solid {$color};'></a>"
			}
		?>
	</div>
</div>
