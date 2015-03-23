<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'login-form',
	'enableClientValidation'=>true,
	'clientOptions'=>array(
		'validateOnSubmit'=>true,
	),
)); ?>


<h1>Add A Doctor</h1>
            <label>Doctor Name</label>
            <?php echo $form->textField($formAddDoctor,'name',array('placeholder'=>'Name')); ?>
            <?php echo $form->error($formAddDoctor,'name'); ?>

            <label>Cnic (SSN):</label>
            <?php echo $form->textField($formAddDoctor,'cnic',array('placeholder'=>'Nation Identity Number')); ?>
            <?php echo $form->error($formAddDoctor,'cnic'); ?>
            
            <label>Phone Number:</label>
            <?php echo $form->textField($formAddDoctor,'phno',array('placeholder'=>'Phone Number')); ?>
            <?php echo $form->error($formAddDoctor,'phno'); ?>
            
            <label>Sex:</label>
            <?php echo $form->dropDownList($formAddDoctor,'sex',array('m'=>'Male','f'=>'Female')); ?>
            <?php echo $form->error($formAddDoctor,'sex'); ?>
            
            <label>Marital Status:</label>
            <?php echo $form->dropDownList($formAddDoctor,'marital',array('s'=>'Single','m'=>'Married','d'=>'Divorced')); ?>
            <?php echo $form->error($formAddDoctor,'marital'); ?>
            
            <label>Date Of Birth:</label>
            <?php $this->widget('zii.widgets.jui.CJuiDatePicker',array(
            'name'=>'formAddDoctor[dob]',
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
            <?php echo $form->error($formAddDoctor,'dob'); ?>
            
            <label>Password</label>
            <?php echo $form->textField($formAddDoctor,'pass',array('placeholder'=>'Password')); ?>
            <?php echo $form->error($formAddDoctor,'pass'); ?>
            
            
             <label>City:</label>
            <?php echo $form->dropDownList($formAddDoctor,'city',array($systemCitiesData)); ?>
            <?php echo $form->error($formAddDoctor,'city'); ?>
            
            <label>Address:</label>
            <?php echo $form->textArea($formAddDoctor,'address',array('placeholder'=>'Home Address Full')); ?>
            <?php echo $form->error($formAddDoctor,'address'); ?>
            
            
            
            
            <?php echo CHtml::submitButton('Submit',array('id'=>'submit_button')); ?>
            
            
            
            
<?php $this->endWidget(); ?>