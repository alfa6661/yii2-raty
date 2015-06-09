<?php
namespace alfa6661\widgets;

use Yii;
use yii\helpers\Html;
use yii\helpers\Json;

/**
 * Yii2-Raty
 * Yii2 wrapper for jQuery Raty plugin
 *
 * @author Alfa Adhitya <alfa2159@gmail.com>
 * @link http://www.lab-informatika.com/
 */
class Raty extends \yii\widgets\InputWidget
{

    /**
     * @var array jQuery Raty options
     * @see https://github.com/wbotelhos/raty#options
     */
    public $pluginOptions = [];

    /**
     * jQuery Raty options by default
     * @var array
     */	
    private $_defaultOptions = [];

    /**
     * Initializes the widget.
     */
    public function init()
    {    	
        $bundle = RatyAsset::register($this->view);
        $this->_defaultOptions = array(
		'path' => $bundle->baseUrl .'/images',
		'targetType' => 'number',			
		'hints' => [
			Yii::t('app','bad'),
			Yii::t('app','poor'),
			Yii::t('app','regular'),
			Yii::t('app','good'),
			Yii::t('app','gorgeous')
		],
		'noRatedMsg' => Yii::t('app','Not rated yet!'),
		'cancelHint' => Yii::t('app', 'Cancel this rating!'),
	);
	parent::init();
    }

    /**
     * Registers the needed client assets
     */
    private function registerAssets()
    {
    	$view = $this->getView();
    	$options = Json::encode($this->pluginOptions);
    	$script = "$('div#{$this->options['id']}').raty({$options});";
    	
    	$defaultConfiguration = '';
        foreach($this->_defaultOptions as $k => $v) {
        	$value = Json::encode($v);
		$defaultConfiguration .= "$.fn.raty.defaults.{$k}={$value};\n";
	}

        $view->registerJs($defaultConfiguration);
	$view->registerJs($script);
    }

    /**
     * Executes the widget.
     */
    public function run()
    {    
        if(empty($this->options['id']))
            $this->options['id'] = $this->getId();

        $this->pluginOptions['score'] = ($this->hasModel()) ? Html::getAttributeValue($this->model, $this->attribute) : $this->value;
        
        if(!empty($this->pluginOptions['score'])) {
		$this->options['data-score'] = $this->pluginOptions['score'];
	}
        $this->registerAssets();
        return Html::tag('div', '', $this->options);        
    }

}
