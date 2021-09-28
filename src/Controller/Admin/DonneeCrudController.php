<?php

namespace App\Controller\Admin;

use App\Entity\Donnee;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class DonneeCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Donnee::class;
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
