<h2>ApiRestFullPhp</h2>

<p>Vamos usar o Slim http://www.slimframework.com/ <b> Versão 3<b>
http://www.slimframework.com/docs/v3/start/installation.html
<p>


<h5>Comando para instalar o slim</h5>

```
composer require slim/slim:3.*
```

<h5>Codigo do .htaccess</h5>

```
RewriteEngine On
RewriteCond %{REQUEST_FILENAME} !-f
RewriteCond %{REQUEST_FILENAME} !-d
RewriteRule ^ index.php [QSA,L]
SetEnvIf Authorization "(.*)" HTTP_AUTHORIZATION=$1
```

<h4>Como modificar</h4>
<p>Dentro da pasta <i>src/routes/clients.php</i> estão todas as rotas para aplicação bem como as querys para o banco de dados.<p>
<p>Dentro da pasta <i>src/config/db.php</i> estão as configuraçõesdo banco de dados.<p>