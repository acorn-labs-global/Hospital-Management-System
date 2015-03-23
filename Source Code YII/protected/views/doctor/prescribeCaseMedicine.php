<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'login-form',
	'enableClientValidation'=>true,
	'clientOptions'=>array(
		'validateOnSubmit'=>true,
	),
)); ?>


            <label>Medicine Name:</label>
            <?php echo $form->textField($formPrescribeCaseMedicine,'med_name',array('placeholder'=>'Breif Case Response')); ?>
            <?php echo $form->error($formPrescribeCaseMedicine,'med_name'); ?>
            
            <label>Frequency:</label>
            <?php echo $form->textField($formPrescribeCaseMedicine,'frequency',array('placeholder'=>'Breif Case Response')); ?>
            <?php echo $form->error($formPrescribeCaseMedicine,'frequency'); ?>
            
            <label>Dose:</label>
            <?php echo $form->textField($formPrescribeCaseMedicine,'dose',array('placeholder'=>'Breif Case Response')); ?>
            <?php echo $form->error($formPrescribeCaseMedicine,'dose'); ?>
            
            <label>Medicine Status :</label>
            <?php echo $form->dropDownList($formPrescribeCaseMedicine,'status',array('1'=>'Active','0'=>'Inactive')); ?>
            
            
            <?php echo CHtml::submitButton('Submit',array('id'=>'submit_button')); ?>



<?php $this->endWidget(); ?>