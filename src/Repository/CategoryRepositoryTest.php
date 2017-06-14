<?php
namespace Product\Repository;

use Product\Entity\Category;

class CategoryRepositoryTest extends CategoryRepository
{
    function __construct()
    {
        $this->create(
            (new Category)
                ->setName('Category 1')
                ->setTitle('Cool category')
        );

        $this->create(
            (new Category)
                ->setName('Category 2')
                ->setTitle('Cool category')
        );

        $this->create(
            (new Category)
                ->setName('Category 3')
                ->setTitle('Cool category')
        );
    }
}
