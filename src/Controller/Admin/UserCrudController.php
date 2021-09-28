<?php

namespace App\Controller\Admin;

use App\Entity\User;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\EmailField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TelephoneField;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;

class UserCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return User::class;
    }


    public function configureFields(string $pageName): iterable
    {
        // return [
        //     IdField::new('id'),
        //     TextField::new('nom'),
        //     TextEditorField::new('description'),
        // ];
        yield IdField::new('id')
            ->hideOnForm()
        ;
        yield TextField::new('nom');
        yield TextField::new('prenom');
        yield AssociationField::new('region');
        yield EmailField::new('email');
        yield TelephoneField::new('telephone');
        yield TextField::new('password')->setFormType(PasswordType::class);
    }

}
