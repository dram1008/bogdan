<?php

namespace app\models;

use app\services\RegistrationDispatcher;
use cs\services\Security;
use cs\services\SitePath;
use cs\services\VarDumper;
use Imagine\Image\Box;
use yii\helpers\ArrayHelper;
use yii\helpers\FileHelper;
use yii\helpers\Url;
use cs\services\UploadFolderDispatcher;
use yii\imagine\Image;
use \Imagine\Image\ManipulatorInterface;

class User extends \cs\base\DbRecord implements \yii\web\IdentityInterface
{
    use UserCache;

    const TABLE = 'gs_users';

    public static $avatarPathList = [
        'galaxysss.com/galaxysss',
        'avia.galaxysss.ru/bogdan',
        'rod.galaxysss.ru/rod',
        'tesla.galaxysss.ru/tesla',
    ];

    /**
     * @inheritdoc
     */
    public static function findIdentity($id)
    {
        return self::find($id);
    }

    /**
     * Заполнены ли данные о Дизайне Человека?
     *
     * @return bool
     */
    public function hasHumanDesign()
    {
        return $this->getField('human_design', '') != '';
    }

    /**
     * Заполнены ли данные о Дизайне Человека?
     *
     * @return \app\models\HumanDesign
     */
    public function getHumanDesign()
    {
        $data = $this->getField('human_design');;
        if (is_null($data)) {
            return null;
        }
        $data = json_decode($data);

        return new \app\models\HumanDesign($data);
    }

    /**
     * @inheritdoc
     */
    public static function findIdentityByAccessToken($token, $type = null)
    {
        return self::find(['access_token' => $token]);
    }

    /**
     * Finds user by username
     *
     * @param  string $username
     *
     * @return static|null
     */
    public static function findByUsername($username)
    {
        return self::find(['email' => $username]);
    }

    /**
     * @inheritdoc
     */
    public function getAuthKey()
    {
        return md5($this->getEmail() . '12345');
    }

    /**
     * @inheritdoc
     */
    public function validateAuthKey($authKey)
    {
        return $this->getAuthKey() == $authKey;
    }

    /**
     * Validates password
     *
     * @param  string $password password to validate
     *
     * @return boolean if password provided is valid for current user
     */
    public function validatePassword($password)
    {
        return password_verify($password, $this->getField('password'));
    }

    public static function hashPassword($password)
    {
        return password_hash($password, PASSWORD_BCRYPT);
    }

    /**
     * Регистрирует пользователей
     *
     * @param $email
     * @param $password
     * @param $fields
     *
     * @return static
     */
    public static function registration($email, $password, $fields = [])
    {
        $email = strtolower($email);
        $fields = ArrayHelper::merge($fields, [
            'email'                    => $email,
            'password'                 => self::hashPassword($password),
            'is_active'                => 1,
            'is_confirm'               => 0,
            'datetime_reg'             => gmdate('YmdHis'),
            'referal_code'             => Security::generateRandomString(20),
            'subscribe_is_bogdan'      => 1,
        ]);

        $user = self::insert($fields);
        $fields = \app\services\RegistrationDispatcher::add($user->getId());
        \cs\Application::mail($email, 'Подтверждение регистрации', 'registration', [
            'url'      => Url::to([
                'auth/registration_activate',
                'code' => $fields['code']
            ], true),
            'user'      => $user,
            'password'  => $password,
            'datetime'  => \Yii::$app->formatter->asDatetime($fields['date_finish'])
        ]);

        return $user;
    }

    public function activate()
    {
        $this->update([
            'is_active'         => 1,
            'is_confirm'        => 1,
            'datetime_activate' => gmdate('YmdHis'),
        ]);
    }

    /**
     * @param string $password некодированный пароль
     *
     * @return bool
     */
    public function setPassword($password)
    {
        return $this->update([
            'password' => self::hashPassword($password)
        ]);
    }

    /**
     * Устанавливает новый аватар
     * Картинка должна быть квадратной
     * Размер 300х300
     *
     * @param string $content   содержимое файла аватара
     * @param string $extension расширение файла
     *
     * @return \cs\services\SitePath
     */
    public function setAvatarAsContent($content, $extension)
    {
        $path = UploadFolderDispatcher::createFolder('FileUpload2', self::TABLE, $this->getId());
        $p = $path->getPathFull();
        $p = $p . '/../../../../';
        $path->addAndCreate('small');
        $path->add('avatar.' . $extension);

        file_put_contents($path->getPathFull(), $content);
        $this->update([
            'avatar' => $path->getPath(),
        ]);

        return $path;
    }

