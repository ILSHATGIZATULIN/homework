<?php
//echo '<pre>';
//var_dump($_REQUEST);
$message = false;//
$error = false;// для ошибок
$r=$_REQUEST;
if (isset ($r['name'],$r['phone'],$r['email'],$r['gender'],$r['ceh'])) {
    $name = $r['name'];
    $phone = $r['phone'];
    $email = $r['email'];
    $gender = $r['gender'];
    $ceh= $r['ceh'];


}
if (empty($name) || empty($phone) || empty($email) || empty ($gender) || empty ($ceh)) {
    $error = ' Заполните поля';
} else {
    $row = 'здравтсвуйте,' . $name .
        'Ваш номер:' . $phone .
        'Ваш емаил:' . $email .
        'Ваша Фамилия:' . $gender .
        'Ваш цех'  .$ceh . PHP_EOL;

    file_put_contents('./contacts.txt',
        $row,
        FILE_APPEND);
    $message = 'Спасибо мы с вами свяжемся.';
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


    <link rel="stylesheet" href="./css/bootstrap.min.css.">
</head>

<body>

<div class="container">


    <h3> Форма обратной связи</h3>
    <?php if ($message): ?>

        <?= $message ?>

    <?php else: ?>


<div style="height: 200px ; width: 150px;border-color: #9fcdff;margin: auto;"
                <form  class="form-horizontal" action="index.php" method="post">
                    <p><select size="5" multiple name="hero[]">

                            <option disabled>Выберите ваш цех</option>
                            <option value="ЦТО">ЦТО</option>
                            <option selected value="Турбинный цех">Турбинный цех</option>
                            <option value="Котельный Цех">Котельный цех</option>
                            <option value="Химический цех">Химический цех</option>
                            <option value="Топливный цех">Топливный цех</option>
                            <option value="Электрический цех">Электрический цех</option>
                        </select></p>
                    <button type="submit" class="btn btn-primary">Отправить</button>
                </form>
</div>
 <div style="height: 70px; width: 200px; margin: auto; background-color: #1e7e34; border-bottom-left-radius: 100px;">
                    <form action="index.php" method="post">
                        <p><b>Введите ваш отзыв:</b></p>
                        <p><textarea rows="10" cols="45" name="text"></textarea></p>
                        <p><input type="submit" value="Отправить"></p>
                    </form>
                </div>

                    <div class="form-group">
                        <div style="height: 100px; width: 1000px;"
                        <label for="phone" class="col-sm-2 control-label">ваш емэйл</label>
                        <div class="col-sm-10">
                            <input type="email" name="email" class="form-control" placeholder="Введите email">
                            <p> <input type="submit" value="Отправить"> </p>
                        </div>
                    </div>
<input type="email" name="email" class="form-control" placeholder="Введите email">

                    <div class="form-group">
                        <div class="col-sm-offset-2 col-sm-10">
                        </div>
                        </div>
                        <p class="alert-danger col-sm-4"><?= $error ?></p>

<input type="radio" name="course" value="ASP.NET" />ASP.NET <br>
<input type="radio" name="course" value="PHP" />PHP <br>
<input type="radio" name="course" value="Ruby" />RUBY <br>


<div class="checkbox">
    <label>
        <input type="checkbox"> Запомнить меня
    </label>
</div>
<button type="submit" class="btn btn-default">Войти</button>
<input type="radiobutton"
</form>



    <?php endif; ?>
</body>
</html>



