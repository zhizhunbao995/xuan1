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
?>