    /**
     * Устанавливает новый аватар из адреса интернет
     *
     * @param string $url       полный url на картинку, может быть прямоугольной
     * @param string $extension расширение которое должно быть в результируеющем файле
     *
     * @return \cs\services\SitePath
     */
    public function setAvatarFromUrl($url, $extension = null)
    {
        if (is_null($extension)) {
            $info = parse_url($url);
            $pathinfo = pathinfo($info['path']);
            $extension = $pathinfo['extension'];
        }
        \Yii::info(\yii\helpers\VarDumper::dumpAsString($url), 'gs\\user');
        $image = new Image();
        $imageFileName = \Yii::getAlias('@runtime/temp_images');
        FileHelper::createDirectory($imageFileName);
        $imageFileName .= DIRECTORY_SEPARATOR . time() . '_' . Security::generateRandomString(10) . '.' . $extension;
        \Yii::info(\yii\helpers\VarDumper::dumpAsString($imageFileName), 'gs\\user');

        $image = $image->getImagine()->load(file_get_contents($url));
        $image = $this->expandImage($image, 300, 300, ManipulatorInterface::THUMBNAIL_OUTBOUND);
        $image->thumbnail(new Box(300, 300), ManipulatorInterface::THUMBNAIL_OUTBOUND)->save($imageFileName, ['format' => 'jpg', 'quality' => 100]);

        return $this->setAvatarAsContent(file_get_contents($imageFileName), $extension);
    }

    /**
     * Расширяет маленькую картинку по заданной стратегии
     *
     * @param \Imagine\Image\ImageInterface $image
     * @param int $widthFormat
     * @param int $heightFormat
     * @param int $mode
     *
     * @return \Imagine\Image\ImageInterface
     */
    protected static function expandImage($image, $widthFormat, $heightFormat, $mode)
    {
        $size = $image->getSize();
        $width = $size->getWidth();
        $height = $size->getHeight();
        if ($width < $widthFormat || $height < $heightFormat) {
            // расширяю картинку
            if ($mode == ManipulatorInterface::THUMBNAIL_OUTBOUND) {
                if ($width < $widthFormat && $height >= $heightFormat) {
                    $size = $size->widen($widthFormat);
                } else if ($width >= $widthFormat && $height < $heightFormat) {
                    $size = $size->heighten($heightFormat);
                } else if ($width < $widthFormat && $height < $heightFormat) {
                    // определяю как расширять по ширине или по высоте
                    if ($width / $widthFormat < $height / $heightFormat) {
                        $size = $size->widen($widthFormat);
                    }
                    else {
                        $size = $size->heighten($heightFormat);
                    }
                }
                $image->resize($size);
            } else {
                if ($width < $widthFormat && $height >= $heightFormat) {
                    $size = $size->heighten($heightFormat);
                } else if ($width >= $widthFormat && $height < $heightFormat) {
                    $size = $size->widen($widthFormat);
                } else if ($width < $widthFormat && $height < $heightFormat) {
                    // определяю как расширять по ширине или по высоте
                    if ($width / $widthFormat < $height / $heightFormat) {
                        $size = $size->heighten($heightFormat);
                    }
                    else {
                        $size = $size->widen($widthFormat);
                    }
                }
                $image->resize($size);
            }
        }

        return $image;
    }

    /**
     * Возвращает аватар
     * Если не установлен то возвращает заглушку
     *
     * @return string
     */
    public function getAvatar($isFullPath = false)
    {
        return '/images/iam.png';
//        $avatar = $this->getField('avatar');
//        if ($avatar.'' == '') {
//            return '/images/iam.png';
//        }
//
//        return Url::to($avatar, $isFullPath);
    }

    /**
     * Имеет ли профиль аватар?
     *
     * @return bool
     * true - имеет
     * false - не имеет
     */
    public function hasAvatar()
    {
        return ($this->getField('avatar').'' != '');
    }

    /**
     * Возвращает почту
     *
     * @return string
     */
    public function getEmail()
    {
        return $this->getString('email');
    }

    /**
     * Возвращает значение из $this->fields, если значение = null то возвращается пустая строка
     *
     * @param $name
     *
     * @return mixed
     */
    public function getString($name)
    {
        return ArrayHelper::getValue($this->fields, $name, '');
    }

    /**
     * Пользователь админ?
     *
     * @return bool
     */
    public function isAdmin()
    {
        return $this->getField('is_admin', 0) == 1;
    }
}
