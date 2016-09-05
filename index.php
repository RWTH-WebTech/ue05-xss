<?php
    require_once(__DIR__.'/functions.php');
    $process = process_formdata();
?>
<!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Finde den XSS-Angriff</title>

    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
    <!-- Optional theme -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap-theme.min.css" integrity="sha384-fLW2N01lMqjakBkx3l/M9EahuwpSfeNvV63J5ezn3uZzapT0u7EYsXMjQV+0En5r" crossorigin="anonymous">
    <!-- Latest compiled and minified JavaScript -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    <style>
        body{
            padding-top: 20px;
        }
    </style>
</head>
<body>
<div class="container">
    <form class="form-horizontal" method="get" action="">
        <fieldset>

            <!-- Form Name -->
            <legend>Finde den XSS Angriff</legend>

            <?php if($process['danger']) { ?>
                <div class="alert alert-danger">Die antwort <?= $_GET['text4'] ?> ist falsch! Denk noch einmal über die Frage nach.</div>
            <?php } ?>
            <div class="alert alert-info">Durchschnittliche Sicherheit (auf einer Skala von -3 bis 3): <?= $process['average'] ?></div>

            <!-- Text input-->
            <div class="form-group">
                <label class="col-md-3 control-label" for="text1">Text 1</label>
                <div class="col-md-9">
                    <input id="text1" name="text1" type="text" placeholder="" class="form-control input-md">

                </div>
            </div>

            <!-- Text input-->
            <div class="form-group">
                <label class="col-md-3 control-label" for="text2">Text 2</label>
                <div class="col-md-9">
                    <input id="text2" name="text2" type="text" placeholder="" class="form-control input-md">

                </div>
            </div>

            <!-- Multiple Radios -->
            <div class="form-group">
                <label class="col-md-3 control-label" for="radios1">Ist die Seite sicher?</label>
                <div class="col-md-9">
                    <div class="radio">
                        <label for="radios1-0">
                            <input type="radio" name="radios1" id="radios1-0" value="3" checked="checked">
                            Absolut
                        </label>
                    </div>
                    <div class="radio">
                        <label for="radios1-1">
                            <input type="radio" name="radios1" id="radios1-1" value="2">
                            Ja
                        </label>
                    </div>
                    <div class="radio">
                        <label for="radios1-2">
                            <input type="radio" name="radios1" id="radios1-2" value="1">
                            Vielleicht
                        </label>
                    </div>
                    <div class="radio">
                        <label for="radios1-3">
                            <input type="radio" name="radios1" id="radios1-3" value="-1">
                            Nicht so wirklich
                        </label>
                    </div>
                    <div class="radio">
                        <label for="radios1-4">
                            <input type="radio" name="radios1" id="radios1-4" value="-2">
                            Nein
                        </label>
                    </div>
                    <div class="radio">
                        <label for="radios1-5">
                            <input type="radio" name="radios1" id="radios1-5" value="-3">
                            Gar nicht
                        </label>
                    </div>
                </div>
            </div>

            <!-- Select Basic -->
            <div class="form-group">
                <label class="col-md-3 control-label" for="select1">Lücke gefunden</label>
                <div class="col-md-9">
                    <select id="select1" name="select1" class="form-control">
                        <option value="-">?</option>
                        <option value="1">Ja</option>
                        <option value="0">Nein</option>
                    </select>
                </div>
            </div>

            <!-- Textarea -->
            <div class="form-group">
                <label class="col-md-3 control-label" for="text3">Kommentar</label>
                <div class="col-md-9">
                    <textarea class="form-control" id="text3" name="text3"></textarea>
                </div>
            </div>

            <!-- Text input-->
            <div class="form-group">
                <label class="col-md-3 control-label" for="text4">Was ist die Antwort?</label>
                <div class="col-md-9">
                    <input id="text4" name="text4" type="text" placeholder="" class="form-control input-md" value="<?= $process['value']; ?>">
                </div>
            </div>

            <!-- Button -->
            <div class="form-group">
                <div class="col-md-offset-3 col-md-9">
                    <input class="btn btn-success btn-block" type="submit" value="Senden">
                </div>
            </div>
        </fieldset>
    </form>
</div>
</body>
</html>