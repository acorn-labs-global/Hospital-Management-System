<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'login-form',
	'enableClientValidation'=>true,
	'clientOptions'=>array(
		'validateOnSubmit'=>true,
	),
)); ?>

<h1>Select Patient</h1>
<h4>Enter Patient Name OR Unique 'pid'</h4>
<h6>Note:Patient Names Can Be Similar</h6>



            <label>Patient:</label>
            <?php echo $form->dropDownList($formSelect,'select',$list,array('class'=>'chosen-select','c'=>'1','tabindex'=>'4')); ?>
            <?php echo $form->error($formSelect,'select'); ?>
            
            <?php echo CHtml::submitButton('Submit',array('id'=>'submit_button')); ?>

<?php $this->endWidget(); ?>