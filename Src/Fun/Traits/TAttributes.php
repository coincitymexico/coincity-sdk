<?php
/**
 * Created by (c)danidoble 2021.
 * @author danidoble <danidoble | ddanidoble@gmail.com>
 * @website https://github.com/danidoble
 * @website https://danidoble.com
 */

namespace Coincity\SDK\Fun\Traits;
trait TAttributes
{
    /**
     * @var bool|null
     */
    protected ?bool $restore_this = null;

    /**
     * @return array
     */
    public function getProtected(): array
    {
        return $this->protected;
    }

    /**
     * @param array $protected
     */
    public function setProtected(array $protected): void
    {
        $this->protected = $protected;
    }

    /**
     * @return bool|null
     */
    public function getRestoreThis(): ?bool
    {
        return $this->restore_this;
    }

    /**
     * @param bool|null $restore_this
     */
    public function setRestoreThis(?bool $restore_this): void
    {
        $this->restore_this = $restore_this;
    }

    /**
     * @return array
     */
    public function getNamesArray(): array
    {
        return $this->_real_name;
    }
}