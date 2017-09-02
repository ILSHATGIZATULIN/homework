<?php
echo '<pre>';
var_dump($_REQUEST);
$r = print_r($_REQUEST, true);
echo '</pre>';
$message = false;//
$error = false;// для ошибок
$r=$_REQUEST;

require 'Db.php';
$type = isset($_REQUEST['type']) ? $_REQUEST['type'] : 'Json';
$db = new Db($type);
$saved = $db->getContents();

echo '<div class="alert alert-notice">Создано объектов: ' . Db::$count . '</div>';

if (isset ($r['name'],$r['email'],$r['ceh'])) {
    $name = $r['name'];
    //$phone = $r['phone'];
    $email = $r['email'];
    //$gender = $r['gender'];
    $ceh= $r['ceh'];

    if (empty($name) || empty($email) || empty ($ceh)) {
        $error = ' Заполните поля: ';
    } else {
        if(isCorrectLength($name, 2, 13)) {
            $db->saveNewItem([
                "ceh" => $ceh,
                "name" => $name,
                "email" => $email,
                "date" => date('Y-m-d H:i')
            ]);
            $message = 'Спасибо мы с вами свяжемся.';
        } else {
            $error = 'Не корректная длина имени';
        }

        $row = 'здравтсвуйте,' . $name .

            'Ваш емаил:' . $email .
            'Ваш цех' . $ceh . PHP_EOL;

    }
} elseif (isset($_REQUEST['fromForm'])) {
    $error = 'Заполните поля';
}

$error = $error ? '<div class="alert alert-danger">' . $error . '</div>' : '';

$list = $saved;

$saved = '<select class="form-control">';

foreach ($list as $ceh => $workers) {
    foreach ($workers as $data) {
        //list($date, $name, $email, $ceh) = explode(';', $line);
        $name = $data['name'];
        $date = $data['date'];
        $email = $data['email'];

        $saved .= '<option>Дата: ' . $date . ', Имя: ' . $name . ' (' . $email . ')</option>';
    }
}
$saved .= '</select>';

?>

<?php
function isCorrectLength($value ="name",$min,$max) {
    return (mb_strlen($value) < $min || mb_strlen($value) > $max)
        ? false
        : true;
}
?>

<!doctype html>

<html lang="en" xmlns="http://www.w3.org/1999/html">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>homework</title>


    <!--<link rel="stylesheet" href="./css/bootstrap.min.css.">-->
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
</head>

<body class="back">

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <?=$error?>
            <div class="panel panel-primary">
                <div class="panel-heading">Форма обратной связи</div>
                <div class="panel-body">
                    <form action="index.php" method="post">
                        <input type="hidden" name="fromForm" value="yes">
                        <div class="form-group">
                            <label for="type" class="col-sm-2 control-label">Тип:</label>
                            <div class="col-sm-10">
                                <select name="type" class="form-control">
                                    <option value="Json">Json</option>
                                    <option value="Dsv">Txt</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="name" class="col-sm-2 control-label">Введите ваш отзыв:</label>
                            <div class="col-sm-10">
                                <textarea rows="10" cols="45" name="text" class="form-control"></textarea>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="name" class="col-sm-2 control-label">ваше имя</label>
                            <div class="col-sm-10">
                                <input type="text" name="name" class="form-control" placeholder="Имя">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="name" class="col-sm-2 control-label">Email</label>
                            <div class="col-sm-10">
                                <input type="email" name="email" class="form-control" placeholder="Введите email">
                            </div>
                        </div>
                        <div class="form-group">
                            <input type="radio" name="ceh" value="турбинный цех" />турбинный цех <br>
                            <input type="radio" name="ceh" value="котельный цех" />котельный цех <br>
                            <input type="radio" name="ceh" value="Цех технического обслуживания" />Цех технического обслуживания <br>
                            <input type="radio" name="ceh" value="Химический цех" />Химический цех <br>
                        </div>
                        <div class="form-group">
                            <p>
                                <select size="5" multiple name="hero[]">
                                    <option disabled>Выберите ваш цех</option>
                                    <option value="ЦТО">ЦТО</option>
                                    <option selected value="Турбинный цех">Турбинный цех</option>
                                    <option value="Котельный Цех">Котельный цех</option>
                                    <option value="Химический цех">Химический цех</option>
                                    <option value="Топливный цех">Топливный цех</option>
                                    <option value="Электрический цех">Электрический цех</option>
                                </select>
                            </p>
                        </div>
                        <div class="form-group">
                            <div class="checkbox">
                                <label>
                                    <input type="checkbox"> Запомнить меня
                                </label>
                            </div>
                        </div>

                        <button type="submit" class="btn btn-primary">выбрать</button>

                        <div class="form-group">
                            <?=$saved?>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>



