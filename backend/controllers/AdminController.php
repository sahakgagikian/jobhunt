<?php

namespace backend\controllers;

use JetBrains\PhpStorm\ArrayShape;
use yii\filters\AccessControl;
use yii\web\Controller;

/**
 * AdminController implements the CRUD actions for Admin model.
 */
class AdminController extends Controller
{
    /**
     * @inheritDoc
     */
    #[ArrayShape(['access' => "array"])] public function behaviors(): array
    {
        return  [
            'access' => [
                'class' => AccessControl::class,
                'rules' => [
                    [
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
        ];
    }
}
