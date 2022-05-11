<?php

namespace frontend\helpers;

use common\models\User;
use DateTime;
use DateTimeZone;
use Exception;
use Yii;

class SiteHelper {
    public static function handleAddonExistence($key, $resumeModel, $addonModelClassName, $params)
    {
        if (array_key_exists($key, $params)) {
            foreach ($params[$key] as $addonData) {
                $addonModel = new $addonModelClassName();

                if ($addonModel->load([$key => $addonData])) {
                    $addonModel->resume_id = $resumeModel->id;
                    $addonModel->save();
                }
            }
        }
    }

    /**
     * @throws Exception
     */
    public static function dateTimeInTimezone($dateTime): string
    {
        /* @var $currentUser User */
        $currentUser = Yii::$app->getUser()->identity;
        $currentUsersTimezone = $currentUser->timezone;
        $dateAndTimeInUsersTimezone = new DateTime($dateTime);
        $dateAndTimeInUsersTimezone->setTimezone(new DateTimeZone($currentUsersTimezone));

        return $dateAndTimeInUsersTimezone->format('Y-m-d H:i:s');
    }
}