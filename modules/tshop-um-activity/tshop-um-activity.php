<div class="tb-module tshop-um tshop-um-activity">
<?php
/**
 * 开始设计PHP页面
 */
$times = $_MODULE["times"]==""?0:$_MODULE["times"];
$times = $times*60*60*1000;

?>
	<Div class="datacont">
		<div class="dataleft">
			<div class="J_TWidget" data-widget-type="Countdown"  data-widget-config="{
     'endTime': '<?=$times;?>',
     'interval': 1000,
     'timeRunCls': '.ks-countdown-run',
     'timeUnitCls':{
    'd': '.ks-d',      
    'h': '.ks-h',      
    'm': '.ks-m',      
    's': '.ks-s'       
     },
     'digit': 2,
     'timeEndCls': '.ks-countdown-end'
}">
    <!-- 倒计时结束时隐藏-->
    <!--可以写多个 -->
    <Div class="sale">
        <div class="ks-countdown-run">
            <span class="ks-d"></span>天
            <span class="ks-h"></span>时
            <span class="ks-m"></span>分
            <span class="ks-s"></span>秒
        </div>        
    </Div>


    <div class="ks-countdown-end">
        <span><?php 
        $test = $_MODULE['activefont'];
        $test ==""? "亲们!活动已结束！": $test;
        echo $test;
        ?></span>
    </div>
    <?php
/**
 * 开始设计PHP页面
 */
$list = $_MODULE["items"];
$idList=explode(',',$list);
$idList=clearnull($idList);

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
        <li class="countdown-end">
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
                    <div class="ks-countdown-end" ></div>
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
<!--        <li>
            <a><img src="http://img03.taobaocdn.com/imgextra/i3/46353909/T2kGHKXdRaXXXXXXXX_!!46353909.jpg1"></a>
        </li> -->   
<?php 
}
?>  
    </ul>
    </div>
</div>
</Div>

</div>
