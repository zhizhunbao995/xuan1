<?php
/**
 */
?>
<div class="tb-module tshop-um tshop-um-footer">
<?php
/**
 * 开始设计PHP页面
 */
$temp = array();
$cont = array();
$img = array("http://img01.taobaocdn.com/imgextra/i1/46353909/T2jTP8XXhXXXXXXXXX_!!46353909.png","http://img03.taobaocdn.com/imgextra/i3/46353909/T27Nz7XhlaXXXXXXXX_!!46353909.png","http://img01.taobaocdn.com/imgextra/i1/46353909/T2RVOsXj8cXXXXXXXX_!!46353909.png","http://img03.taobaocdn.com/imgextra/i3/46353909/T2XgY8XgtXXXXXXXXX_!!46353909.png");
for ($i=0; $i < 4 ; $i++) { 
	$h = $_MODULE["h-".$i];
	$temp[] = $h;
	$c = $_MODULE["c-".$i];
	$cont[] = $c;
}	
?>
	<ul class="clear">
<?php
for ($j=0; $j < count($temp) ; $j++) { 
	
 ?>
		<li>
			<h1><?=$temp[$j];?></h1>
			<div class="itemico">
				<span><img src="<?=$img[$j];?>"></span>
				<p><?=$cont[$j];?></p>
			</div>
		</li>

<?php 
	}
?>
	</ul>
</div>
