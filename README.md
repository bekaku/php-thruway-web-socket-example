# PHP websocket with thruway and autobahn-js

Requirements
------------

Only supported on PHP 5.6 and up.

## Usage

### 1. Download this repository
```
git clone https://github.com/bekaku/php-thruway-web-socket-example my-app
```

Repository will be downloaded into `my-app/` folder

Switch to the new directory
```
cd my-app
```

### 2. Instal Composer ependencies

Go to the downloaded repository folder and run:
```
php composer.phar require voryx/thruway
```
```
php composer.phar require thruway/pawl-transport
```
Start the WAMP router

      $ php app/cmd.php
    
Thruway is now running on 127.0.0.1 port 9000 

### 3 Clients
Run http://localhost/my-app/app/client.html on browser and open console for result
```
 <script>
      var connection = new autobahn.Connection({
            url: "ws://127.0.0.1:9000", //connect insecure mode
		// url: "wss://127.0.0.1/_ws_/", //connet secure mode
        realm: "realm1"
      });
  </script>
```
Run http://localhost/my-app/app/publish.php for test publish from server site 

### Setting up a Secure WebSocket on Thruway (PHP) in Apache (Ubuntu) server

You need to enable the following modules: proxy_http and proxy_wstunnel
```
sudo a2enmod proxy_http

sudo a2enmod proxy_wstunnel

```
Restart Apache

open your Virtualhost config in /etc/apache2/sites-enabled/yoursite.conf

```
<IfModule mod_proxy.c>
    ProxyPass "/_ws_/" "ws://127.0.0.1:9000/"
    ProxyPassReverse "/_ws_/" "ws://127.0.0.1:9000/"
</IfModule>
```
And client can connect with secure WebSocket
```
 <script>
      var connection = new autobahn.Connection({
		url: "wss://127.0.0.1/_ws_/", //connet secure mode
        realm: "realm1"
      });
  </script>
```
