<?php
/**
 * Created by (c)danidoble 2021.
 * @author danidoble <danidoble | ddanidoble@gmail.com>
 * @website https://github.com/danidoble
 * @website https://danidoble.com
 */

namespace Coincity\SDK\Fun\Attr\Interfaces;

interface IAttributesStock
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
     * @return int
     */
    public function getMin(): int;

    /**
     * @param int $min
     */
    public function setMin(int $min): void;

    /**
     * @return int
     */
    public function getMax(): int;

    /**
     * @param int $max
     */
    public function setMax(int $max): void;

    /**
     * @return int
     */
    public function getStock(): int;

    /**
     * @param int $stock
     */
    public function setStock(int $stock): void;

    /**
     * @return int
     */
    public function getIsDecremental(): int;

    /**
     * @param int $is_decremental
     */
    public function setIsDecremental(int $is_decremental): void;
}