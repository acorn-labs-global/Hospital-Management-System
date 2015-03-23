<br>
<br>
<br>
<center>
<ul class="small-block-grid-3">
  <li>
  <?php echo CHtml::link(CHtml::image(Yii::app()->request->baseUrl.'/images/login/patient.png'), array('home/login','userType'=>'3'),array('class'=>'th')); ?>
</li>

  <li>
  <?php echo CHtml::link(CHtml::image(Yii::app()->request->baseUrl.'/images/login/doctor.png'), array('home/login','userType'=>'4'),array('class'=>'th')); ?>
</li>

  <li>
  <?php echo CHtml::link(CHtml::image(Yii::app()->request->baseUrl.'/images/login/nurse.png'), array('home/login','userType'=>'5'),array('class'=>'th')); ?>
</li>

  <li>
  <?php echo CHtml::link(CHtml::image(Yii::app()->request->baseUrl.'/images/login/management.png'), array('home/login','userType'=>'1'),array('class'=>'th')); ?>
</li>

  <li>
  <?php echo CHtml::link(CHtml::image(Yii::app()->request->baseUrl.'/images/login/patient-icon.png'), array('home/login','userType'=>'2'),array('class'=>'th')); ?>
</li>

</ul>
    </center>