<h2>ApiRestFullPhp</h2>

<p>Vamos usar o Slim http://www.slimframework.com/ <b> Versão 3<b>
http://www.slimframework.com/docs/v3/start/installation.html
<p>


<h5>Comando para instalar o slim</h5>

```
comando: composer require slim/slim:"4.*"
```

<h5>Codigo do .htaccess</h5>

```
RewriteEngine On
RewriteCond %{REQUEST_FILENAME} !-f
RewriteCond %{REQUEST_FILENAME} !-d
RewriteRule ^ index.php [QSA,L]
```
