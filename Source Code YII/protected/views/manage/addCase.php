<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'login-form',
	'enableClientValidation'=>true,
	'clientOptions'=>array(
		'validateOnSubmit'=>true,
	),
)); ?>


<?php 
$case_status_dropDown=array('1'=>'Active','0'=>'Resolved');
?>


            <label>Patient Id</label>
            <?php echo $patientData->pid; ?>

            <label>Patient Name</label>
            <?php echo $patientData->name; ?>
            

            <label>Case Details:</label>
            <?php echo $form->textArea($formAddCase,'case_details',array('placeholder'=>'Breif Case Description')); ?>
            <?php echo $form->error($formAddCase,'case_details'); ?>
            
            <label>Case Status :</label>
            <?php echo $form->dropDownList($formAddCase,'case_status',array($case_status_dropDown)); ?>
            
            

           
            
            <?php echo CHtml::submitButton('Submit',array('id'=>'submit_button')); ?>
            
            
            
            
<?php $this->endWidget(); ?>


  