<div class="tb-module tshop-um tshop-um-kindfour">
<?php
/**
 * ��ʼ���PHPҳ��
 */
$list = $_MODULE["items"];
$idList=explode(',',$list);
$idList=clearnull($idList);

?>
<?php 
	creatTit($_MODULE["title"],$_MODULE["more"]);
?>
<ul class="clear">
<?php 
if($idList == null){
	$itemList=array("","","","");
}else{
	$itemList=$itemManager->queryByIds($idList,"_hotsell");	
}
for ($i=0; $i < count($itemList); $i++) { 

?>
		<li>
			<a href="<?php
			if($itemList[$i] == ""){
				echo "http://img03.taobaocdn.com/imgextra/i3/46353909/T2kGHKXdRaXXXXXXXX_!!46353909.jpg"
			}else{
				echo $uriManager->detailURI($itemList[$i]);
			}
			?>" target="_blank" class="mouse"><img src="<?php 
			if($itemList[$i] != ""){
				echo $itemList[$i]->getPicUrl(430,430)
			}else{
				echo "http://img03.taobaocdn.com/imgextra/i3/46353909/T2kGHKXdRaXXXXXXXX_!!46353909.jpg";
			}
				?>">
				<Div class="pop">
					<!-- <div class="opcity" ></div> -->
					<div class="pop_info">
						<Div class="titlename">
						<?php 
							if ($itemList[$i] != "") {
								echo $itemList[$i]->title;
							}else{
								echo "�׻�û����ƷŶ�����ȷ�����Ʒ����ģ����Զ���ȡ��Ŷ";
							}
							?></Div>
					</div>
				</Div>
			</a>
			<div class="prices">
				<span>��</span><strong><?php 
				if ($itemList[$i] != "") {
					echo $itemList[$i]->price;
				}else{
					echo "888.00";
				}
				?></strong>
			</div>
			<div class="xiao">���30���۳�<Span><?php 
			if ($itemList[$i] != "") {
					echo $itemList[$i]->soldCount;
				}else{
					echo "66";
				}
			?></Span>��</div>
		</li>
<?php 
}
?>	
	</ul>

</div>
