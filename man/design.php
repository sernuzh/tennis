РОЗДІЛИ САЙТУ 

Турніри
Товари
Рейтинг
							Контакти
Питання-Відповіді
Календар подій
Члени клубу
Тренування тенісу
Заняття фітнесом
Збір коштів
Наші партнери
Робота
							Філософія клубу
Лідери
							Про нас
							Ми на карті
Новини

Поставити свій контент на головну сторінку сайту
1 - Extensions - Extensions - Modules - HTML Content - створити свій модуль з текстом головної сторінки
2 - Design - Layouts - Home - Content Top - додати створений модуль
АБО
1 - редагувати файл home.twig

Для кешування стилів stylesheet.scss  перезаписує stylesheet.css кожного разу при перезагрузці сторінки. Робить це контролер /catalog/controller/startup/sass.php. Як захардкодити не знайшов. Шоб обійти кешування у контролері /var/www/serhicart/catalog/controller/common/header.php прописуємо 
$data['stylesheet'] = 'catalog/view/stylesheet/serhii.css'; , замість stylesheet.css 
І відповідно створюємо файл catalog/view/stylesheet/serhii.css куди пееркопійовуємо все із stylesheet.css
Додатково потрібно в броузері натиснути F12 перейти на вкладку Network і поставити галочку навпроти disable caching. А якшо воно вже поставлено то треба зняти і поставити наново бо воно чомусь не робить автоматом.

Змінити колір меню в топі хедера треба перш ніж редагувати stylesheet.css треба в файлі /catalog/view/template/common/header.twig в тегу <div id="menu" class="navbar navbar-expand-lg bg-primary"> забрати bg-primary



