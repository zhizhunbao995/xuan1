<?php
/** ���ݹ���

 */
?>
<div class="tb-module tshop-um tshop-um-fourimg">
<?php
/**
 * ��ʼ���PHPҳ��
 */
$list = $_MODULE["items"];
$idList=explode(',',$list);
$idList=clearnull($idList);

?>
<ul>
<?php 
if($idList == null){
	$itemList=array("","","","");
}else{
	$itemList=$itemManager->queryByIds($idList,"_hotsell");	
}
for ($i=0; $i < count($itemList); $i++) { 

?>
		<li>
			<a href="<?php echo $uriManager->detailURI($itemList[$i]);?>" target="_blank"><img src="<?php 
			if($itemList[$i] != ""){
				echo $itemList[$i]->getPicUrl(430,430)
			}else{
				echo "http://img03.taobaocdn.com/imgextra/i3/46353909/T2kGHKXdRaXXXXXXXX_!!46353909.jpg";
			}
				?>">
				<Div class="pop">
					<div class="opcity"></div>
					<div class="pop_info">
						<div class="prices">
							<span>RMB</span><strong><?php 
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
					</div>
				</Div>
			</a>
		</li>
<!-- 		<li>
			<a><img src="http://img03.taobaocdn.com/imgextra/i3/46353909/T2kGHKXdRaXXXXXXXX_!!46353909.jpg1"></a>
		</li> -->	
<?php 
}
?>	
	</ul>
</div>
