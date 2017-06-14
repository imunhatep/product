<?php
namespace Product\Repository;

use Product\Entity\Category;

class CategoryRepository
{
    private $categories;

    function getAll(): array
    {
        return $this->categories;
    }

    function find(int $id): Category
    {
        if(!array_key_exists($id, $this->categories)){
            throw new \InvalidArgumentException('Category with given id does not exist');
        }

        return $this->categories[$id];
    }

    function create(Category $category)
    {
        $id = count($this->categories);

        $category->setId($id);

        $this->categories[$id] = $category;

        return $this;
    }

    function delete(Category $category)
    {
        unset($this->categories[$category->getId()]);
    }
}
