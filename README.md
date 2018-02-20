MAGENTO 2 - PAYME V1.0.0 - УСТАНОВКА МОДУЛЕЙ
«14» февраля 2018г.
ПРЕАМБУЛА
Господа и, может дамы, я не буду углубляться в процедуру установки Magento, априори, подразумевая, что система в рабочей кондиции. Тем не менее, следует убедиться в том, что кеширование отключено (его можно отключить в админке на странице System/Cache Management) — это необходимо для того, чтобы сразу видеть производимые вами изменения.

ПОШАГОВАЯ ИНСТРУКЦИЯ ПО УСТАНОВКЕ ПЛАТЕЖНОГО ПЛАГИНА PEYME
1.	Создайте директорию:  mk /home/magento.com/www/app/code
2.	Перейдите в директорию: cd /home/magento.com/www/app/code
3.	Скачайте архив с модулем и разархивируйте его на своем компьютере.
4.	Скопируйте содержимое папки /home/magento.com/www/app/code/ в корень сайта
5.	Используя командную строку выполните следующие команды:
6.	Распакуйте дистрибутив в требуемую папку на веб-сервере: /home/magento.com/www/app/code/
7.	Структура каталогов
home
|_	magento.com
	|_	www
		|_	app
			|_	code
				|_	KiT
					|_	Payme
						|_ 	Controller
							|	Adminhtml
							|	Callback
							|	Checkout
						|_	css
							|	style.css
						|_	etc
							|	adminhtml
							|	frontend
							|	config.xml
							|	module.xml
						|_	Helper
							|	Data.php
						|_	Model
							|	Config
							|	Payme.php
						|_	UniversalKernel
						|_	view
						|_	AUTHORS.md
						|_	CHANGELOG.md
						|_	composer.json
						|_	CopyrightNotice.txt
						|_	Data.php
						|_	LICENSE_AFL.txt
						|_	LICENSE.txt
						|_	README.md
						|_	registration.php
8.	Проверим статус нашего модуля, для это в консоли надо запустить: php bin/magento module:status
9.	После выполнения этой команды вы увидите список всех установленных модулей, а во втором списке, будут модули, которые еще не установлены, т.е. наш новый модуль: List of disabled modules:        KiT_Payme
Это означает, что наш модуль правильно настроен, но в данный момент он отключен.
10.	Дадим доступ cache
sudo chmod -R 777 var pub
sudo rm -rf var/cache/* var/generation/*
Чтобы его активировать, нужно выполнить команду: php bin/magento module:enable KiT_Payme
11.	Если сейчас открыть сайт в браузере вы увидите ошибку:
There has been an error processing your request
А в логах сайта (var/reports/):
Please upgrade your database: Run "bin/magento setup:upgrade" from the Magento root directory.
12.	Необходимо выполнить требуемую команду: php bin/magento setup:upgrade
13.	Выполняем команду: php bin/magento setup:static-content:deploy
14.	Очистка cache: php bin/magento cache:clean
15.	Если включена компиляция дополнительно, используя командную строку, выполните:
 php bin/magento setup:di:compile
php bin/magento cache:clean
16.	Наконец, пустой модуль окончательно установлен. В этом можно убедиться, пройдя по: Stores -> Configuration -> Advanced -> Advanced -> Disable Modules Output
17.	Браво!!! Добро пожаловать в философию «Payme» - надежность и успех твоего бизнеса!!!

ВМЕСТО ЭПИЛОГА!
Работая с «Payme», Вы обрекаете себя на тотальный успех и процветание! Мы продолжаем уверенно расти, и, порой опережать технологии и задавать новый технологический формат для наших потребителей!


