<?php

namespace App\Controller\Admin;

use App\Entity\CO;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class COCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return CO::class;
    }

    /*
    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id'),
            TextField::new('title'),
            TextEditorField::new('description'),
        ];
    }
    */
}
