<h1>Patient - Cases</h1>

<br>
<center>
<table>
      <thead>
    <tr>
      <th width="200">Case Numbers</th>
      <th>Description (Short)</th>
      <th width="150">Patient Id</th>
      <th width="150">Case Status</th>
    </tr>
  </thead>
    <?php 
    foreach($cases as $case): ?>

  <tbody>
    <tr>
      <td><?php echo CHtml::link('Case #'.$case->cid,array('nurse/view','caseId'=>$case->cid,'patientId'=>$case->hms_patient_pid)); ?></td>
      <td><?php echo substr($case->case_details,1,200); ?></td>
      <td><?php echo $case->hms_patient_pid; ?></td>
      <td><?php if($case->case_status=='1') echo "Active"; else echo 'Inactive';  ?> </td>
    </tr>
  </tbody>
      <?php endforeach; ?>
</table>
    </center>