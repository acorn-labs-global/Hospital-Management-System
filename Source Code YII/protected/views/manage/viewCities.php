<h1>System Cities</h1>


<table>
  <thead>
    <tr>
        <th>City Id</th>
      <th width="200">City Name</th>
    </tr>
  </thead>
  <tbody>
        
        <?php 
        $temp_country="";
        foreach($cities as $city): 
            if($temp_country!=$city['country_name']):?>
      <thead>
    <tr>
      <th width="200"><?php echo $city['country_name']; ?></th>
      </tr>
      </thead>      
           <?php endif; ?> 
      
      <tr><td><?php echo $city['city_id']; ?></td>
      <td><?php  echo $city['city_name']; ?></td></tr>
      <?php 
      $temp_country=$city['country_name'];
      
      endforeach; ?>
    
  </tbody>
</table>