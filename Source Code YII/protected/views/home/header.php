<?php if(Yii::app()->user->isGuest): ?>    
<div class="head">
   		<div class="logo">
        	<img src="<?php echo Yii::app()->request->baseUrl; ?>/images/mainsite/Logo.png" />
        </div>
    </div>
<?php endif; ?>