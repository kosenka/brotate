BRotate - Banner rotation module for Yii Framework
=======

## Модуль ротации баннеров для Yii

This is a wrapper extension for [Uppod](http://uppod.ru/) project. Uppod is a popular and simple in-browser video and
audio player. It supports Flash and HTML5 video backends, pretty customizable, quite functional and ready to use
solution.

## Установка

* Скачать ([zip](https://github.com/resurtm/EUppodPlayer/zipball/master),
[tar.gz](https://github.com/resurtm/EUppodPlayer/tarball/master)).

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

* You're ready to use!

## Features and stuff to be implemented in future

## ССылки

* [Extension project page](https://github.com/kosenka/brotate)
* [Russian community discussion thread](http://yiiframework.ru/forum/viewtopic.php?f=)

## Использование

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


```php
<?php $this->widget('application.modules.brotate.widget.BRotateWidget'); ?>
```
