<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'login-form',
	'enableClientValidation'=>true,
	'clientOptions'=>array(
		'validateOnSubmit'=>true,
	),
)); ?>
<br><br>
<?php 
if($userType==1)
    echo '<h1>Administrator Panel</h1>';
else if ($userType==2)
    echo '<h1>Staff Panel</h1>';
else if ($userType==3)
    echo '<h1>Patient Panel</h1>';
else if ($userType==4)
    echo '<h1>Doctor Panel</h1>';
else
    echo '<h1>Nurse Panel</h1>';
?>
<h3>Login</h3>
<br>

            <label>Userid</label>
            <?php echo $form->textField($formLogin,'userid',array('placeholder'=>'User Id')); ?>
            <?php echo $form->error($formLogin,'userid'); ?>
            
            
            
            <label>Password</label>
            <?php echo $form->passwordField($formLogin,'password',array('placeholder'=>'Password')); ?>
            <?php echo $form->error($formLogin,'password'); ?>
            
            <?php echo CHtml::submitButton('Login',array('id'=>'submit_button')); ?>
<?php $this->endWidget(); ?>

            <br>
            <br>
            <br>
            <br>
            <br><br>
            
            <br>
            <br>
            <br>


 