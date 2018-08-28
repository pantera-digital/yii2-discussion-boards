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
php yii migrate --migrationPath=vendor/yii2mod/yii2-comments/migrations
```

Configure
---------------------------------

Add to your config `modules` section:

```
'discussion' => [
    'class' => 'pantera\discussions\Module',
    'access' => ['@'],
    'userModel' => 'dektrium\user\models\User', // optional parameter
],
'comment' => [
    'class' => 'yii2mod\comments\Module',
],
```

Add to your config `components` section (for correct `comments` module work):

```
'i18n' => [
    'translations' => [
        'yii2mod.comments' => [
            'class' => 'yii\i18n\PhpMessageSource',
            'basePath' => '@yii2mod/comments/messages',
        ],
    ],
],
```
