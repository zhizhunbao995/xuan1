<div class="tb-module tshop-um tshop-um-wangwang">

<?php
/* 循环数组*/
$newarray = array();
/* 临时数组*/
$temp = array();
/* 几组内容 */
$items = array();
for ($n=1; $n < 5; $n++) { 	
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
				<a class="w_name" target="_blank" 
				href="<? echo "http://www.taobao.com/webww/ww.php?ver=3&touid=".mb_convert_encoding($newarray[$c][1][$j], 'utf-8', 'gb2312')."&siteid=cntaobao&status=2&charset=utf-8"?>" >
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

