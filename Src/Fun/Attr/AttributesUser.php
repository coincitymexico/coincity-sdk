<?php
/**
 * Created by (c)danidoble 2021.
 * @author danidoble <danidoble | ddanidoble@gmail.com>
 * @website https://github.com/danidoble
 * @website https://danidoble.com
 */

namespace Coincity\SDK\Fun\Attr;

class AttributesUser
{
    public string $nombre;
    public string $apellido;
    public string $email;

    public ?string $empresa = null;
    public ?string $email_alternativo = null;
    protected ?string $password = null;
    protected ?string $password_confirm = null;
    public ?string $telefono = null;
    public ?string $movil = null;
    public ?string $rfc = null;
    public ?string $razon_social = null;
    public ?int $id_vendedor = null;
    public ?int $id_imagen = null;
    public ?string $permisos = null;
    public ?string $profile_photo_path = null;

    public int $tipo = 11;
    public const ref = 146;
    public int $status = 0;
    //public float $descuento = 0.0;

    public function __set($name, $value)
    {
        $this->{$name} = $value;
    }
}