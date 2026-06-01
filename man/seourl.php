rename .htaccess.txt to .htaccess edit to


## No directory listings
<IfModule mod_autoindex.c>
  IndexIgnore *
</IfModule>

## No-Referrer-Header
<IfModule mod_headers.c>
  Header set Referrer-Policy "no-referrer"
</IfModule>

## Suppress mime type detection in browsers for unknown types and prevent FLOC
<IfModule mod_headers.c>
  Header always set X-Content-Type-Options "nosniff"
  Header always set Permissions-Policy "interest-cohort=()"
</IfModule>

## Can be commented out if causes errors, see notes above.
Options +FollowSymlinks

## Prevent Directory listing
Options -Indexes

## Prevent Direct Access to files
<FilesMatch "(?i)((\.tpl|\.twig|\.ini|\.log|(?<!robots)\.txt))">
 Require all denied
## For apache 2.2 and older, replace "Require all denied" with these two lines :
# Order deny,allow
# Deny from all
</FilesMatch>


# Redirect all /ua/... URLs to remove /ua/ prefix (default language)
RewriteCond %{REQUEST_URI} ^/tennis/ua/(.*)$
RewriteRule ^ua/(.*)$ /tennis/$1 [R=301,L]

## SEO URL Settings
RewriteEngine On
## If your opencart installation does not run on the main web folder make sure you folder it does run in ie. / becomes /shop/
RewriteBase /tennis/
## Rewrite Rules
RewriteRule ^system/storage/(.*) index.php?route=error/not_found [L]
RewriteCond %{REQUEST_FILENAME} !-f
RewriteCond %{REQUEST_FILENAME} !-d
RewriteCond %{REQUEST_URI} !.*\.(ico|gif|jpg|jpeg|png|webp|js|css|svg)
RewriteRule ^([^?]*) index.php?_route_=$1 [L,QSA]


end of file


edit file /etc/apache2/sites-available/000-default.conf
to 
<VirtualHost *:80>
    ServerAdmin sernuzh@gmail.com
    DocumentRoot /var/www

    <Directory /var/www>
        AllowOverride All
        Require all granted
    </Directory>

    ErrorLog ${APACHE_LOG_DIR}/error.log
    CustomLog ${APACHE_LOG_DIR}/access.log combined
</VirtualHost>

end of file

Admin panel - Settings - Server - enable SEO

Admin panel -Design - SEO Url - create new - 
contacts 	route 	information/contact 	0 	За замовчуванням
ua 	language 	uk-ua 	-2  - це для мови
home 	route 	common/home 	0 - для домашньої сторінки


Cmd - sudo a2enmod rewrite - sudo systemctl restart apache2


https://chatgpt.com/share/6a1c7303-7e5c-83eb-be64-b38f9a54032e


/var/www/tennis/catalog/controller/startup/seo_url.php
44-57
if (isset($this->request->get['product_id'])) {
    $this->request->get['route'] = 'product/product';
}

if (isset($this->request->get['category_id'])) {
    $this->request->get['route'] = 'product/category';
}
if (isset($this->request->get['article_id'])) {
    $this->request->get['route'] = 'cms/blog.info';
}

if (isset($this->request->get['topic_id'])) {
    $this->request->get['route'] = 'cms/blog';
}



