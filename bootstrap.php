<?php
sessionStart();

use App\Core\{App, Request, Router};

use Database\Migrations\{
    CreateAddressessTable,
    CreateUsersTable,
    CreateCartsTable,
    CreateCategoriesTable,
    CreateCategoryProductTable,
    CreateOrdersTable,
    CreatePaymentsTable,
    CreateProductsTable,
    createSubCategoryTable
};

App::bind('config', require 'config.php');

CreateUsersTable::users();
CreateProductsTable::products();
CreateCategoriesTable::categoriesTable();
CreateCategoryProductTable::categoryProdTable();
createSubCategoryTable::createSubCategory();
CreateCartsTable::carts();
CreateAddressessTable::addresses();
CreateOrdersTable::orders();
CreatePaymentsTable::payments();

Router::load('routes.php')
    ->handle(Request::uri(), Request::method());




