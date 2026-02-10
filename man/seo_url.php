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

Cmd - sudo a2enmod rewrite - sudo systemctl restart apache2



