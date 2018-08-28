<?php /* @var $this Controller */ ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="language" content="en" />

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>

    <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/assets/bootstrap/css/custom-bootstrap.css"/>
    <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/custom.css"/>
    <script src="<?php echo Yii::app()->request->baseUrl; ?>/assets/bootstrap/js/bootstrap.js"> </script>

    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">


    <title><?php echo CHtml::encode($this->pageTitle); ?></title>
</head>

<body>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="#"> <img class="logo" src="" height="40"> LOGO</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar1" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbar1">
        <ul class="navbar-nav ml-auto">
            <li class="nav-item"><a class="nav-link" href="#"> Help </a></li>
            <li class="nav-item"><a class="nav-link" href="#"> My account </a></li>
            <li class="nav-item"><a class="nav-link" href="#"> Logout </a></li>
        </ul>
    </div>
</nav>


<div class="tabs">
    <div class="container-fluid-2">
        <div class="row">
            <div class="col-xl-1">
                <ul class="nav nav-pills nav-stacked flex-column">
                    <li class="<?php echo (Yii::app()->controller->id == 'v2/user')?'active':''; ?>"><a href="javascript:void(0)" onclick="redirect('<?php echo $this->createAbsoluteUrl('v2/user/index') ?>')" data-toggle="pill">users</a></li>
                    <li class="<?php echo (Yii::app()->controller->id == 'v2/book')?'active':''; ?>"><a href="javascript:void(0)" data-toggle="pill">books</a></li>

                </ul>
            </div>
            <div class="col-xl-11">
                <div class="tab-content">
                    <div class="tab-pane active" id="tab--content">
                        <?php echo $content; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

</body>

<script>
    function redirect(url){
        window.location.href = url;
    }
</script>

</html>

