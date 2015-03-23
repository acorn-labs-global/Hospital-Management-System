<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'login-form',
	'enableClientValidation'=>true,
	'clientOptions'=>array(
		'validateOnSubmit'=>true,
	),
)); ?>

<h1>Add A Management</h1>

            <label>Name</label>
            <?php echo $form->textField($formAddManagement,'name',array('placeholder'=>'Name')); ?>
            <?php echo $form->error($formAddManagement,'name'); ?>

            <label>Cnic (SSN):</label>
            <?php echo $form->textField($formAddManagement,'cnic',array('placeholder'=>'Nation Identity Number')); ?>
            <?php echo $form->error($formAddManagement,'cnic'); ?>
            
            <label>Phone Number:</label>
            <?php echo $form->textField($formAddManagement,'phno',array('placeholder'=>'Phone Number')); ?>
            <?php echo $form->error($formAddManagement,'phno'); ?>
            
            <label>Sex:</label>
            <?php echo $form->dropDownList($formAddManagement,'sex',array('m'=>'Male','f'=>'Female')); ?>
            <?php echo $form->error($formAddManagement,'sex'); ?>
            
            <label>Marital Status:</label>
            <?php echo $form->dropDownList($formAddManagement,'marital',array('s'=>'Single','m'=>'Married','d'=>'Divorced')); ?>
            <?php echo $form->error($formAddManagement,'marital'); ?>
            
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
            <?php echo $form->error($formAddManagement,'dob'); ?>
            
            <label>Password</label>
            <?php echo $form->textField($formAddManagement,'pass',array('placeholder'=>'Password')); ?>
            <?php echo $form->error($formAddManagement,'pass'); ?>
            
            
            <label>City:</label>
            <?php echo $form->dropDownList($formAddManagement,'city',array($systemCitiesData)); ?>
            <?php echo $form->error($formAddManagement,'city'); ?>
            
            <label>Address:</label>
            <?php echo $form->textArea($formAddManagement,'address',array('placeholder'=>'Home Address Full')); ?>
            <?php echo $form->error($formAddManagement,'address'); ?>
            
            
            <label>User Level:</label>
            <?php echo $form->dropDownList($formAddManagement,'level',$managementUserLevels); ?>
            <?php echo $form->error($formAddManagement,'level'); ?>
            
            
            <?php echo CHtml::submitButton('submit',array('id'=>'submit_button')); ?>
            
            
            
            
<?php $this->endWidget(); ?>