<?php


class Commentary
{

    private int $id;
    private string $commentary='';

    private int $userId;

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
    public function getCommentary(): string
    {
        return $this->commentary;
    }

    /**
     * @param string $commentary
     */
    public function setCommentary(string $commentary): void
    {
        $this->commentary = $commentary;
    }

    /**
     * @return int
     */
    public function getUserId(): int
    {
        return $this->userId;
    }

    /**
     * @param int $userId
     */
    public function setUserId(int $userId): void
    {
        $this->userId = $userId;
    }



}