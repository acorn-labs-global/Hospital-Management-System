<h1>System Countries</h1>


<table>
  <thead>
    <tr>
        <th>Country Id</th>
      <th width="200">Country Name</th>
    </tr>
  </thead>
  <tbody>
    
        <?php foreach($countries as $country): ?>
      <tr><td><?php echo $country->id ?></td>
      <td><?php  echo $country->name; ?></td></tr>
      <?php endforeach; ?>
    
  </tbody>
</table>