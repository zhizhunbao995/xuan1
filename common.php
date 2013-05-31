<?php
/** 内容规则：
 1.必须满足模块内容规则
 2.该文件用作模块之间共享函数的定义，并最终将合并至设计师模块php页面
 */
?>
<?php
/**
 * 开始书写模块共享函数
 */
function clearnull($items){//检测是否为空
	foreach($items as $item){
		if($item){
			$newItems[]=$item;
		}else{
			continue;
		};
	}
	return $newItems;
}
function clearArray($a){//去除数组空元素
	$newarray = array();
	foreach ($a as $key => $value) {
		if($value){
			$newarray[] = $value
		}else{
			continue;
		}
	}
	return $newarray;
}
function creatTit ($tit,$more){// 标题
	if(isset($tit)){
		$n = $tit;
		$u = isset($more)?$more:"#";
		$html = "<div class='title'>
				<a href={$u}>More></a>
				<span class='titleico'></span>
				<span>{$n}</span>	
			</div>";
		echo $html;
	}
}
?>