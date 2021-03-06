<?php

namespace App\Controller\Admin;

use App\Entity\Product;
use App\Field\VichImageField;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\Field;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IntegerField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use Symfony\Config\VichUploaderConfig;
use Vich\UploaderBundle\VichUploaderBundle as Vich;

class ProductCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Product::class;
    }


    public function configureFields(string $pageName): iterable
    {
//        return [
//            IdField::new('id'),
//            TextField::new('title'),
//            TextEditorField::new('description'),
//        ];
        yield AssociationField::new('category', 'product.category');
        yield TextField::new('name', 'product.name');
        yield IntegerField::new('price', 'product.price');
        yield TextEditorField::new('description', 'product.description');
        yield VichImageField::new('thumbnailFile')->onlyOnForms();
        yield ImageField::new('thumbnail', 'product.thumbnail')->hideOnForm()->setBasePath('/uploads/files');
    }

}
