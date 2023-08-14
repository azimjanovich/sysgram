# SYSGRAM - PHP TELEGRAM BOT FRAMEWORK

```bash
composer create-project azimjanovich/sysgram example-telegram-bot
```

## Set TOKEN .env file
```.env
TOKEN=<YOUR_TOKEN_BOT>
```

## Run project with NGROK
- run ngrok with 8080 port
```bash
ngrok http 8080
```
<i>ngrok.url -> http://localhost:8080</i>

- set ngrok url .env file
```.env
NGROK_URL=
```

- run project
```bash
php artisan serve
```
