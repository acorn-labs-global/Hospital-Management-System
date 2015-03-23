<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'login-form',
	'enableClientValidation'=>true,
	'clientOptions'=>array(
		'validateOnSubmit'=>true,
	),
)); ?>

<h1>Add A Nurse</h1>
            <label>Nurse Name</label>
            <?php echo $form->textField($formAddNurse,'name',array('placeholder'=>'Name')); ?>
            <?php echo $form->error($formAddNurse,'name'); ?>

            <label>Cnic (SSN):</label>
            <?php echo $form->textField($formAddNurse,'cnic',array('placeholder'=>'Nation Identity Number')); ?>
            <?php echo $form->error($formAddNurse,'cnic'); ?>
            
            <label>Phone Number:</label>
            <?php echo $form->textField($formAddNurse,'phno',array('placeholder'=>'Phone Number')); ?>
            <?php echo $form->error($formAddNurse,'phno'); ?>
            
            <label>Sex:</label>
            <?php echo $form->dropDownList($formAddNurse,'sex',array('m'=>'Male','f'=>'Female')); ?>
            <?php echo $form->error($formAddNurse,'sex'); ?>
            
            <label>Marital Status:</label>
            <?php echo $form->dropDownList($formAddNurse,'marital',array('s'=>'Single','m'=>'Married','d'=>'Divorced')); ?>
            <?php echo $form->error($formAddNurse,'marital'); ?>
            
            <label>Date Of Birth:</label>
            <?php $this->widget('zii.widgets.jui.CJuiDatePicker',array(
            'name'=>'formAddNurses[dob]',
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
            <?php echo $form->error($formAddNurse,'dob'); ?>
            
            <label>Password</label>
            <?php echo $form->textField($formAddNurse,'pass',array('placeholder'=>'Password')); ?>
            <?php echo $form->error($formAddNurse,'pass'); ?>
            
            <label>City:</label>
            <?php echo $form->dropDownList($formAddNurse,'city',array($systemCitiesData)); ?>
            <?php echo $form->error($formAddNurse,'city'); ?>
            
            <label>Address:</label>
            <?php echo $form->textArea($formAddNurse,'address',array('placeholder'=>'Home Address Full')); ?>
            <?php echo $form->error($formAddNurse,'address'); ?>
            
            
            
            <?php echo CHtml::submitButton('Submit',array('id'=>'submit_button')); ?>
            
            
                    
<?php $this->endWidget(); ?>