<?php
/**
 * Created by (c)danidoble 2021.
 * @author danidoble <danidoble | ddanidoble@gmail.com>
 * @website https://github.com/danidoble
 * @website https://danidoble.com
 */

namespace Coincity\SDK\Fun\Attr\Interfaces;

interface IAttributesStockSync
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
    public function getDown(): int;

    /**
     * @param int $down
     */
    public function setDown(int $down): void;

    /**
     * @return int
     */
    public function getUp(): int;

    /**
     * @param int $up
     */
    public function setUp(int $up): void;

    /**
     * @return array|string[]
     */
    public function getProtected(): array;

    /**
     * @param array|string[] $protected
     */
    public function setProtected(array $protected): void;

    /**
     * @return array|string[]
     */
    public function getNamesArray(): array;
}