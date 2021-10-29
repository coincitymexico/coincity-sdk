<?php
/**
 * Created by (c)danidoble 2021.
 * @author danidoble <danidoble | ddanidoble@gmail.com>
 * @website https://github.com/danidoble
 * @website https://danidoble.com
 */

namespace Coincity\SDK\Fun\Attr;

use Coincity\SDK\Fun\Abstracts\AParser;
use Coincity\SDK\Fun\Attr\Interfaces\IAttributesUser;
use Coincity\SDK\Fun\Interfaces\IParser;
use Coincity\SDK\Fun\Traits\MagicMethods;
use Coincity\SDK\Fun\Traits\Parser;

class AttributesUser extends AParser implements IAttributesUser, IParser
{
    use MagicMethods, Parser;

    /**
     * @var array|string[]
     */
    private array $protected = [
        'password',
        'password_confirm',
    ];
    /**
     * @var array|string[]
     */
    private array $public = [
        'id',
        'name',
        'last_name',
        'email',
        'company',
        'email_alternative',
        'password',
        'password_confirm',
        'phone',
        'mobile',
        'rfc',
        'social_reason',
        'id_seller',
        'id_image',
        'permissions',
        'profile_photo_path',
        'user_type',
        'status',
        'restore_this',
    ];
    /**
     * @var array|string[]
     */
    private array $_real_name = [
        'id' => 'id_usuario',
        'name' => 'nombre',
        'last_name' => 'apellido',
        'email' => 'email',
        'company' => 'empresa',
        'email_alternative' => 'email_alternativo',
        'password' => 'password',
        'password_confirm' => 'password_confirm',
        'phone' => 'telefono',
        'mobile' => 'movil',
        'rfc' => 'rfc',
        'social_reason' => 'razon_social',
        'id_seller' => 'id_vendedor',
        'id_image' => 'id_imagen',
        'permissions' => 'permisos',
        'profile_photo_path' => 'profile_photo_path',
        'user_type' => 'tipo',
        'status' => 'status',
        'restore_this' => 'restore_this',
    ];

    private array $_append_const = [
        "ref"
    ];
    public array $_def_val = [
        //"user_type"=>11,
        "tipo" => 11,
        "ref" => 146,
        "status" => 0,
    ];

