<?php


class News
{
    public int $id;
    public int $categoryId;
    public string $title;
    public string $description;
    public string $createDate;
    public ?string $image;
    public bool $pinnedToHomePage;
}