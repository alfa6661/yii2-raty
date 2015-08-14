yii2-raty
====
Yii2-raty is a wrapper for [jQuery Raty plugin](http://wbotelhos.com/raty). jQuery Raty is a plugin that generates a customizable star rating automatically.

Installation
------------

The preferred way to install this extension is through [composer](http://getcomposer.org/download/).

Either run

```
php composer.phar require --prefer-dist alfa6661/yii2-raty "*"
```

or add

```
"alfa6661/yii2-raty": "*"
```

to the require section of your `composer.json` file.


Usage
-----

Once the extension is installed, simply use it in your code by  :

```php
// Usage
<?= \alfa6661\widgets\Raty::widget([
	'name' => 'user-vote',
	'options' => [
		// the HTML attributes for the widget container
	],
	'pluginOptions' => [
		// the options for the underlying jQuery Raty plugin
		// see : https://github.com/wbotelhos/raty#options
	]
]); ?>


// Usage with model
<?= \alfa6661\widgets\Raty::widget([
	'model' => $model,
	'attribute' => 'rating',
	'options' => [
		// the HTML attributes for the widget container
	],
	'pluginOptions' => [
		// the options for the underlying jQuery Raty plugin
		// see : https://github.com/wbotelhos/raty#options
	]
]); ?>

// Usage with ActiveForm and model
<?= $form->field($model, 'rating')->widget(\alfa6661\widgets\Raty::className()
	'options' => [
		// the HTML attributes for the widget container
	],
	'pluginOptions' => [
		// the options for the underlying jQuery Raty plugin
		// see : https://github.com/wbotelhos/raty#options
	]
) ?>

// Javascript events handling
// Available event callbacks: Read Only, Click, Mouseover and Mouseout
<?= \alfa6661\widgets\Raty::widget([
	'name' => 'user-vote',
	'options' => [
		'class' => 'pull-left',
		'id' => 'user-vote'
	],
	'pluginOptions' => [
		'click' => new \yii\web\JsExpression('function(score, e) {
			alert(score);
		}')
	]
]); ?>
```
