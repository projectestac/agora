<?php

// This file is part of Moodle - http://moodle.org/
//
// Moodle is free software: you can redistribute it and/or modify
// it under the terms of the GNU General Public License as published by
// the Free Software Foundation, either version 3 of the License, or
// (at your option) any later version.
//
// Moodle is distributed in the hope that it will be useful,
// but WITHOUT ANY WARRANTY; without even the implied warranty of
// MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
// GNU General Public License for more details.
//
// You should have received a copy of the GNU General Public License
// along with Moodle.  If not, see <http://www.gnu.org/licenses/>.

/**
 * Strings for component 'mnet', language 'ru', branch 'MOODLE_24_STABLE'
 *
 * @package   mnet
 * @copyright 1999 onwards Martin Dougiamas  {@link http://moodle.com}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['aboutyourhost'] = 'О Вашем сервере';
$string['accesslevel'] = 'Уровень доступа';
$string['addhost'] = 'Добавить хост';
$string['addnewhost'] = 'Добавить новый хост';
$string['addtoacl'] = 'Добавить контроль доступа';
$string['allhosts'] = 'Все хосты';
$string['allhosts_no_options'] = 'Нет опций, доступных при просмотре нескольких хостов';
$string['allow'] = 'Разрешено';
$string['applicationtype'] = 'Тип приложения';
$string['authfail_nosessionexists'] = 'Неудачная авторизация: сессия mnet не создана';
$string['authfail_sessiontimedout'] = 'Неудачная авторизация: время сессии mnet истекло';
$string['authfail_usermismatch'] = 'Неудачная авторизация: не совпадает пользователь';
$string['authmnetdisabled'] = 'Плагин аутентификации MNet
<strong>отключен</strong>.';
$string['badcert'] = 'Это недействительный сертификат';
$string['certdetails'] = 'Подробности сертификата';
$string['configmnet'] = 'Технология MNet позволяет этому серверу взаимодействовать с другими серверами и службами';
$string['couldnotgetcert'] = 'Не найден сертификат на <br />{$a}. <br />Хост может быть недоступен или неверно сконфигурирован';
$string['couldnotmatchcert'] = 'Это не соответствует текущему сертификату, опубликованному веб-сервером';
$string['courses'] = 'курсы';
$string['courseson'] = 'курсы';
$string['currentkey'] = 'Текущий публичный ключ';
$string['current_transport'] = 'Текущий транспорт';
$string['databaseerror'] = 'Не удается записать детали базы данных';
$string['deleteaserver'] = 'Удаление сервера';
$string['deletedhostinfo'] = 'Этот хост был удален. Если Вы хотите вернуть его, то переключите состояние «Удален» обратно на «Нет».';
$string['deletedhosts'] = 'Удаленные хосты: {$a}';
$string['deletehost'] = 'Удалить хост';
$string['deletekeycheck'] = 'Вы абсолютно уверены, что хотите удалить этот ключ?';
$string['deleteoutoftime'] = 'Ваше 60-секундное окно для удаления этого ключа просрочено. Пожалуйста, начните снова.';
$string['deleteuserrecord'] = 'SSO ACL: удалить запись пользователя «{$a->user}» с {$a->host}.';
$string['deletewrongkeyvalue'] = 'Возникла ошибка. Если Вы не попробуете удалить свой SSL ключ с сервера, то, возможно, он будет предметом вредоносных атак. Никаких действий предпринято не было.';
$string['deny'] = 'Отказ';
$string['description'] = 'Описание';
$string['duplicate_usernames'] = 'Не удалось создать индекс для столбцов «mnethostid» и «username» в пользовательской таблице.<br />Это могло произойти, если в таблице есть <a href="{$a}" target="_blank"> одинаковые имена пользователей</a>.<br />Ваши обновления всё равно должны завершиться успешно. Нажмите на ссылку вверху и в новом окне прочитайте инструкцию, как избавиться от проблемы. Вы можете наблюдать за завершением обновления.<br />';
$string['enabled_for_all'] = '(Эта служба была включена для всех хостов).';
$string['enterausername'] = 'Пожалуйста, введите имя пользователя или список имен пользователей, разделенных запятыми.';
$string['error7020'] = 'Эта ошибка обычно происходит, если удаленный сайт создал для Вас запись с ошибочным wwwroot, например, http://yoursite.com вместо http://www.yoursite.com. Вам нужно связаться с администратором удаленного сайта и попросить обновить запись для своего хоста с wwwroot (определенным в config.php)';
$string['error7022'] = 'Сообщение, которое Вы отправили удаленному сайту было зашифровано верно, но не принято. Это очень неожиданно. Вы, вероятно, должны сообщить о происшедшей ошибке (при этом в запросе дать как можно больше информации о версии приложения и т.д.)';
$string['error7023'] = 'Удаленный сайт пытался расшифровать Ваше сообщение со всеми ключами, записанными для Вашего сайта. Они все ошибочны.Вам нужно вручную исправить эту ошибку путем переназначения ключей с удаленного сайта. Это вряд ли произойдет, если Вы не были связаны с удаленным сайтом в течение нескольких месяцев.';
$string['error7024'] = 'Вы послали незашифрованное сообщение на удаленный сайт, но удаленный сайт не принимает незашифрованную информацию с Вашего сайта. Это очень неожиданно. Вы, вероятно, должны сообщить о происшедшей ошибке (при этом в запросе дать как можно больше информации о версии приложения и т.д.)';
$string['error7026'] = 'Ключ, которым было подписано Ваше сообщение, отличается от ключа, который удаленный хост имеет в файле для вашего сервера. Удаленный хост попытался сопоставить Ваш текущий ключ и ему это не удалось. Пожалуйста, вручную переустановите ключ для удаленного хоста и попробуйте снова.';
$string['error709'] = 'Удаленный сайт не смог получить Ваш SSL ключ.';
$string['expired'] = 'Этот ключ истекает к';
$string['expires'] = 'Верный пока';
$string['expireyourkey'] = 'Удалить этот ключ';
$string['expireyourkeyexplain'] = 'Moodle автоматически изменяет Ваши ключи каждые 28 дней (по-умолчанию), но Вы можете в любое время <em>вручную</em> назначить этот ключ просроченным. Это только будет полезно в случае, если Вы полагаете, что ключ был скомпрометирован. Замена будет сразу же автоматически сгенерирована.<br />Удаление этого ключа сделает невозможным другим приложениям передавать Вам информацию, пока Вы не свяжитесь с каждым из администраторов и не предоставите им свой новый ключ';
$string['exportfields'] = 'Поля для экспорта';
$string['failedaclwrite'] = 'Ошибка записи списка управления доступа MNet для пользователя «{$a}».';
$string['findlogin'] = 'Найти логин';
$string['forbidden-function'] = 'Эта функция не была активирована для RPC.';
$string['forbidden-transport'] = 'Метод передачи, который Вы пытаетесь использовать, не разрешен';
$string['forcesavechanges'] = 'Принудительно сохранять изменения';
$string['helpnetworksettings'] = 'Настроить связь MNet';
$string['hidelocal'] = 'Скрыть локальных пользователей';
$string['hideremote'] = 'Скрыть пользователей, подключающихся удаленно';
$string['host'] = 'хост';
$string['hostcoursenotfound'] = 'Хост или курс не найден';
$string['hostdeleted'] = 'Хост удален';
$string['hostexists'] = 'Уже существует запись для хоста с этим именем (она может быть удалена).<a href="{$a}">нажмите здесь</a> для редактирования записи.';
$string['hostlist'] = 'Список сетевых хостов';
$string['hostname'] = 'Имя хоста';
$string['hostnamehelp'] = 'Полное доменное имя удаленного хоста, например, www.example.com';
$string['hostnotconfiguredforsso'] = 'Этот сервер не настроен для удаленного подключения';
$string['hostsettings'] = 'Настройки хоста';
$string['http_self_signed_help'] = 'Разрешение соединений с использованием самоподписанного сертификата DIY SSL на удаленном хосте.';
$string['https_self_signed_help'] = 'Разрешение соединений через HTTP с использованием самоподписанного DIY SSL в PHP на удаленном хосте.';
$string['https_verified_help'] = 'Разрешение соединений с помощью SSL-сертификата, подтвержденного на удаленном хосте.';
$string['http_verified_help'] = 'Разрешение соединений через HTTP (не HTTPS) с использованием подтвержденного сертификата SSL в PHP на удаленном хосте.';
$string['id'] = 'ID';
$string['idhelp'] = 'Это значение устанавливается автоматически и не может быть изменено';
$string['importfields'] = 'Поля для импорта';
$string['inspect'] = 'Проверить';
$string['installnosuchfunction'] = 'Ошибка кодирования. При попытке установить функцию mnet xmlrpc ({$a->method}) из файла ({$a->file}) его не удается найти!';
$string['installnosuchmethod'] = 'Ошибка кодирования. При попытке установить метод mnet xmlrpc ({$a->method}) для класса ({$a->class}) его не удается найти!';
$string['installreflectionclasserror'] = 'Ошибка кодирования. Самоанализ MNet ошибочен для метода «{$a->method}» в классе «{$a->class}». Сообщение об ошибке, которое может помочь: «{$a->error}»';
$string['installreflectionfunctionerror'] = 'Ошибка кодирования. Самоанализ MNet ошибочен для функции «{$a->method}» в файле «{$a->file}». Сообщение об ошибке, которое может помочь: «{$a->error}»';
$string['invalidaccessparam'] = 'Неверный параметр доступа.';
$string['invalidactionparam'] = 'Неверный параметр действия.';
$string['invalidhost'] = 'Вы обязаны предоставить верный идентификатор хоста';
$string['invalidpubkey'] = 'Ключ не является правильным SSL-ключом. ({$a})';
$string['invalidurl'] = 'Ошибочный параметр URL';
$string['ipaddress'] = 'IP-адрес';
$string['is_in_range'] = 'IP-адрес <code>{$a}</code> сооветствует правильному доверенному хосту.';
$string['ispublished'] = '{$a} открыл доступ для Вас к этому сервису.';
$string['issubscribed'] = '{$a} подписал этот сервис к Вашему хосту.';
$string['keydeleted'] = 'Ваш ключ был успешно удален и заменен.';
$string['keymismatch'] = 'Общий ключ, находящийся у Вас для этого хоста, отличается от общего ключа, который сейчас опубликован. Текущий публичный ключ:';
$string['last_connect_time'] = 'Последнее время соединения';
$string['last_connect_time_help'] = 'Время, когда Вы в последний раз подключались к данному хосту.';
$string['last_transport_help'] = 'Средства, которые Вы использовали при последнем соединении с этим хостом.';
$string['leavedefault'] = 'Использование настроек по умолчанию';
$string['listservices'] = 'Список сервисов';
$string['loginlinkmnetuser'] = 'Если Вы являетесь удаленным пользователем MNet и можете здесь <a href="{$a}">подтвердить свой адрес email</a>, то Вы можете быть перенаправлены на вашу страницу входа.<br />';
$string['logs'] = 'логи';
$string['managemnetpeers'] = 'Управление узлами';
$string['method'] = 'Метод';
$string['methodhelp'] = 'Помощь для метода {$a}';
$string['methodsavailableonhost'] = 'Методы доступны для {$a}';
$string['methodsavailableonhostinservice'] = 'Методы доступны для {$a->service} на {$a->host}';
$string['methodsignature'] = 'Метод подписан для {$a}';
$string['mnet'] = 'MNet';
$string['mnet_concatenate_strings'] = 'Объединение (до) 3 строк и возвращение результата.';
$string['mnetdisabled'] = 'MNet <strong>отключен</strong>.';
$string['mnetidprovider'] = 'Идентификатор поставщика MNet';
$string['mnetidproviderdesc'] = 'Вы можете использовать это средство для получения ссылки, через которую Вы можете авторизоваться, если укажете правильный адрес электронной почты, соответствующий имени пользователя, пытавшегося авторизоваться ранее.';
$string['mnetidprovidermsg'] = 'Вы должны авторизоваться через своего  поставщика {$a}.';
$string['mnetidprovidernotfound'] = 'К сожалению, более подробной информации не найдено.';
$string['mnetlog'] = 'Логи';
$string['mnetpeers'] = 'Узлы';
$string['mnetservices'] = 'Сервисы';
$string['mnet_session_prohibited'] = 'Пользователи Вашего сервера не имеют доступа к {$a}.';
$string['mnetsettings'] = 'Настройки MNet';
$string['moodle_home_help'] = 'Путь к домашней странице MNet на удаленном компьютере, например: /moodle/.';
$string['name'] = 'Имя';
$string['net'] = 'Сетевое взаимодействие';
$string['networksettings'] = 'Сетевые настройки';
$string['never'] = 'Никогда';
$string['noaclentries'] = 'Нет записей в списке управления доступом SSO';
$string['noaddressforhost'] = 'К сожалению, имя этого хоста ({$a}) не может быть разрешено!';
$string['nocurl'] = 'Библиотека PHP cURL не установлена';
$string['nolocaluser'] = 'Не создано локальных записей для удаленного пользователя, и они не могут быть созданы, т.к. этот хост не может автоматически создавать пользователей. Пожалуйста, свяжитесь с администратором!';
$string['nomodifyacl'] = 'Вам не разрешено изменение списка управления доступом MNet.';
$string['nonmatchingcert'] = 'Предмет сертификата: <br /><em>{$a->subject}</em><br />не соответствует хосту, к которого он получен:<br /><em>{$a->host}</em>.';
$string['nopubkey'] = 'Возникла проблема получения общего ключа.<br />Возможно, хост не разрешает MNet или ключ ошибочен.';
$string['nosite'] = 'Не удается найти курс уровня сайта';
$string['nosuchfile'] = 'Файл/функция {$a} не создана';
$string['nosuchfunction'] = 'Не удается определить функцию, или функция запрещена для RPC';
$string['nosuchmodule'] = 'Функция была некорректно адресована и может не быть размещена. Пожалуйста, используйте формат mod/modulename/lib/functionname';
$string['nosuchpublickey'] = 'Не удается получить открытый ключ для проверки подписи';
$string['nosuchservice'] = 'Сервис RPC не запущен на этом хосте';
$string['nosuchtransport'] = 'Не существует передачи с этим идентификатором.';
$string['notBASE64'] = 'Эта строка не содержит формат кодировки base64. Она не может быть правильным ключем';
$string['notenoughidpinfo'] = 'Ваш поставщик не предоставил нам достаточно информации, чтобы создать или обновить Ваш аккаунт локально. Извините!';
$string['not_in_range'] = 'IP-адрес <code>{$a}</code> не является правильным доверенным хостом.';
$string['notinxmlrpcserver'] = 'Попытка получить доступ к удаленному клиенту MNet не происходит во время выполнения XMLRPC сервера';
$string['notmoodleapplication'] = 'ПРЕДУПРЕЖДЕНИЕ: Это не приложение Moodle, некоторые из методов проверки могут работать неверно';
$string['notPEM'] = 'Этот ключ не в формате PEM. Он не будет работать.';
$string['notpermittedtojump'] = 'У Вас нет прав для начала удаленной сессии с этого сервера Moodle.';
$string['notpermittedtojumpas'] = 'Вы не можете начать удаленный сеанс, пока Вы авторизованы как другой пользователь.';
$string['notpermittedtoland'] = 'У Вас нет разрешения, чтобы начать удаленный сеанс.';
$string['off'] = 'Выкл.';
$string['on'] = 'Вкл.';
$string['options'] = 'Параметры';
$string['peerprofilefielddesc'] = 'Здесь Вы можете переопределить глобальные настройки для отправки и импорта полей профиля при создании новых пользователей';
$string['permittedtransports'] = 'Разрешенные передачи';
$string['phperror'] = 'Внутренняя ошибка PHP предотвратила выполнение Вашего запроса.';
$string['position'] = 'Позиция';
$string['postrequired'] = 'Функции на удаление необходим POST-запрос';
$string['profileexportfields'] = 'Поле для отправки';
$string['profilefielddesc'] = 'Здесь вы можете сконфигурировать список полей профиля, которые посылаются и получаются через MNet при создании или обновлении аккаунта пользователя. Вы можете также переопределить их для каждого MNet-узла индивидуально. Обратите внимание, что следующие поля всегда должны быть отправлены и не могут быть пропущены: {$a}';
$string['profilefields'] = 'Поля профиля';
$string['profileimportfields'] = 'Поля для импорта';
$string['promiscuous'] = 'Случайный';
$string['publickey'] = 'Открытый ключ';
$string['publickey_help'] = 'Открытый ключ получен автоматически с отдаленного сервера.';
$string['publickeyrequired'] = 'Вы должны предоставить открытый ключ.';
$string['publish'] = 'Опубликовать';
$string['reallydeleteserver'] = 'Вы действительно хотите удалить сервер';
$string['receivedwarnings'] = 'Были получены следующие предупреждения';
$string['recordnoexists'] = 'Запись не существует.';
$string['reenableserver'] = 'Нет - выберите эту опцию и повторно включите для этого сервера';
$string['registerallhosts'] = 'Регистрация всех хостов (случайный режим)';
$string['registerallhostsexplain'] = 'Вы можете выбрать решистрацию всех хостов, которые попытаются подключиться к вам автоматически. Это означает, что в Вашем списке хостов появится запись любого сайта MNet, который подключился к Вам и запросил Ваш открытый ключ.<br />Ниже Вы можете сконфигурировать сервисы для «Всех хостов» и там установить некоторые сервисы, которые Вы будете поставлять любому удаленному серверу без разбора.';
$string['registerhostsoff'] = 'Регистрация всех хостов в данный момент <b>выключена</b>';
$string['registerhostson'] = 'Регистрация всех хостов в данный момент <b>включена</b>';
$string['remotecourses'] = 'Курсы на удаленных';
$string['remotehost'] = 'Удаленный хост';
$string['remotehosts'] = 'Удаленные хосты';
$string['remoteuserinfo'] = 'Профиль удаленного пользователя {$a->remotetype} получен из <a href="{$a->remoteurl}">{$a->remotename}</a>';
$string['requiresopenssl'] = 'Для сетевого взаимодействия требуется расширение OpenSSL языка PHP';
$string['restore'] = 'Восстановление';
$string['returnvalue'] = 'Вернувшееся значение';
$string['reviewhostdetails'] = 'Просмотр деталей хоста';
$string['reviewhostservices'] = 'Просмотр сервисов хоста';
$string['RPC_HTTP_PLAINTEXT'] = 'HTTP незашифрованный';
$string['RPC_HTTP_SELF_SIGNED'] = 'HTTP (самоподписанный)';
$string['RPC_HTTPS_SELF_SIGNED'] = 'HTTPS (самоподписанный)';
$string['RPC_HTTPS_VERIFIED'] = 'HTTPS (подписанный)';
$string['RPC_HTTP_VERIFIED'] = 'HTTP (подписанный)';
$string['selectaccesslevel'] = 'Пожалуйста, выберите уровень доступа из списка';
$string['selectahost'] = 'Пожалуйста, выберите удаленный хост.';
$string['service'] = 'Имя сервиса';
$string['serviceid'] = 'ID сервиса';
$string['servicesavailableonhost'] = 'Сервис доступен на {$a}';
$string['serviceswepublish'] = 'Сервисы, которые мы разместили на {$a}';
$string['serviceswesubscribeto'] = 'Сервисы на {$a}, на которые мы подписаны';
$string['settings'] = 'Настройки';
$string['showlocal'] = 'Показать локальных пользователей';
$string['showremote'] = 'Показать удаленных пользователей';
$string['ssl_acl_allow'] = 'SSO ACL: Разрешить пользователя {$a->user} с {$a->host}';
$string['ssl_acl_deny'] = 'SSO ACL: Запретить пользователя {$a->user} с {$a->host}';
$string['ssoaccesscontrol'] = 'Управление доступом SSO';
$string['ssoacldescr'] = 'Используйте эту страницу для предоставления/запрета доступа определенным пользователям с удаленного хоста MNet. Это целесообразно, когда Вы предоставляете SSO сервис удаленным пользователям. Для управления способностью своих <em>локальных</em> пользователей путешествовать по другим MNet-хостам используйте системные роли, чтобы предоставить им возможность <em>mnetlogintoremote</em>.';
$string['ssoaclneeds'] = 'Чтобы этот функционал заработал, Вы должны включить «Сетевое взаимодействие», плюс активировать плагин аутентификации MNet.';
$string['strict'] = 'Определенный';
$string['subscribe'] = 'Подписка';
$string['system'] = 'Система';
$string['testclient'] = 'Тестовый клиент MNet';
$string['testtrustedhosts'] = 'Проверка адреса';
$string['testtrustedhostsexplain'] = 'Чтобы убедиться, что это доверенный хост, введите его IP-адрес';
$string['theypublish'] = 'Они размещены';
$string['theysubscribe'] = 'Они подписаны';
$string['transport_help'] = 'Эти опции - взаимны, т.е. Вы можете вынудить отдаленный хост использовать подписанный сертификат SSL, только если у Вашего сервера тоже есть подписанный сертификат SSL.';
$string['trustedhosts'] = 'Узлы XML-RPC';
$string['trustedhostsexplain'] = '<p>Механизм доверенных хостов разрешает определенным машинам выполнять вызовы через XML-RPC к любой части Moodle API. Это доступно для скриптов управления поведением Moodle, и Вы должны быть осторожны при их включении. Если у Вас есть сомнения, оставьте их выключенными.</p> <p><strong>Это не нужно для любых стандартных возможностей MNet!</strong> Включайте их, только если знаете, что делаете.</p> <p> Чтобы включить их, введите список IP-адресов или сетей, по одному в каждой строке. Например:</p> Ваш локальный хост:<br />127.0.0.1<br />Ваш локальный хост (с сетевыми блоками):<br />127.0.0.1/32<br />Только хост с IP-адресом 192.168.0.7:<br />192.168.0.7/32<br />Любые хосты с IP-адресом между 192.168.0.1 и 192.168.0.255:<br />192.168.0.0/24<br />Любые хосты:<br />192.168.0.0/0<br />Очевидно, что последний пример <strong>НЕ</strong> рекомендуется.';
$string['turnitoff'] = 'Выключить';
$string['turniton'] = 'Включить';
$string['type'] = 'Тип';
$string['unknown'] = 'Неизвестно';
$string['unknownerror'] = 'Неизвестная ошибка произошла во время согласования.';
$string['usercannotchangepassword'] = 'Вы не можете изменить здесь свой пароль, поскольку Вы удаленный пользователь.';
$string['userchangepasswordlink'] = 'Вы можете изменить свой пароль для провайдера <a href="{$a->wwwroot}/login/change_password.php">{$a->description}</a>';
$string['usernotfullysetup'] = 'Ваш пользовательский аккаунт не завершен. Вам нужно перейти <a href="{$a}">назад к своему поставщику</a> и там полностью заполнить свой профиль. Возможно, Вам придется выйти из системы и войти снова, чтобы изменения вступили в силу.';
$string['usersareonline'] = 'Предупреждение: пользователи с этого сервера ({$a}) в данный момент авторизованы на Вашем сайте.';
$string['validated_by'] = 'Это проверено сетью: <code>{$a}</code>';
$string['verifysignature-error'] = 'Ошибка проверки подписи.';
$string['verifysignature-invalid'] = 'Ошибка проверки подписи. Она может появляться, если этот продукт не был подписан Вами.';
$string['version'] = 'Версия';
$string['warning'] = 'Предупреждение';
$string['wrong-ip'] = 'Ваш IP-адрес не соответствует адресам, которые хранятся у нас';
$string['xmlrpc-missing'] = 'У Вас должно быть установлено XML-RPC для PHP, чтобы использовать эту особенность.';
$string['yourhost'] = 'Ваш хост';
$string['yourpeers'] = 'Ваши узлы';
