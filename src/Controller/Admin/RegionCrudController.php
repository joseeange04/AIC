<?php

namespace App\Controller\Admin;

use App\Entity\Region;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\IntegerField;

class RegionCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Region::class;
    }


    public function configureFields(string $pageName): iterable
    {
        // return [
        //     IdField::new('id'),
        //     TextField::new('title'),
        //     TextEditorField::new('description'),
        // ];
        yield IdField::new('id')
            ->hideOnForm()
        ;
        yield TextField::new('nom');
        yield IntegerField::new('population');
    }
}
