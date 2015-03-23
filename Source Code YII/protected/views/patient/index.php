<h1>Patient Cases</h1>


<br>
<center>
<table>
      <thead>
    <tr>
      <th width="200">Case Numbers</th>
      <th>Description (Short)</th>
      <th width="150">Doctors Name</th>
      <th width="150">Case Status</th>
    </tr>
  </thead>
    <?php 
    $temp_date="";
    foreach($patientCases as $case): ?>
       <thead>
    <tr>
      <th width="200"><?php echo $case['rec_date']; ?></th>
      </tr>
      </thead>

  <tbody>
    <tr>
      <td><?php echo CHtml::link('Case #'.$case['cid'],array('patient/view','caseId'=>$case['cid'])); ?></td>
      <td><?php echo $case['case_details']; ?></td>
      <td><?php echo $case['names'] ?></td>
      <td><?php if($case['case_status']=='1') echo "Active"; else echo 'Inactive';  ?> </td>
    </tr>
  </tbody>
      <?php endforeach; ?>
</table>
    </center>