<center>
<h1>Patient And Their Cases</h1>
<h4>How Many Patient Are Currently Dealed By This Doctor And No Cases Of Those Patients</h4>
<?php 
        $this->widget(
            'chartjs.widgets.ChLine', 
            array(
                'width' => 950,
                'height' => 500,
                'htmlOptions' => array(),
                'labels' => $patient,
                'datasets' => array(
                    array(
                        "fillColor" => "rgba(220,220,220,0.5)",
                        "strokeColor" => "rgba(220,220,220,1)",
                        "pointColor" => "rgba(220,220,220,1)",
                        "pointStrokeColor" => "#ffffff",
                        "data" => $noCases
                    )
                ),
                'options' => array()
            )
        ); 
    ?>
</center>