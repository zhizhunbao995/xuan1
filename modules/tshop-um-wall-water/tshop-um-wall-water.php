<div class="tb-module tshop-um tshop-um-wall-water">
<?php
$massage = array();
$four = array();
$imgad = $_MODULE["imgad"];
$four[0] = array("","","");//默认空数组
$four[1] = array("","","","");
$four[2] = array("","","","");
$four[3] = array("","","","");
$normalTitle ="还没有宝贝呀！赶快进行添加";
for ($i=0; $i < 4 ; $i++) { 
	$list = $_MODULE["item-".$i];
	$jsonlist = $rateManager->parse($list);//变为对象
	$idList = $jsonlist->keySet();//变为 宝贝列表
	$massage[] = $jsonlist;
	for ($t=0; $t < count($four[$i]); $t++) { 
		if($idList != null && $idList[$t] !=null){
			$four[$i][$t] = $idList[$t];
		}
	}
}

?>
<?php 
	creatTit($_MODULE["title"],$_MODULE["more"]);
?>
<Div class="clear">
<?php
for ($j=0; $j < count($four); $j++) { 
		$num = count($four[$j]);
		$temp = clearArray($four[$j]);
		$fornum = $num  - count($temp);//循环几次再
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
		echo "<li class='first' style='background:url({$imgad}) no-repeat;'></li>";
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
				$imgurl = "http://img04.taobaocdn.com/imgextra/i4/46353909/T237z.XdNXXXXXXXXX_!!46353909.png";
				$keyid = 0;
				$itemurl ="";
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
		<div class="shadow">
			<div class="itemimg">
				<div class="imgbox"><img src="<?php echo $imgurl; ?>"> </div>
				<div data-like='{
				    text:"喜欢",
				    skinType:1,
				    type:2,
				    key:<?php echo $keyid;?>,
				    client_id:68
				}'
				class="sns-widget">喜欢 </div> 
			</div>
			<div class="item-title"><a href="<?php echo $itemurl;?>"><?php echo $itemtitle;?></a>
			</div>
			<div class="item-buy">
				<Span class="prices"><i>RMB</i><strong><?php echo $itemRmb;?></strong></Span>
				<a href="http://favorite.taobao.com/popup/add_collection.htm?<?php echo 'id='.$keyid.'&itemtype=1'?>" target="_blank" class="favorite"></a>
			</div>
			<div class="item-tool clearfix ">
				<div data-sharebtn='{
					skinType:3,
					type:"item",
					key:<?php echo $keyid;?>,
					comment:"这个宝贝很赞哦，分享给大家！",
					pic:"<?php echo $imgurl;?>",
					client_id:68,
					isShowFriend:false
				}'
				class="sns-widget">分享</div>
			</div>
			<?
				 $rates = $massage[$j]->get($keyid);
				if (count($rates) != 0){
			?>
			<div class="recomd">
				<?php
				
				    //$rates = $rateManager->queryAuctionRates($keyid);
			       foreach($rates as $rate)
			       {
				?>
			      <Div class="imguser">
			      	<a href="<?=$rate->raterUrl;?>" target="_blank"><img src="<?=$rate->getRaterAvatar('60');?>">  </a> 
			      </Div> 
			      <Div class="feedinfo">
			      	<a href="<?=$rate->raterUrl;?>" target="_blank"><?=$rate->raterNick;?>:</a>
			      	<?=$rate->feedback;?>
			      </Div>   			         
			   <?php 
			       }
			   ?>
			</div>
			<?php
				}
			?>
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
