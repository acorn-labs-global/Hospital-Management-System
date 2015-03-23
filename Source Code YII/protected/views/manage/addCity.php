<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'login-form',
	'enableClientValidation'=>true,
	'clientOptions'=>array(
		'validateOnSubmit'=>true,
	),
)); ?>

<h1>Add City</h1>

            <label>City Name:</label>
            <?php echo $form->textField($formAddCity,'name',array('placeholder'=>'City Name')); ?>
            <?php echo $form->error($formAddCity,'name'); ?>
            
      
            <label>Country:</label>
            <?php echo $form->dropDownList($formAddCity,'country_id',$countries,array('class'=>'chosen-select','c'=>'1','tabindex'=>'4')); ?>
            <?php echo $form->error($formAddCity,'country_id'); ?>
            
            <br><br>
           
            
            <?php echo CHtml::submitButton('Submit',array('id'=>'submit_button')); ?>
            
            
            
            
<?php $this->endWidget(); ?>


  