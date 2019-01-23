<?php
/**
 * Created by PhpStorm.
 * User: OTZ_VAV
 * Date: 15.01.2019
 * Time: 9:47
 */

namespace app\controllers;
use app\models\Category;
use app\models\Good;
use yii\web\Controller;
use Yii;

class CategoryController extends Controller
{
    public function actionIndex() {
        $goods = new Good();
        $goods = $goods->getAllGoods();//Все данные из таблицы попадают в контроллер
        return $this->render('index', compact('goods'));//Передача данных во вьюшку
    }

    public function actionView($id)
    {
        $goods = new Good();
        $goods = $goods->getGoodsCategories($id);
        $title = new Category();
        $title = $title->getCategoryTitle($id);
        return $this->render('view', compact('goods', 'title'));
    }

    public function actionSearch()
    {
        $search = Yii::$app->request->get('search');//Считываем данные из переменной полученной с помощью get запроса
        $search = strip_tags($search);
        $search = htmlspecialchars($search);
        $goods = new Good();
        $goods = $goods->getSearchResults($search);
        return $this->render('search', compact('goods', 'search'));
    }

}