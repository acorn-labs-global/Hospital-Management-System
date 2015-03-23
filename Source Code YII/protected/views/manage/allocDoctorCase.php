<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'login-form',
	'enableClientValidation'=>true,
	'clientOptions'=>array(
		'validateOnSubmit'=>true,
	),
)); ?>


            <label>Doctors:</label>
            <?php echo $form->dropDownList($formAllocDoctorCase,'doctors',$doctorAndSpeciality,array('class'=>'chosen-select','c'=>'1','tabindex'=>'4')); ?>
            <?php echo $form->error($formAllocDoctorCase,'doctors'); ?>
            
            <label>Date Of Appointment:</label>
            <?php $this->widget('zii.widgets.jui.CJuiDatePicker',array(
            'name'=>'formAllocDoctorCase[appointment_date]',
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
            <?php echo $form->error($formAllocDoctorCase,'appointment_date'); ?>
            
            <?php echo CHtml::submitButton('Submit',array('id'=>'submit_button')); ?>



<?php $this->endWidget(); ?>
