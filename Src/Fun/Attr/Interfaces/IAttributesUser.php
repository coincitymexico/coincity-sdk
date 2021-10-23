<?php
/**
 * Created by (c)danidoble 2021.
 * @author danidoble <danidoble | ddanidoble@gmail.com>
 * @website https://github.com/danidoble
 * @website https://danidoble.com
 */

namespace Coincity\SDK\Fun\Attr\Interfaces;

interface IAttributesUser
{
    /**
     * @return string
     */
    public function getId(): string;

    /**
     * @param string $id
     */
    public function setId(string $id): void;

    /**
     * @return string
     */
    public function getName(): string;

    /**
     * @param string $name
     */
    public function setName(string $name): void;

    /**
     * @return string
     */
    public function getLastName(): string;

    /**
     * @param string $last_name
     */
    public function setLastName(string $last_name): void;

    /**
     * @return string
     */
    public function getEmail(): string;

    /**
     * @param string $email
     */
    public function setEmail(string $email): void;

    /**
     * @return string|null
     */
    public function getCompany(): ?string;

    /**
     * @param string|null $company
     */
    public function setCompany(?string $company): void;

    /**
     * @return string|null
     */
    public function getEmailAlternative(): ?string;

    /**
     * @param string|null $email_alternative
     */
    public function setEmailAlternative(?string $email_alternative): void;

    /**
     * @return string|null
     */
    public function getPassword(): ?string;

    /**
     * @param string|null $password
     */
    public function setPassword(?string $password): void;

    /**
     * @return string|null
     */
    public function getPasswordConfirm(): ?string;

    /**
     * @param string|null $password_confirm
     */
    public function setPasswordConfirm(?string $password_confirm): void;

    /**
     * @return string|null
     */
    public function getPhone(): ?string;

    /**
     * @param string|null $phone
     */
    public function setPhone(?string $phone): void;

    /**
     * @return string|null
     */
    public function getMobile(): ?string;

    /**
     * @param string|null $mobile
     */
    public function setMobile(?string $mobile): void;

    /**
     * @return string|null
     */
    public function getRfc(): ?string;

    /**
     * @param string|null $rfc
     */
    public function setRfc(?string $rfc): void;

    /**
     * @return string|null
     */
    public function getSocialReason(): ?string;

    /**
     * @param string|null $social_reason
     */
    public function setSocialReason(?string $social_reason): void;

    /**
     * @return int|null
     */
    public function getIdSeller(): ?int;

    /**
     * @param int|null $id_seller
     */
    public function setIdSeller(?int $id_seller): void;

    /**
     * @deprecated don't use
     * @return int|null
     */
    public function getIdImage(): ?int;

    /**
     * @deprecated don't use
     * @param int|null $id_image
     */
    public function setIdImage(?int $id_image): void;

    /**
     * @return string|null
     */
    public function getPermissions(): ?string;

    /**
     * @param string|null $permissions
     */
    public function setPermissions(?string $permissions): void;

    /**
     * @return string|null
     */
    public function getProfilePhotoPath(): ?string;

    /**
     * @param string|null $profile_photo_path
     */
    public function setProfilePhotoPath(?string $profile_photo_path): void;

    /**
     * @return int
     */
    public function getUserType(): int;

    /**
     * @param int $user_type
     */
    public function setUserType(int $user_type): void;

    /**
     * @return int
     */
    public function getStatus(): int;

    /**
     * @param int $status
     */
    public function setStatus(int $status): void;

    /**
     * @return array|string[]
     */
    public function getProtected(): array;

    /**
     * @param array|string[] $protected
     */
    public function setProtected(array $protected): void;

}