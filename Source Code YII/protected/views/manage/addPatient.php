<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'login-form',
	'enableClientValidation'=>true,
	'clientOptions'=>array(
		'validateOnSubmit'=>true,
	),
)); ?>
<h1>Add A Patient</h1> | 



            <label>Patient Name</label>
            <?php echo $form->textField($formAddPatient,'name',array('placeholder'=>'Name')); ?>
            <?php echo $form->error($formAddPatient,'name'); ?>

            <label>Cnic (SSN):</label>
            <?php echo $form->textField($formAddPatient,'cnic',array('placeholder'=>'Nation Identity Number')); ?>
            <?php echo $form->error($formAddPatient,'cnic'); ?>
            
            <label>Phone Number:</label>
            <?php echo $form->textField($formAddPatient,'phno',array('placeholder'=>'Phone Number')); ?>
            <?php echo $form->error($formAddPatient,'phno'); ?>
            
            <label>Sex:</label>
            <?php echo $form->dropDownList($formAddPatient,'sex',array('m'=>'Male','f'=>'Female')); ?>
            <?php echo $form->error($formAddPatient,'sex'); ?>
            
            <label>Marital Status:</label>
            <?php echo $form->dropDownList($formAddPatient,'marital',array('s'=>'Single','m'=>'Married','d'=>'Divorced')); ?>
            <?php echo $form->error($formAddPatient,'marital'); ?>
            
            <label>Date Of Birth:</label>
            <?php $this->widget('zii.widgets.jui.CJuiDatePicker',array(
            'name'=>'formAddPatient[dob]',
            'flat'=>true,//remove to hide the datepicker
            'options'=>array(
            'dateFormat' => 'yy-mm-dd',
            'showAnim'=>'slide',//'slide','fold','slideDown','fadeIn','blind','bounce','clip','drop'
            'changeMonth'=>true,
            'changeYear'=>true,
            'yearRange'=>'1900:2099',
            'minDate' => '1900-01-01',      // minimum date
            'maxDate' => '2099-12-31',      // maximum date
            ),
            'htmlOptions'=>array(
            'style'=>''
            ),
            ));?>
            <?php echo $form->error($formAddPatient,'dob'); ?>
            
            <label>Password</label>
            <?php echo $form->textField($formAddPatient,'pass',array('placeholder'=>'Password')); ?>
            <?php echo $form->error($formAddPatient,'pass'); ?>
            
            
            <label>City:</label>
            <?php echo $form->dropDownList($formAddPatient,'city',array($systemCitiesData)); ?>
            <?php echo $form->error($formAddPatient,'city'); ?>
            
            <label>Address:</label>
            <?php echo $form->textArea($formAddPatient,'address',array('placeholder'=>'Home Address Full')); ?>
            <?php echo $form->error($formAddPatient,'address'); ?>
            
            
            
            
            <?php echo CHtml::submitButton('Submit',array('id'=>'submit_button')); ?>
            
            
            
            
<?php $this->endWidget(); ?>