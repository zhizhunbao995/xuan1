<div class="tb-module tshop-um tshop-um-wall-water">
<?php
$four = array();
$four[0] = array("","","");//Ĭ�Ͽ�����
$four[1] = array("","","","");
$four[2] = array("","","","");
$four[3] = array("","","","");
$normalTitle ="��û�б���ѽ���Ͽ�������";
for ($i=0; $i < 4 ; $i++) { 
	$list = $_MODULE["item-".$i];
	$idList=explode(',',$list);
	$idList=clearnull($idList);
	for ($t=0; $t < count($four[$i]); $t++) { 
		if($idList != null && $idList[$t] !=null){
			$four[$i][$t] = $idList[$t]
		}
	}
}

?>
<Div class="clear">
<?php
for ($j=0; $j < count($four); $j++) { 
		$num = count($four[$j]);
		$temp = clearArray($four[$j]);
		$fornum = $num  - count($temp);//ѭ��������
		if(count($temp)==0){
			$itemList=array();
		}else{
			$itemList=$itemManager->queryByIds($temp,"_hotsell");
		}	
		$creattimes = count($itemList) + $fornum;
?>
<ul class='list_wall'>
<?php 	
	if($j == 0){
		echo "<li class='first'></li>";
	}
?>
<?php 
for ($k=0; $k < $creattimes ; $k++) { 
?>
		<?php 
			if($j == 2 && $k ===0 ){
				echo "<li class='height310'>";
			}
			else{
				echo "<li>";
			}
			if ($itemList[$k] == "") {
				$imgurl = "http://img01.taobaocdn.com/imgextra/i1/46353909/T2GLYKXiNXXXXXXXXX_!!46353909.jpg";
				$keyid =0;
				$itemurl ="###";
				$itemtitle  = $normalTitle;
				$itemRmb = "888.00";
			}
			else{
				$imgurl = $itemList[$k]->getPicUrl(220,220);
				$keyid = $itemList[$k]->id;
				$itemurl = $uriManager->detailURI($itemList[$k]);
				$itemtitle  = $itemList[$k]->title;
				$itemRmb = $itemList[$k]->price;
			}
		?>
			<div class="itemimg">
				<div class="imgbox"><img src="<?php echo $imgurl; ?>"> </div>
				<div data-like='{
				    text:"ϲ��",
				    skinType:1,
				    type:2,
				    key:<?php echo $keyid;?>,
				    client_id:68
				}'
				class="sns-widget">ϲ�� </div> 
			</div>
			<div class="item-title"><a href="<?php echo $itemurl;?>"><?php echo $itemtitle;?></a></div>
			<div class="item-buy">
				<Span class="prices"><i>RMB</i><strong><?php echo $itemRmb;?></strong></Span>
				<a href="http://favorite.taobao.com/popup/add_collection.htm?<?php echo 'id='.$keyid.'&itemtype=1'?>" target="_blank" class="favorite"></a>
			</div>
			<div class="item-tool">
				<div data-sharebtn='{
					skinType:3,
					type:"item",
					key:<?php echo $keyid;?>,
					comment:"�����������Ŷ���������ң�",
					pic:<?php echo $imgurl;?>,
					client_id:68,
					isShowFriend:false
				}'
				class="sns-widget">����</div>
			</div>
		</li>

<?php
	} 

?>
	</ul>
<?php
	} 

?>
	<div class="clear"></div>
</Div>
</div>
