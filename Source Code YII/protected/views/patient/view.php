<?php

if($caseData!=null)
{
    $caseStatus;
    if($caseData->case_status==1)
        $caseStatus="Active";
    else
        $caseStatus="Resolved";
    $caseContent='<h1>CASE - breif details</h1><table><thead><tr><th width="200"></th><th></th></tr></thead><tbody>
    <tr><td>Case Id</td><td>'.$caseData->cid.'</td></tr>
    <tr><td>Case Details</td><td>'.$caseData->case_details.'</td></tr>    
    <tr><td>Case Status</td><td>'.$caseStatus.'</td></tr>     
  </tbody>
</table>';

}

$data="<tr><td>No Responses Found</td></tr>";

if($caseResponses!=null)
{
    $data="";
    foreach ($caseResponses as $response)
    {
        $data.="<tr><td>Date:".$response['rec_date']."</td></tr>";
        $data.='<tr><td>Doctor Name</td><td>'.$response['name'].'</td></tr>';
        $data.='<tr><td>Response</td><td>'.$response['response'].'</td></tr>';        
    }
    
}
$caseResponseConent='<h1>CASE - responses by doctor</h1><h3></h3><table><thead><tr><th width="200"></th><th></th></tr></thead><tbody>
    '.$data.'
        </tbody>
</table>';

$datamed="<tr><td>No Medication Recorder Yet</td></tr>";
if($caseMedData!=null)
{
    $datamed="";
    foreach($caseMedData as $med) {
    $datamed.="<tr><td>Date:".$med->rec_date."</td></tr>";
        $datamed.='<tr><td>Medicine Name</td><td>'.$med->med_name.'</td></tr>';
        $datamed.='<tr><td>Frequency</td><td>'.$med->frequency.'</td></tr>';  
        $datamed.='<tr><td>Dose</td><td>'.$med->dose.'</td></tr>'; 
        
    }
    
}
$caseMedContent='<h1>CASE - medicines</h1><h3></h3><table><thead><tr><th width="200"></th><th></th></tr></thead><tbody>
    '.$datamed.'
        </tbody>
</table>';

$this->widget('zii.widgets.jui.CJuiTabs', array(
	'tabs' => array(
		'Case Data' => $caseContent,
                'Doctor Response' => $caseResponseConent,
                'Medication' => $caseMedContent,

	),
	// additional javascript options for the tabs plugin
	'options' => array(
		'collapsible' => true,
	),
));
?>


