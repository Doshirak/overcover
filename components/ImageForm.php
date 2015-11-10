<?php
namespace app\components;

use Yii;
use yii\base\Widget;
use yii\helpers\Html;

class ImageForm extends Widget{
    public $form;
    public $model;

	public function init(){
		parent::init();
	}

	public function run(){
        $model = $this->model;
        $result = '';
        if($model->img != "") {
            $result .= "<h4>Current image</h4>";
            $result .= "<img width='300' height='300' src='".Yii::getAlias('@web/').$model->img."'>";
            $result .= "<h4>Choose new</h4>";
        } else {
            $result .= "<h4>Choose image</h4>";
        }
        $result .= $this->form->field($model, 'img')->fileInput();
        return $result;
	}
}
?>
