<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'login-form',
	'enableClientValidation'=>true,
	'clientOptions'=>array(
		'validateOnSubmit'=>true,
	),
)); ?>

<h1>Add Country</h1>

            <label>Case Details:</label>
            <?php echo $form->textField($formAddCountry,'name',array('placeholder'=>'Country Name')); ?>
            <?php echo $form->error($formAddCountry,'name'); ?>
            
      
            

           
            
            <?php echo CHtml::submitButton('Submit',array('id'=>'submit_button')); ?>
            
            
            
            
<?php $this->endWidget(); ?>


  