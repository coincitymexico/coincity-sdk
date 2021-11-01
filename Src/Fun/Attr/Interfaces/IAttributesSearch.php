<?php
/**
 * Created by (c)danidoble 2021.
 * @author danidoble <danidoble | ddanidoble@gmail.com>
 * @website https://github.com/danidoble
 * @website https://danidoble.com
 */

namespace Coincity\SDK\Fun\Attr\Interfaces;

interface IAttributesSearch
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
     * @return int|null
     */
    public function getUserId(): ?int;

    /**
     * @param int|null $user_id
     */
    public function setUserId(?int $user_id): void;

    /**
     * @return string
     */
    public function getSearched(): string;

    /**
     * @param string $searched
     */
    public function setSearched(string $searched): void;

    /**
     * @return int
     */
    public function getTimes(): int;

    /**
     * @param int $times
     */
    public function setTimes(int $times): void;

    /**
     * @return string
     */
    public function getLastDate(): string;

    /**
     * @param string $last_date
     */
    public function setLastDate(string $last_date): void;
}