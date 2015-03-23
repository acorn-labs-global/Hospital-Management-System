
<center><h1>Number Of Cases And Dates</h1>
<h4>Number Of Cases Doctor Deal In Days</h4>
<?php 
        $this->widget(
            'chartjs.widgets.ChBars', 
            array(
                'width' => 950,
                'height' => 500,
                'htmlOptions' => array(),
                'labels' => $days,
                'datasets' => array(
                    array(
                        "fillColor" => "#ff00ff",
                        "strokeColor" => "rgba(220,220,220,1)",
                        "data" => $noCases
                    )       
                ),
                'options' => array()
            )
        ); 
    ?>
</center>