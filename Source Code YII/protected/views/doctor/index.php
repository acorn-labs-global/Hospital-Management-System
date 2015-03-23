<h1>Doctor - Appointments</h1>

<br>
<center>
<table>
      <thead>
    <tr>
      <th width="200">Case Numbers</th>
      <th>Description (Short)</th>
      <th width="150">Patient Name</th>
      <th width="150">Case Status</th>
    </tr>
  </thead>
    <?php 
    $temp_date="";
    foreach($doctorAppointments as $appointment): 
    if($temp_date!=$appointment['appointment_date']):  ?>
       <thead>
    <tr>
      <th width="200"><?php echo $appointment['appointment_date']; ?></th>
      </tr>
      </thead>
    <?php endif; ?>

  <tbody>
    <tr>
      <td><?php echo CHtml::link('Case #'.$appointment['cid'],array('doctor/view','caseId'=>$appointment['cid'],'patientId'=>$appointment['pid'])); ?></td>
      <td><?php echo $appointment['case_details']; ?></td>
      <td><?php echo CHtml::link($appointment['name'],array('doctor/view','patientId'=>$appointment['pid'],'caseId'=>$appointment['cid'])); ?></td>
      <td><?php if($appointment['case_status']=='1') echo "Active"; else echo 'Inactive';  ?> </td>
    </tr>
  </tbody>
      <?php $temp_date=$appointment['appointment_date']; ?> 
      <?php endforeach; ?>
</table>
    </center>