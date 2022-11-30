# extas-bot

Extas Bot package.

Пакет позволяет управлять одним или несколькими ботами.
Сам пакет не заточен под конкретную платформу (Телеграм, Алиса и т.п.), но за счёт плагинов позволяет упростить реализацию бота под любую платформу.

# usage

# Default tg bot

- Create Tg Bot with https://t.me/BotFather
- Paste your token into extas.json (where is "your-token" written).
- Install `# vendor/bin/extas i`
- Register webhook for your bot:

```
POST /bot/v1/
BODY
{
    "bot_name": "tg-test",
    "message": "register-webhook",
    "chat_id": "place here your bot chat id to get response"
}
```

- Post "/help" to your bot: you must see the description response.

# Default Yandex.Alice bot

- Create Skill here: 
- Paste your token into extas.json (where is "your-token" written).
- Install `# vendor/bin/extas i`
- Say to Alice "Алиса, запусти навык Экстаз-Тест".
- Say to skill "Help": you should see a description response.

# Default Text bot

- Install `# vendor/bin/extas i`
- Call this bot:

```
POST localhost/bot/v1
BODY
{
    "bot_name": "text-test",
    "message": "help"
}
```

You should see a description response.