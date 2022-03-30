<?php

namespace frontend\models;

use DateTimeZone;
use frontend\validators\UsernameValidator;
use Yii;
use yii\base\Model;
use common\models\User;

/**
 * Signup form
 */
class SignupForm extends Model
{
    public string $username;
    public string $email;
    public string $password;
    public int $role;
    public string $avatar;
    public string $timezone;

    const SCENARIO_CANDIDATE = 'candidate';
    const SCENARIO_COMPANY = 'company';

    /**
     * {@inheritdoc}
     */
    public function rules(): array
    {
        return [
            ['username', 'trim'],
            ['username', 'required'],
            ['username', UsernameValidator::class],
            ['username', 'unique', 'targetClass' => '\common\models\User', 'message' => 'This username has already been taken.'],
            ['username', 'string', 'min' => 2, 'max' => 255],

            ['email', 'trim'],
            ['email', 'required'],
            ['email', 'email'],
            ['email', 'string', 'max' => 255],
            ['email', 'unique', 'targetClass' => '\common\models\User', 'message' => 'This email address has already been taken.'],

            ['password', 'required'],
            ['password', 'string', 'min' => Yii::$app->params['user.passwordMinLength']],

            ['role', 'integer'],

            ['timezone', 'string'],
            ['timezone', 'required'],

            [['avatar'], 'required', 'on' => self::SCENARIO_COMPANY],
            [['avatar'], 'image', 'skipOnEmpty' => true],
        ];
    }

    public function scenarios(): array
    {
        $scenarios = parent::scenarios();
        $scenarios['default'] = $scenarios['candidate'] = ['username', 'email', 'password', 'role', 'timezone'];

        return $scenarios;
    }

    public function getAvatarPath(): string
    {
        return Yii::getAlias('@frontend') . '/web/images/';
    }

    public function getAvatarUrl(): string
    {
        return '/images/'. $this->avatar;
    }

    public function upload(): bool
    {
        if ($this->validate()) {
            $path = 'images/' . uniqid('avatar') . '.' . $this->avatar->extension;
            $this->avatar->saveAs('@frontend/web/' . $path);
            $this->avatar = $path;
            
            return true;
        } else {
            return false;
        }
    }

    /**
     * Signs user up.
     */
    public function signup($role): ?User
    {
        if (!$this->validate()) {
            return null;
        }
        
        $postRequest = Yii::$app->request->post();
        $timezoneList = DateTimeZone::listIdentifiers();
        $selectedTimezone = $timezoneList[$postRequest['SignupForm']['timezone']];

        $user = new User();
        $user->username = $this->username;
        $user->email = $this->email;
        $user->role = $role;
        $user->timezone = $selectedTimezone;
        $user->avatar = $this->avatar;
        $user->setPassword($this->password);
        $user->generateAuthKey();
        $user->generateEmailVerificationToken();
        $saveAndSendEmail = $user->save() && $this->sendEmail($user);

        if ($saveAndSendEmail) {
            return $user;
        }

        return null;
    }

    /**
     * Sends confirmation email to user
     * @param User $user user model to with email should be send
     * @return bool whether the email was sent
     */
    protected function sendEmail($user)
    {
        return Yii::$app
            ->mailer
            ->compose(
                ['html' => 'emailVerify-html', 'text' => 'emailVerify-text'],
                ['user' => $user]
            )
            ->setFrom([Yii::$app->params['supportEmail'] => Yii::$app->name . ' robot'])
            ->setTo($this->email)
            ->setSubject('Account registration at ' . Yii::$app->name)
            ->send();
    }
}
