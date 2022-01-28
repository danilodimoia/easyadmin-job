<?php

namespace App\Controller\Admin;

use App\Entity\Documentation;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class DocumentationCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Documentation::class;
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
