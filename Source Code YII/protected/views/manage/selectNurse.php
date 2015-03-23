<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'login-form',
	'enableClientValidation'=>true,
	'clientOptions'=>array(
		'validateOnSubmit'=>true,
	),
)); ?>

<h1>Select Nurse</h1>
<h4>Enter Nurse Name OR Unique 'nid'</h4>
<h6>Note:Nurse Names Can Be Similar</h6>



            <label>Nurse:</label>
            <?php echo $form->dropDownList($formSelect,'select',$list,array('class'=>'chosen-select','c'=>'1','tabindex'=>'4')); ?>
            <?php echo $form->error($formSelect,'select'); ?>
            
            <?php echo CHtml::submitButton('Submit',array('id'=>'submit_button')); ?>

<?php $this->endWidget(); ?>