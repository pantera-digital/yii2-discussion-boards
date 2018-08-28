# yii2-discussion-boards

Install
---------------------------------

Run

```
php composer require pantera-digital/yii2-discussion-boards "*"
```

Or add to composer.json

```
"pantera-digital/yii2-discussion-boards": "*",
```

and execute:

```
php composer update
```

Run migrations:

```
php yii migrate --migrationPath=vendor/pantera-digital/yii2-discussion-boards/migrations
```

Configure
---------------------------------

Add to your config `modules` section:

```
'discussion' => [
    'class' => 'pantera\discussions\Module',
    'access' => ['@'],
    'userModel' => 'app\models\User',
],
```
