### My learning project "Apple Shop" for Nix solution
### Author: Goncharov Alexey

### For start

Configure the Nginx server section as follows:

```nginx
server {
	listen 80;
	listen [::]:80;

	root /home/leon/www/mysite.com;

	index index.php index.html index.htm index.nginx-debian.html;

	server_name mysite.com www.mysite.com;

  	
 	location ~* ^.+.(js|json|css|png|jpg|jpeg|gif|svg|webp|ico|txt|woff|woff2|ttf|otf|eot)$ {}
	location / {
		rewrite ^(.*)$ /public/index.php;
	}


	location ~ \.php$ {
		include snippets/fastcgi-php.conf;
		fastcgi_pass unix:/var/run/php/php7.4-fpm.sock;
	}

}
```
After that enter the command

```
$ composer install
```
Then create a file .env in 'App/Config/'

```
DB_CONNECTION=mysql
DB_HOST=localhost
DB_DATABASE=base
DB_USERNAME=user
DB_PASSWORD=pass
```

### Administrator login details

```
Email: 80ka96@gmail.com
Password: pass
```