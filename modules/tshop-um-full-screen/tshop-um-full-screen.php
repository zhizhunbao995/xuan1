<?php

//ȫ������

//��������

$bgcolor=$_MODULE['cs-bgcolor'];

$boxHeight=$_MODULE['img_height']?$_MODULE['img_height']:560;

$num = 5;//ͼƬ��ַ����ת��ַһ��Ϊ10
?>



<div class="tb-module tshop-um tshop-um-full-screen" 
	>
	<div  class="mall-slide J_TWidget dd" data-widget-type="Carousel" 

data-widget-config="{'navCls':'ks-switchable-nav','contentCls':'ks-switchable-content','effect':'<?php echo $_MODULE['effect']; ?>','easing': 'easeOut', 'steps':1, 'circular': false,
	'duration':2, 
'prevBtnCls': 'mall-prev', 'nextBtnCls': 'mall-next', 'disableBtnCls': 'disable' }">
		<div  class="mall-content clearfix" style="height:<?php echo $boxHeight.'px';?>" >
			<div class="J_TWidget hidden" data-widget-type="Popup" data-widget-config="{
			          'trigger':'.mall-content',
			          'align':{
			                  'node':'.mall-content',
			                  'offset':[0,0],
			                  'points':['cl','cl']
			                  }
			            }">
			   <a class="mall-prev"></a>
			</div>
			<div class="J_TWidget hidden" data-widget-type="Popup" data-widget-config="{
			          'trigger':'.mall-content',
			          'align':{
			                  'node':'.mall-content',
			                  'offset':[0,0],
			                  'points':['cr','cr']
			                  }
			            }">
			   		<a class="mall-next"></a>
			</div>		
			<div class="full" style="width:2400px;">
			<ul class="ks-switchable-content">
				<?php

	for($i = 1;$i<=$num;$i++){

?>
				<li class="big-piclist" style="background:<?php echo $_MODULE["img".$i."_color"]=="" ? "#fbdade": $_MODULE["img".$i."_color"];?>">
					<a href="<? echo $_MODULE["img".$i."_href"];?>
						" target="_blank">
						<img  src = "<? echo $_MODULE["img".$i];?>" alt=""></a>
				</li>
				<?php 

	}

?></ul>
</div>
			<ul class="ks-switchable-nav">
				<?php

				for($i = 1;$i<=$num;$i++){

				if($i == 1){

					$classon = "ks-active";

				}else{

					$classon = "";

				}

?>
		<li class="<? echo $classon;?>">
			<? echo $_MODULE["img".$i."_text"];?></li>
		<?php 

	}

?></ul>
		</div>
	</div>

</div>