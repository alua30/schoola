<?php
// Задача 1. Строка начинается на 'http://'
function startsWithHttp($str)
{
    return substr($str, 0, 7) === 'http://';
}

// Задача 2. Пол по ФИО (по отчеству, то есть по последнему слову)
function getGender($fio)
{
    $words = preg_split('/\s+/u', trim($fio));
    $patronymic = mb_strtolower(end($words), 'UTF-8');

    $male = ['ич', 'оглы', 'улы', 'ұлы'];
    $female = ['на', 'кызы', 'гызы', 'қызы'];

    foreach ($male as $ending) {
        if (mb_substr($patronymic, -mb_strlen($ending, 'UTF-8'), null, 'UTF-8') === $ending) {
            return 'мужской';
        }
    }
    foreach ($female as $ending) {
        if (mb_substr($patronymic, -mb_strlen($ending, 'UTF-8'), null, 'UTF-8') === $ending) {
            return 'женский';
        }
    }
    return 'не удалось определить';
}

// Задача 3. Делители числа
function getDivisors($number)
{
    $divisors = [];
    for ($i = 1; $i <= $number; $i++) {
        if ($number % $i == 0) {
            $divisors[] = $i;
        }
    }
    return $divisors;
}
?>

<!DOCTYPE html>
<html>

<head>
  <title>О сайте</title>
  <meta charset="utf-8" />
  <link rel="stylesheet" href="style.css" />
</head>

<body>

  <div id="header">
    <!-- Верхняя часть страницы -->
    <img src="logo.gif" width="187" height="29" alt="Наш логотип" class="logo" />
    <span class="slogan">приходите к нам учиться</span>
    <!-- Верхняя часть страницы -->
  </div>

  <div id="content">
    <!-- Заголовок -->
    <h1>О нашем сайте</h1>
    <!-- Заголовок -->
    <!-- Область основного контента -->
    <p>
      Сайт создан на общественных началах и управляется на некоммерческой основе. Все фотографии и материалы предоставлены и используются с ведома и при участии администрации школы.
    </p>
    <h3>Цели создания проекта</h3>
    <ol>
      <li>поднятие престижа нашей школы.</li>
      <li>для информирования родителей будущих учеников нашей школы.</li>
      <li>для возобновления утраченных связей между выпускниками и учителями, с предоставлением им информационного пространства для общения.</li>
      <li>для общения учеников во внеурочное время.</li>
    </ol>
    <h3>Советы и предупреждения</h3>
    <p>
      Сайт оптимизирован под все браузеры. Наилучшее качество просмотра достигается при разрешении экрана монитора - 1280 на 1024 точек.
    </p>

        <!-- Задание 1 -->
    <h3>Задание 1. Дни недели на русском и английском</h3>
    <?php
    // Двухмерный массив: первый ключ 'ru', второй 'en'
    $days = [
        'ru' => ['Понедельник', 'Вторник', 'Среда', 'Четверг', 'Пятница', 'Суббота', 'Воскресенье'],
        'en' => ['Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday', 'Sunday'],
    ];

    // Вложенные циклы foreach
    foreach ($days as $lang => $list) {
        echo "<b>$lang:</b><br>";
        foreach ($list as $day) {
            echo $day, '<br>';
        }
        echo '<br>';
    }
    ?>

    <!-- Задание 2 -->
    <h3>Задание 2. Элементы больше 3, но меньше 10</h3>
    <?php
    $numbers = [2, 5, 9, 15, 0, 4];

    foreach ($numbers as $number) {
        if ($number > 3 && $number < 10) {
            echo $number, '<br>';
        }
    }
    ?>

    <!-- Задание 3 -->
    <h3>Задание 3. Обмен максимального и минимального значений</h3>
    <?php
    // Массив из 10 случайных значений
    $arr = [];
    for ($i = 0; $i < 10; $i++) {
        $arr[] = rand(1, 100);
    }
    echo 'Исходный массив: ', implode(', ', $arr), '<br>';

    // Ищем индексы максимального и минимального элементов
    $maxIndex = 0;
    $minIndex = 0;
    foreach ($arr as $index => $value) {
        if ($value > $arr[$maxIndex]) {
            $maxIndex = $index;
        }
        if ($value < $arr[$minIndex]) {
            $minIndex = $index;
        }
    }
    echo 'Максимальное: ', $arr[$maxIndex], ', минимальное: ', $arr[$minIndex], '<br>';

    // Меняем их местами
    $temp = $arr[$maxIndex];
    $arr[$maxIndex] = $arr[$minIndex];
    $arr[$minIndex] = $temp;

    echo 'После обмена: ', implode(', ', $arr), '<br>';
    ?>


    <h3>Задача 1. startsWithHttp()</h3>
    <?php
    $urls = ['http://example.com', 'https://example.com', 'example.com'];
    foreach ($urls as $url) {
        echo $url, ' &rarr; ', startsWithHttp($url) ? 'true' : 'false', '<br>';
    }
    ?>

    <h3>Задача 2. getGender()</h3>
    <?php
    $names = [
        'Иванов Иван Иванович',
        'Петрова Анна Сергеевна',
        'Мустафина Алуа Руфатовна',
        'Ахметов Ерлан Серикұлы',
        'Нурланова Айгерім Қайратқызы',
    ];
    foreach ($names as $name) {
        echo $name, ' &rarr; ', getGender($name), '<br>';
    }
    ?>

    <h3>Задача 3. getDivisors()</h3>
    <?php
    foreach ([12, 17, 36] as $n) {
        echo "Делители числа $n: ", implode(', ', getDivisors($n)), '<br>';
    }
    ?>
    <!-- Область основного контента -->
  </div>
  <div id="nav">
    <h2>Навигация по сайту</h2>
    <!-- Меню -->
    <ul>
      <li><a href='index.php'>Домой</a>
      </li>
      <li><a href='about.php'>О нас</a>
      </li>
      <li><a href='contact.php'>Контакты</a>
      </li>
      <li><a href='table.php'>Таблица умножения</a>
      </li>
      <li><a href='calc.php'>Калькулятор</a>
      </li>
    </ul>
    <!-- Меню -->
  </div>
  <div id="footer">
    <!-- Нижняя часть страницы -->
    &copy; Супер Мега Веб-мастер, 2000 &ndash; 2021
    <!-- Нижняя часть страницы -->
  </div>
</body>

</html>