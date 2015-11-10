<?php
namespace app\components;

use Yii;
use yii\base\Component;
use yii\web\UploadedFile;

class ImageHandler extends Component {

  public static function loadImage($model, $path)
  {
    $oldSrc = $model->img;
    if ($model->load(Yii::$app->request->post())) {
        if ($imageFile = UploadedFile::getInstance($model, 'img')) {
            $ext = $imageFile->getExtension();
            $newImageName = hash('md5', $imageFile->getBaseName()) . '.' .$ext;
            $imageFile->saveAs($path . $newImageName);
            $model->img = $path . $newImageName;
        } else {
            $model->img = $oldSrc;
        }
        return $model->save();
    }
  }
}
?>
