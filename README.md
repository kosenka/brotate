BRotate - Banner rotation module for Yii Framework
=======

## Модуль ротации баннеров для Yii

This is a wrapper extension for [Uppod](http://uppod.ru/) project. Uppod is a popular and simple in-browser video and
audio player. It supports Flash and HTML5 video backends, pretty customizable, quite functional and ready to use
solution.

## Установка

* Скачать ([zip](https://github.com/kosenka/brotate/zipball/master), [tar.gz](https://github.com/kosenka/brotate/tarball/master)).

* Распаковать архив в папку `application.modules.brotate` . Должно получиться следующее:

```
protected/
├── components/
├── controllers/
├── ... application directories
└── modules/
    ├── brotate/
    │   ├── assets/
    │   └── ... другие файлы модуля BRotate
    └── ... другие модули
```

* Прописать в конфиге приложения:

```
    'modules'=>array(
                        'brotate'=>array(
                                              'class' => 'application.modules.brotate.BRotateModule',
                                              'ips'=>array(
                                                           'XX.XXX.XXX.XX',  //с каких IP-адресов разрешено управлять
                                                           ),
                                              'webFolder'=>'/upload/brotate/' // папка, куда закачивать баннеры
                                             ),
        ),
```

* Создать в базе данных таблицы (смотри файл data.sql)
* Перейти по ссылке http://[ВАШ_САЙТ]/index.php?r=brotate/admin

## Заметки на будущее

* Сделать статистику показа баннеров (закладки для этого есть, но пока нет времени)
* Сделать показ баннеров по времени и по "лимиту показов"

## ССылки

* [Extension project page](https://github.com/kosenka/brotate)
* [Russian community discussion thread](http://yiiframework.ru/forum/viewtopic.php?f=)

## Использование
В представлении/шаблоне прописать так:

```php
<script type="text/javascript">
<!--
   document.write ("<" + "script language='JavaScript' type='text/javascript' src='");
   document.write ("=$this->createUrl('/brotate/default',array('rr'=>time()))");
   if (document.referer)
      document.write ("&amp;referer=" + escape(document.referer));
   document.write ("'><" + "/script>");
//-->
</script>
```
или
```php
<?php $this->widget('application.modules.brotate.widget.BRotateWidget'); ?>
```
