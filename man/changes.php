DONE remove warning on admin page about storage folder 
-видалено рядок 33 - {{ security }} з файлу /admin/view/template/common/dashboard.twig
-видалено рядок 90 - $data['security']... з файлу /admin/controller/common/dashboard.php

LANGUAGE
    Назва: Українська
    Код: uk-ua
    Кодування: uk_UA.UTF-8,uk_UA,ukrainian
    Статус: Включено
На локалхості спочатку нічого вийшло. Завантажив з сайту https://www.opencart.com/index.php?route=marketplace/extension/info&member_token=872b31248ceedd5a9549d561f2c4f179&extension_id=43792&filter_download_id=78&filter_member=opencartbot&sort=date_added. Залив файли з архіву вручну в папки. Перейшов у System - Localization - Languages - додав мову вручну з такими параметрами
Назва:Ukrainian
Код: uk-ua
Кодування: uk_UA.UTF-8,uk_UA,ukrainian
Статус: Включено
Далі пеерйшов в System - Settings - Local - поставив українську як основну для магазину і для адмінки.
Зявилася кнопка вибору укр мови вверху але при її виборі всеодно залишається англійська шо в адмінці шо в фронтенді. Очистив кеш кнопкою в dashboard а потім так як описано нижче відімкнув кешування повністю. Зрештою перевстановив права 777 на усі файли сайту і усе запрацювало.
Якщо потрібно змінити мову адмінки на англійську а мову фронтенду залишити українською то в налаштуваннях мов system - localization - languages можна поставити статус для англійської скривати кнопку вибору мови але в system - settings - local - Administration Language - поставити  english, але навіть після цього адмінка не стане англійською. Потрібно в адмінці натиснути зправа вверху в шапці де вибір мов англійський прапор.


DONE switch off caching completely 
- /system/library/template/twig.php - 112 row -     'debug' => true, //'cache'       => DIR_CACHE . 'template/'
- /system/library/cache/file.php - comment all inside function set()
або  непровірено але мало би працювати https://webocreation.com/twig-cache-removing-while-developing-theme-or-module-developer-tips/#gsc.tab=0
-/system/storage/vendor/twig/twig/src/Cache/FilesystemCache.php -  //@include_once $key;

https://webocreation.com/10-ways-to-speed-up-the-opencart-3-website-speed-optimization/



% скачати один vqmod модуль i подивитись синтаксис
% пошукати vqmod writer для спрощення написання файлів
% розтягнути на всю ширину оптимізувати розміри фоток  і карток
% налаштувати шрифти і кольори
% повикидати усе лишнє - кнопки текст і тд
% підключити соціальні мережі для реєстрації на сайті
% додати QR код для швидкого доступу
% додати карту розташування фірми
% налаштувати швидке замовлення
% підтягнути адреси в нову пошту при виборі доставки
% додати блог у двіжок
% змінити розмітку шаблону
% поставити vqmod і протестити роботу
% коментувати serhicart_vqmod з допомогою АІ




DONE speedup opencart
-закоментувати 5-37, 49-53 рядок /system/startup.php
-видалити усе що повязане з datetimepicker/catalog/view/template/common/header.twig
Вимкнути рахування загальної кількості товарів по категоріях в магазині
IN FILES
/catalog/controller/product/category.php 
/catalog/controller/common/menu.php
/extension/opencart/catalog/controller/module/filter.php
/extension/opencart/catalog/controller/module/category.php
DELETE <<<< . ($this->config->get('config_product_count') ? ' (' . $this->model_catalog_product->getTotalProducts($filter_data) . ')' : '')  >>>>
IN FILE /system/startup.php
DELETE 2-37, 48-53 lines
IN FILE /system/framework.php
DELETE LOGGING 29-79 lines








Для кешування стилів stylesheet.scss  перезаписує stylesheet.css кожного разу при перезагрузці сторінки. Робить це контролер /catalog/controller/startup/sass.php. Як захардкодити не знайшов. Шоб обійти кешування у файлі /var/www/serhicart/catalog/controller/common/header.php прописуємо 
$data['stylesheet'] = 'catalog/view/stylesheet/serhii.css'; , замість stylesheet.css 
І відповідно створюємо файл catalog/view/stylesheet/serhii.css куди пееркопійовуємо все із stylesheet.css
Додатково потрібно в броузері натиснути F12 перейти на вкладку Network і поставити галочку навпроти disable caching


DONE footer opencart logo
/catalog/view/template/common/footer.twig
DELETE <<<<   <p>{{ powered }}</p>
    <!--
OpenCart is open source software and you are free to remove the powered by OpenCart if you want, but its generally accepted practise to make a small donation.
Please donate via PayPal to donate@opencart.com
//--> >>>>
serhicart/serhii/view/template/common/footer.twig
DELETE <<<< <footer id="footer">{{ text_footer }}<br/>{{ text_version }}</footer> >>>>


