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
		rewrite ^(.*)$ /Public/index.php;
	}


	location ~ \.php$ {
		include snippets/fastcgi-php.conf;
		fastcgi_pass unix:/var/run/php/php7.4-fpm.sock;
	}

}