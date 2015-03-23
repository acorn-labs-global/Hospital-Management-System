<?php if(Yii::app()->user->getState("type")==2): ?>    

<div class="head">
   		<div class="logo">
        	<img src="<?php echo Yii::app()->request->baseUrl; ?>/images/mainsite/Logo.png" />
        </div>
        
        <div class="buttons">
        	<?php echo CHtml::link(CHtml::image(Yii::app()->request->baseUrl.'/images/mainsite/png icons/32px/home2.png','',array('height'=>'20', 'width'=>'20')), array('home/index')); ?>
        	<!--<a href="#"><img src="<?php echo Yii::app()->request->baseUrl; ?>/images/mainsite/png icons/32px/wrench.png" height="20" width="20" /></a>-->
            
            <?php echo CHtml::link(CHtml::image(Yii::app()->request->baseUrl.'/images/mainsite/png icons/32px/switch.png','',array('height'=>'20', 'width'=>'20')), array('home/LogOut')); ?> 

        </div>
        
    </div>
    
    <div class="navigation">
    	
    <div id='cssmenu'>
<ul>
   <li class='has-sub '><a href='<?php echo $this->createUrl('manage/index'); ?>' class="active"><span>Home</span></a>
      <ul>

      </ul>
   </li>
   <li class='has-sub '><a href='#' class="active"><span>Case</span></a>
      <ul>
          <li class='has-sub '><a href='<?php echo $this->createUrl('manage/selectPatient'); ?>'><span>Add</span></a>
            
         </li>
      </ul>
   </li>
   <li class='has-sub '><a href='#'><span>Patient</span></a>
   <ul>
         <li class='has-sub '><a href='<?php echo $this->createUrl('manage/addPatient'); ?>'><span>Add</span></a>
            
         </li>
         <li class='has-sub '><a href='<?php echo $this->createUrl('manage/selectPatient'); ?>'><span>View</span></a>
         </li>
      </ul>
   </li>
   


   

   


</ul>
    
            
            
            
            
            
        </ul>
        
    </div>
    
</div>

<?php endif; ?>