<?php
/** ���ݹ���
 1.��������ģ�����ݹ���
 2.���ļ�����ģ��֮�乲�����Ķ��壬�����ս��ϲ������ʦģ��phpҳ��
 */
?>
<?php
/**
 * ��ʼ��дģ�鹲����
 */
function clearnull($items){//����Ƿ�Ϊ��
	foreach($items as $item){
		if($item){
			$newItems[]=$item;
		}else{
			continue;
		};
	}
	return $newItems;
}
function clearArray($a){//ȥ�������Ԫ��
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
function creatTit ($tit,$more){
	if(isset($tit)){
		$n = $tit;
		$u = isset($more)?$more:"#";
		$html = "<div class='title'>
				<span class='titleico'></span>
				<span>{$n}</span>
				<a href={$u}>More></a>
			</div>";
		echo $html;
	}
}
?>