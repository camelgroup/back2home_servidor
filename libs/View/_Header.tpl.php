<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <base href="<?php $this->eprint($this->ROOT_URL); ?>" />
    <title><?php $this->eprint($this->title); ?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="description" content="NOVASOFT" />
    <meta name="author" content="phreeze builder | phreeze.com" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    <!-- material-design -->
    <link href="resources/font-awesome/css/font-awesome.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="resources/material-design/libs/assets/animate.css/animate.css" type="text/css" />
    <link rel="stylesheet" href="resources/material-design/libs/jquery/waves/dist/waves.css" type="text/css" />
    <link rel="stylesheet" href="resources/material-design/styles/material-design-icons.css" type="text/css" />
    <link rel="stylesheet" href="resources/material-design/libs/jquery/bootstrap/dist/css/bootstrap.css" type="text/css" />
    <link rel="stylesheet" href="resources/material-design/styles/font.css" type="text/css" />
    <link rel="stylesheet" href="resources/material-design/styles/app.css" type="text/css" />

    <!--[if IE 7]>
        <link rel="stylesheet" href="resources/bootstrap/css/font-awesome-ie7.min.css">
    <![endif]-->
    <link href="resources/bootstrap/css/datepicker.css" rel="stylesheet" />
    <link href="resources/bootstrap/css/timepicker.css" rel="stylesheet" />
    <link href="resources/bootstrap/css/bootstrap-combobox.css" rel="stylesheet" />
    <!-- Le HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
        <script type="text/javascript" src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->
    <script type="text/javascript" src="resources/backbone/libs/LAB.min.js"></script>
    <script type="text/javascript">
        $LAB.script("resources/bootstrap/js/bootstrap-datepicker.js")
            .script("resources/bootstrap/js/bootstrap-timepicker.js")
            .script("resources/bootstrap/js/bootstrap-combobox.js")
            .script("resources/backbone/libs/underscore-min.js").wait()
            .script("resources/backbone/libs/underscore.date.min.js")
            .script("resources/backbone/libs/backbone-min.js")
            .script("resources/backbone/app.js")
            .script("resources/backbone/model.js").wait()
            .script("resources/backbone/view.js").wait()
    </script>
    <script src="resources/material-design/libs/jquery/jquery/dist/jquery.js"></script>

</head>
<body>
<div class="app">
<?php
    $this->display('_Menu.tpl.php');
?>