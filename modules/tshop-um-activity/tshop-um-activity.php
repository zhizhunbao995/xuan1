<div class="tb-module tshop-um tshop-um-activity">
<?php
/**
 * ��ʼ���PHPҳ��
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
    <!-- ����ʱ����ʱ����-->
    <!--����д��� -->
    <Div class="sale">
        <div class="ks-countdown-run">
            <span class="ks-d"></span>��
            <span class="ks-h"></span>ʱ
            <span class="ks-m"></span>��
            <span class="ks-s"></span>��
        </div>        
    </Div>


    <div class="ks-countdown-end">
        <span><?php 
        $test = $_MODULE['activefont'];
        $test ==""? "����!��ѽ�����": $test;
        echo $test;
        ?></span>
    </div>
    <?php
/**
 * ��ʼ���PHPҳ��
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
