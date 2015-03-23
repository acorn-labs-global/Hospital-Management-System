<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'login-form',
	'enableClientValidation'=>true,
	'clientOptions'=>array(
		'validateOnSubmit'=>true,
	),
)); ?>


            <label>Response:</label>
            <?php echo $form->textArea($formAddCaseResponse,'response',array('placeholder'=>'Breif Case Response')); ?>
            <?php echo $form->error($formAddCaseResponse,'response'); ?>

            <?php echo CHtml::submitButton('Submit',array('id'=>'submit_button')); ?>



<?php $this->endWidget(); ?>