    /**
     * Identifier of user, don't assign if it's new user
     * @var int
     */
    protected int $id;
    /**
     * Name of client/user
     * @var string
     */
    protected string $name; //nombre
    /**
     * Last name of client/user
     * @var string
     */
    protected string $last_name; //apellido
    /**
     * Email unique for each client/user
     * @var string
     */
    protected string $email;
    /**
     * Company of client/user
     * @var string|null
     */
    protected ?string $company = null; //empresa
    /**
     * Alternative email of client/user
     * @var string|null
     */
    protected ?string $email_alternative = null; //email_alternativo
    /**
     * Password without encryption
     * @var string|null
     */
    protected ?string $password = null;
    /**
     * Confirmation of password without encryption
     * @var string|null
     */
    protected ?string $password_confirm = null;
    /**
     * Phone of client/user
     * @var string|null
     */
    protected ?string $phone = null; //telefono
    /**
     * Mobile phone of client/user
     * @var string|null
     */
    protected ?string $mobile = null; //movil
    /**
     * RFC of company/client
     * @see https://es.wikipedia.org/wiki/Registro_Federal_de_Contribuyentes
     * @var string|null
     */
    protected ?string $rfc = null;
    /**
     * Name of company or person who this client represent
     * @var string|null
     */
    protected ?string $social_reason = null; //razon_social
    /**
     * Identifier of seller, use only if a seller register an user
     * @var int|null
     */
    protected ?int $id_seller = null; //id_vendedor
    /**
     * Identifier of image of user
     * @deprecated No longer used in the new view v1^
     * @var int|null
     */
    protected ?int $id_image = null; //id_imagen
    /**
     * Permissions of client/user for the dashboard
     * @var string|null
     */
    protected ?string $permissions = null; //permisos
    /**
     * Image, This can be a URL or if user upload an image into dashboard can be a path
     * @var string|null
     */
    protected ?string $profile_photo_path = null;
    /**
     * Type of user, don't modify if the user it's a client
     * @var int|null
     */
    protected ?int $user_type = null; //tipo -> 11
    /**
     * Constant of origin of register, if it's an update this is ignored
     * @var int|null
     */
    private ?int $ref = null; //ref -> 146
    /**
     * Status of user, [0 = disabled] [1 = enabled]
     * @var int|null
     */
    protected ?int $status = null; // -> 0
    /**
     * @var bool|null
     */
    protected ?bool $restore_this = null;

//    /**
//     * Discount of user in all orders
//     * @var float
//     * @deprecated This never used and can do errors so not uncomment
//     */
//    protected float $descuento = 0.0;

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @param int $id
     */
    public function setId(int $id): void
    {
        $this->id = $id;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @param string $name
     */
    public function setName(string $name): void
    {
        $this->name = $name;
    }

    /**
     * @return string
     */
    public function getLastName(): string
    {
        return $this->last_name;
    }

    /**
     * @param string $last_name
     */
    public function setLastName(string $last_name): void
    {
        $this->last_name = $last_name;
    }

    /**
     * @return string
     */
    public function getEmail(): string
    {
        return $this->email;
    }

    /**
     * @param string $email
     */
    public function setEmail(string $email): void
    {
        $this->email = $email;
    }

    /**
     * @return string|null
     */
    public function getCompany(): ?string
    {
        return $this->company;
    }

    /**
     * @param string|null $company
     */
    public function setCompany(?string $company): void
    {
        $this->company = $company;
    }

    /**
     * @return string|null
     */
    public function getEmailAlternative(): ?string
    {
        return $this->email_alternative;
    }

    /**
     * @param string|null $email_alternative
     */
    public function setEmailAlternative(?string $email_alternative): void
    {
        $this->email_alternative = $email_alternative;
    }

    /**
     * @return string|null
     */
    public function getPassword(): ?string
    {
        return $this->password;
    }

    /**
     * @param string|null $password
     */
    public function setPassword(?string $password): void
    {
        $this->password = $password;
    }

    /**
     * @return string|null
     */
    public function getPasswordConfirm(): ?string
    {
        return $this->password_confirm;
    }

    /**
     * @param string|null $password_confirm
     */
    public function setPasswordConfirm(?string $password_confirm): void
    {
        $this->password_confirm = $password_confirm;
    }

    /**
     * @return string|null
     */
    public function getPhone(): ?string
    {
        return $this->phone;
    }

    /**
     * @param string|null $phone
     */
    public function setPhone(?string $phone): void
    {
        $this->phone = $phone;
    }

    /**
     * @return string|null
     */
    public function getMobile(): ?string
    {
        return $this->mobile;
    }

    /**
     * @param string|null $mobile
     */
    public function setMobile(?string $mobile): void
    {
        $this->mobile = $mobile;
    }

    /**
     * @return string|null
     */
    public function getRfc(): ?string
    {
        return $this->rfc;
    }

    /**
     * @param string|null $rfc
     */
    public function setRfc(?string $rfc): void
    {
        $this->rfc = $rfc;
    }

    /**
     * @return string|null
     */
    public function getSocialReason(): ?string
    {
        return $this->social_reason;
    }

    /**
     * @param string|null $social_reason
     */
    public function setSocialReason(?string $social_reason): void
    {
        $this->social_reason = $social_reason;
    }

    /**
     * @return int|null
     */
    public function getIdSeller(): ?int
    {
        return $this->id_seller;
    }

    /**
     * @param int|null $id_seller
     */
    public function setIdSeller(?int $id_seller): void
    {
        $this->id_seller = $id_seller;
    }

    /**
     * @return int|null
     * @deprecated don't use
     */
    public function getIdImage(): ?int
    {
        return $this->id_image;
    }

    /**
     * @param int|null $id_image
     * @deprecated don't use
     */
    public function setIdImage(?int $id_image): void
    {
        $this->id_image = $id_image;
    }

    /**
     * @return string|null
     */
    public function getPermissions(): ?string
    {
        return $this->permissions;
    }

    /**
     * @param string|null $permissions
     */
    public function setPermissions(?string $permissions): void
    {
        $this->permissions = $permissions;
    }

    /**
     * @return string|null
     */
    public function getProfilePhotoPath(): ?string
    {
        return $this->profile_photo_path;
    }

    /**
     * @param string|null $profile_photo_path
     */
    public function setProfilePhotoPath(?string $profile_photo_path): void
    {
        $this->profile_photo_path = $profile_photo_path;
    }

    /**
     * @return int
     */
    public function getUserType(): int
    {
        return $this->user_type;
    }

    /**
     * @param int $user_type
     */
    public function setUserType(int $user_type): void
    {
        $this->user_type = $user_type;
    }

    /**
     * @return int
     */
    public function getStatus(): int
    {
        return $this->status;
    }

    /**
     * @param int $status
     */
    public function setStatus(int $status): void
    {
        $this->status = $status;
    }

    /**
     * @return array|string[]
     */
    public function getProtected(): array
    {
        return $this->protected;
    }

    /**
     * @param array|string[] $protected
     */
    public function setProtected(array $protected): void
    {
        $this->protected = $protected;
    }

    public function getRestoreThis(): ?bool
    {
        return $this->restore_this;
    }

    public function setRestoreThis(?bool $restore_this): void
    {
        $this->restore_this = $restore_this;
    }

    /**
     * @return array|string[]
     */
    public function getNamesArray(): array
    {
        return $this->_real_name;
    }
}