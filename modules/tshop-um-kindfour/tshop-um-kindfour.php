<div class="tb-module tshop-um tshop-um-kindfour">
<?php
/**
 * 开始设计PHP页面
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
								echo "亲还没有商品哦，请先发布商品，本模块会自动读取的哦";
							}
							?></Div>
					</div>
				</Div>
			</a>
			<div class="prices">
				<span>￥</span><strong><?php 
				if ($itemList[$i] != "") {
					echo $itemList[$i]->price;
				}else{
					echo "888.00";
				}
				?></strong>
			</div>
			<div class="xiao">最近30天售出<Span><?php 
			if ($itemList[$i] != "") {
					echo $itemList[$i]->soldCount;
				}else{
					echo "66";
				}
			?></Span>件</div>
		</li>
<?php 
}
?>	
	</ul>

</div>
