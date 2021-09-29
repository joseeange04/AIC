<?php

namespace App\Controller\Admin;

use App\Entity\Donnee;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\ArrayField;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IntegerField;
use EasyCorp\Bundle\EasyAdminBundle\Field\NumberField;
use EasyCorp\Bundle\EasyAdminBundle\Field\UrlField;

class DonneeCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Donnee::class;
    }


    public function configureFields(string $pageName): iterable
    {

            yield IdField::new('id')
                ->hideOnForm()
            ;
            yield TextField::new('type');
            yield AssociationField::new('region');
            yield UrlField::new('pieceJointe');
            // yield NumberField::new('temperature');
            // yield NumberField::new('precipitation');
            // yield ArrayField::new('sol');


            
    }

}
