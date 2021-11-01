<?php
/**
 * Created by (c)danidoble 2021.
 * @author danidoble <danidoble | ddanidoble@gmail.com>
 * @website https://github.com/danidoble
 * @website https://danidoble.com
 */

namespace Coincity\SDK\Fun\Attr\Interfaces;

interface IAttributesStockMovement
{
    /**
     * @return int
     */
    public function getId(): int;

    /**
     * @param int $id
     */
    public function setId(int $id): void;

    /**
     * @return string
     */
    public function getCveSae(): string;

    /**
     * @param string $cve_sae
     */
    public function setCveSae(string $cve_sae): void;

    /**
     * @return int|null
     */
    public function getIdStock(): ?int;

    /**
     * @param int|null $id_stock
     */
    public function setIdStock(?int $id_stock): void;

    /**
     * @return int|null
     */
    public function getIdProduct(): ?int;

    /**
     * @param int|null $id_product
     */
    public function setIdProduct(?int $id_product): void;

    /**
     * @return int|null
     */
    public function getIdVariant(): ?int;

    /**
     * @param int|null $id_variant
     */
    public function setIdVariant(?int $id_variant): void;

    /**
     * @return int
     */
    public function getNewStock(): int;

    /**
     * @param int $new_stock
     */
    public function setNewStock(int $new_stock): void;
}