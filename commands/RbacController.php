<?php
namespace app\commands;

use Yii;
use yii\console\Controller;

class RbacController extends Controller
{
    public function actionIndex()
    {
        $auth = Yii::$app->authManager;

        // add "createPost" permission
        $editPosts = $auth->createPermission('editPosts');
        $editPosts->description = 'Edit posts';
        $auth->add($editPosts);

        $editUsers = $auth->createPermission('editUsers');
        $editUsers->description = 'Edit users';
        $auth->add($editUsers);

        // add "author" role and give this role the "createPost" permission
        $user = $auth->createRole('user');
        $auth->add($user);

        $author = $auth->createRole('author');
        $auth->add($author);
        $auth->addChild($author, $editPosts);

        // add "admin" role and give this role the "updatePost" permission
        // as well as the permissions of the "author" role
        $admin = $auth->createRole('admin');
        $auth->add($admin);
        $auth->addChild($admin, $editUsers);
        $auth->addChild($admin, $author);
    }
}
