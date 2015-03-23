<?php /* @var $this Controller */ ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="language" content="en" />


        <link href="<?php echo Yii::app()->request->baseUrl; ?>/css/mainsite/index.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo Yii::app()->request->baseUrl; ?>/css/mainsite/headfooter.css" rel="stylesheet" type="text/css" />
        
        
                    <!--  Foundation Framework  -->
         <link rel="stylesheet" href="<?php echo Yii::app()->request->baseUrl; ?>/css/foundation/css/foundation.css" />
         <script src="<?php echo Yii::app()->request->baseUrl; ?>/css/foundation/js/modernizr.js"></script>
         <script src="<?php echo Yii::app()->request->baseUrl; ?>/css/foundation/js/jquery.js"></script>
         <script src="<?php echo Yii::app()->request->baseUrl; ?>/css/foundation/js/foundation.min.js"></script>
         <script>
             $(document).foundation();
         </script>
         
         <style>
             div.errorMessage {
                display: block;
                padding: 0.375rem 0.5625rem 0.5625rem;
                margin-top: -1px;
                margin-bottom: 1rem;
                font-size: 0.75rem;
                font-weight: normal;
                font-style: italic;
                background: none repeat scroll 0% 0% rgb(240, 65, 36);
                color: white;
                }
             </style>
                    
                    
                    
	<title><?php echo CHtml::encode($this->pageTitle); ?></title>
</head>

<body>
<div class="header">
	
<?php include('/../doctor/header.php'); ?>
<?php include('/../patient/header.php'); ?>
<?php include('/../home/header.php'); ?>    
<?php include('/../nurse/header.php'); ?>    
<?php include('/../manage/header_m.php'); ?> 
<?php include('/../manage/header_n.php'); ?> 
<div class="content">
	<?php echo $content; ?>
    
</div>




<div class="clear"></div>


</div>
<div class="footer">
	<p>&copy; 2013 Hms-Ecare, All rights reserved</p>
</div>

<link rel="stylesheet" href="<?php echo Yii::app()->request->baseUrl; ?>/css/jqueryDropDown/docsupport/prism.css">
  <link rel="stylesheet" href="<?php echo Yii::app()->request->baseUrl; ?>/css/jqueryDropDown/chosen.css" />
  <style type="text/css" media="all">
    /* fix rtl for demo */
    .chosen-rtl .chosen-drop { left: -9000px; }
  </style>          
  <script src="https://ajax.googleapis.com/ajax/libs/prototype/1.7.0.0/prototype.js" type="text/javascript"></script>
  <script src="<?php echo Yii::app()->request->baseUrl; ?>/css/jqueryDropDown/chosen.proto.js" type="text/javascript"></script>
    <script src="<?php echo Yii::app()->request->baseUrl; ?>/css/jqueryDropDown/docsupport/prism.js" type="text/javascript" charset="utf-8"></script>
  <script type="text/javascript">
  document.observe('dom:loaded', function(evt) {
    var config = {
      '.chosen-select'           : {},
      '.chosen-select-deselect'  : {allow_single_deselect:true},
      '.chosen-select-no-single' : {disable_search_threshold:10},
      '.chosen-select-no-results': {no_results_text: "Oops, nothing found!"},
      '.chosen-select-width'     : {width: "95%"}
    }
    var results = [];
    for (var selector in config) {
      var elements = $$(selector);
      for (var i = 0; i < elements.length; i++) {
        results.push(new Chosen(elements[i],config[selector]));
      }
    }
    return results;
  });
  </script>
</body>
</html>
