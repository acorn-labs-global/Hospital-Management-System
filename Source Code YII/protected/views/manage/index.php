<center><h1>Number Of Doctors Handling Cases</h1>

<?php 
        $this->widget(
            'chartjs.widgets.ChLine', 
            array(
                'width' => 900,
                'height' => 500,
                'htmlOptions' => array(),
                'labels' => $cases,
                'datasets' => array(
                    array(
                        "fillColor" => "rgba(220,220,220,0.5)",
                        "strokeColor" => "rgba(220,220,220,1)",
                        "pointColor" => "rgba(220,220,220,1)",
                        "pointStrokeColor" => "#ffffff",
                        "data" => $doctors
                    )      
                ),
                'options' => array()
            )
        ); 
    ?>
</center>