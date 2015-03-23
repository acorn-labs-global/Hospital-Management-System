<?php if(Yii::app()->user->getState("type")==1): ?>    

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
   
   
   <li class='has-sub '><a href='#'><span>Doctor</span></a>
   <ul>
         <li class='has-sub '><a href='<?php echo $this->createUrl('manage/addDoctor'); ?>'><span>Add</span></a>
            
         </li>
         <li class='has-sub '><a href='<?php echo $this->createUrl('manage/selectDoctor'); ?>'><span>View</span></a>
         </li>
      </ul>
   </li>
   <li class='has-sub '><a href='#'><span>Nurse</span></a>
   <ul>
         <li class='has-sub '><a href='<?php echo $this->createUrl('manage/addNurse'); ?>'><span>Add</span></a>
            
         </li>
         <li class='has-sub '><a href='<?php echo $this->createUrl('manage/selectNurse'); ?>'><span>View</span></a>
         </li>
      </ul>
   </li>
   <li class='has-sub '><a href='#'><span>Management</span></a>
   <ul>
         <li class='has-sub '><a href='<?php echo $this->createUrl('manage/addManagement'); ?>'><span>Add</span></a>
            
         </li>
         <li class='has-sub '><a href='<?php echo $this->createUrl('manage/selectManagement'); ?>'><span>View </span></a>
         </li>
      </ul>
   </li>
   

   
   <li class='has-sub '><a href='#'><span>System Settings</span></a>
   <ul>
         <li class='has-sub '><a href='<?php echo $this->createUrl('manage/addCountry'); ?>'><span>Add Country</span></a>
            
         </li>
         <li class='has-sub '><a href='<?php echo $this->createUrl('manage/addCity'); ?>'><span>Add City</span></a>
         </li>
         
      </ul>
   </li>


</ul>
    
            
            
            
            
            
        </ul>
        
    </div>
    
</div>

<?php endif; ?>