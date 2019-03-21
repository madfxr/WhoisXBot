# WHOIS Lookup Utility: for TLD, gTLD, ccTLD and mTLD with Telegram Bot

## Requirements
- Git
- Nginx
- PHP-FPM
- PHP
- BIND
- Certbot

## Installation
- Configure the Web Server and SSL: ``https://certbot.eff.org/lets-encrypt/centosrhel7-nginx``
- Cloning PHP source code: ``https://github.com/xnxmx/whoisxbot.git``
- Chat in Telegram with ``@BotFather (https://t.me/BotFather)`` and create a new bot
- Get your API token (example: ``613961047:AZFWy0k603kLssujSIkKacmKuxxxTnq8Wl4``)
- In php file line 2, change ``<authorization_token>`` with your API token (example: ``613961047:AZFWy0k603kLssujSIkKacmKuxxxTnq8Wl4``)
- Upload the ``index.php`` file to your Web Server with SSL support
- Then access the following URL: ``https://api.telegram.org/bot<authorization_token>/setWebhook?url=https://domain.tld/index.php`` in the web browser to set the webhook (example: ``https://api.telegram.org/bot613961047:AZFWy0k603kLssujSIkKacmKuxxxTnq8Wl4/setWebhook?url=https://domain.tld/index.php``
- Chat in Telegram with ``@BotFather (https://t.me/BotFather)`` and edit ``@yourBotName`` commands:

```
whois - Client for the whois directory service
```

- Enjoy!

## Demo
@whoisXbot (https://t.me/whoisXbot)

## Notes
- SERVBot is still tried on CentOS 7 x86_64 only
- If you are using another operating system, feel free to make changes to an existing PHP source code
