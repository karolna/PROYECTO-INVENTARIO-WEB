<?php

use Illuminate\Database\Seeder;
use Caffeinated\Shinobi\Models\Permission;

class PermissionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         //Users
         Permission::create([
            'name'          => 'Navegar usuarios',
            'slug'          => 'users.index',
            'description'   => 'Lista y navega todos los usuarios del sistema',
        ]);

        Permission::create([
            'name'          => 'Creación de usuarios',
            'slug'          => 'users.create',
            'description'   => 'Podría crear nuevos usuarios en el sistema',
        ]);

        Permission::create([
            'name'          => 'Ver detalle de usuario',
            'slug'          => 'users.show',
            'description'   => 'Ve en detalle cada usuario del sistema',
        ]);

        Permission::create([
            'name'          => 'Edición de usuarios',
            'slug'          => 'users.edit',
            'description'   => 'Podría editar cualquier dato de un usuario del sistema',
        ]);

        Permission::create([
            'name'          => 'Eliminar usuario',
            'slug'          => 'users.destroy',
            'description'   => 'Podría eliminar cualquier usuario del sistema',
        ]);

        //Roles
        Permission::create([
            'name'          => 'Navegar roles',
            'slug'          => 'roles.index',
            'description'   => 'Lista y navega todos los roles del sistema',
        ]);

        Permission::create([
            'name'          => 'Ver detalle de un rol',
            'slug'          => 'roles.show',
            'description'   => 'Ve en detalle cada rol del sistema',
        ]);

        Permission::create([
            'name'          => 'Creación de roles',
            'slug'          => 'roles.create',
            'description'   => 'Podría crear nuevos roles en el sistema',
        ]);

        Permission::create([
            'name'          => 'Edición de roles',
            'slug'          => 'roles.edit',
            'description'   => 'Podría editar cualquier dato de un rol del sistema',
        ]);

        Permission::create([
            'name'          => 'Eliminar roles',
            'slug'          => 'roles.destroy',
            'description'   => 'Podría eliminar cualquier rol del sistema',
        ]);



        Permission::create([
            'name'=>'Navegar categorías',
            'slug'=>'categories.index',
            'description'=>'Lista y navega por todos los categorías del sistema.',
        ]);
        Permission::deleteUpdate([
            'name'=>'Eliminar categorías',
            'slug'=>'categories.delete',
            'description'=>'Elimina categorias de productos.',
        ]);
        Permission::create([
            'name'=>'Ver detalle de categoría',
            'slug'=>'categories.show',
            'description'=>'Ver en detalle cada categoría del sistema.',
        ]);
        Permission::create([
            'name'=>'Edición de categorías',
            'slug'=>'categories.edit',
            'description'=>'Editar cualquier dato de un categoría del sistema.',
        ]);
        Permission::create([
            'name'=>'Creación de categorías',
            'slug'=>'categories.create',
            'description'=>'Crea cualquier dato de una categoría del sistema.',
        ]);
        Permission::create([
            'name'=>'Eliminar categorías',
            'slug'=>'categories.destroy',
            'description'=>'Eliminar cualquier dato de una categoría del sistema.',
        ]);


        Permission::create([
            'name'=>'Navegar por clientes',
            'slug'=>'clients.index',
            'description'=>'Lista y navega por todos los clientes del sistema.',
        ]);
        Permission::create([
            'name'=>'Ver detalle de cliente',
            'slug'=>'clients.show',
            'description'=>'Ver en detalle cada cliente del sistema.',
        ]);
        Permission::create([
            'name'=>'Edición de clientes',
            'slug'=>'clients.edit',
            'description'=>'Editar cualquier dato de un cliente del sistema.',
        ]);
        Permission::create([
            'name'=>'Creación de clientes',
            'slug'=>'clients.create',
            'description'=>'Crea cualquier dato de un cliente del sistema.',
        ]);
        Permission::create([
            'name'=>'Eliminar clientes',
            'slug'=>'clients.destroy',
            'description'=>'Eliminar cualquier dato de un cliente del sistema.',
        ]);



        Permission::create([
            'name'=>'Navegar por productos',
            'slug'=>'products.index',
            'description'=>'Lista y navega por todos los productos del sistema.',
        ]);
        Permission::create([
            'name'=>'Ver detalle de producto',
            'slug'=>'products.show',
            'description'=>'Ver en detalle cada producto del sistema.',
        ]);
        Permission::create([
            'name'=>'Edición de productos',
            'slug'=>'products.edit',
            'description'=>'Editar cualquier dato de un producto del sistema.',
        ]);
        Permission::create([
            'name'=>'Creación de productos',
            'slug'=>'products.create',
            'description'=>'Crea cualquier dato de un producto del sistema.',
        ]);
        Permission::create([
            'name'=>'Eliminar productos',
            'slug'=>'products.destroy',
            'description'=>'Eliminar cualquier dato de un producto del sistema.',
        ]);



        Permission::create([
            'name'=>'Navegar por proveedores',
            'slug'=>'providers.index',
            'description'=>'Lista y navega por todos los proveedores del sistema.',
        ]);
        Permission::create([
            'name'=>'Ver detalle de proveedor',
            'slug'=>'providers.show',
            'description'=>'Ver en detalle cada proveedor del sistema.',
        ]);
        Permission::create([
            'name'=>'Edición de proveedores',
            'slug'=>'providers.edit',
            'description'=>'Editar cualquier dato de un proveedor del sistema.',
        ]);
        Permission::create([
            'name'=>'Creación de proveedores',
            'slug'=>'providers.create',
            'description'=>'Crea cualquier dato de un proveedor del sistema.',
        ]);
        Permission::create([
            'name'=>'Eliminar proveedores',
            'slug'=>'providers.destroy',
            'description'=>'Eliminar cualquier dato de un proveedor del sistema.',
        ]);


        Permission::create([
            'name'=>'Navegar por entrada de inventario',
            'slug'=>'purchases.index',
            'description'=>'Lista y navega por todas las entradas de inventario del sistema.',
        ]);
        Permission::create([
            'name'=>'Ver detalle de entrada de inventario',
            'slug'=>'purchases.show',
            'description'=>'Ver en detalle cada entrada de inventario del sistema.',
        ]);
        Permission::create([
            'name'=>'Creación de entrada de inventario',
            'slug'=>'purchases.create',
            'description'=>'Crea cualquier dato de una o varias entradas de inventario en el sistema.',
        ]);


        Permission::create([
            'name'=>'Navegar por ventas',
            'slug'=>'sales.index',
            'description'=>'Lista y navega por todos los ventas del sistema.',
        ]);
        Permission::create([
            'name'=>'Ver detalle de venta',
            'slug'=>'sales.show',
            'description'=>'Ver en detalle cada venta del sistema.',
        ]);
        Permission::create([
            'name'=>'Creación de ventas',
            'slug'=>'sales.create',
            'description'=>'Crea cualquier dato de un venta del sistema.',
        ]);


        Permission::create([
            'name'=>'Descargar PDF reporte de entrada de inventario',
            'slug'=>'purchases.pdf',
            'description'=>'Puede descargar todos los reportes de la entrada de inventario en PDF.',
        ]);


        Permission::create([
            'name'=>'Descargar PDF reporte de salida de inventario',
            'slug'=>'sales.pdf',
            'description'=>'Puede descargar todos los reportes de la salida de inventario en PDF.',
        ]);

        Permission::create([
            'name'=>'Imprimir boleta de venta',
            'slug'=>'sales.print',
            'description'=>'Puede imprimir boletas de todas las ventas.',
        ]);



        Permission::create([
            'name'=>'Ver datos de la empresa',
            'slug'=>'business.index',
            'description'=>'Navega por los datos de la empresa.',
        ]);
        Permission::create([
            'name'=>'Edición de empresa',
            'slug'=>'business.edit',
            'description'=>'Editar cualquier dato de la empresa.',
        ]);

        Permission::create([
            'name'=>'er datos de la impresora',
            'slug'=>'printers.index',
            'description'=>'Navega por los datos de la impresora.',
        ]);
        Permission::create([
            'name'=>'Edición de impresora',
            'slug'=>'printers.edit',
            'description'=>'Editar cualquier dato de la impresora.',
        ]);

        Permission::create([
            'name'=>'Subir archivo de entrada de inventario',
            'slug'=>'upload.purchases',
            'description'=>'Puede subir comprobantes de una entrada de inventario.',
        ]);

        Permission::create([
            'name'=>'Cambiar estado de producto',
            'slug'=>'change.status.products',
            'description'=>'Permite cambiar el estado de un producto.',
        ]);

        Permission::create([
            'name'=>'Cambiar estado de entrada de inventario',
            'slug'=>'change.status.purchases',
            'description'=>'Permite cambiar el estado de un entrada de inventario.',
        ]);

        Permission::create([
            'name'=>'Cambiar estado de salida de inventario',
            'slug'=>'change.status.sales',
            'description'=>'Permite cambiar el estado de un salida de inventario.',
        ]);


        Permission::create([
            'name'=>'Reporte por día',
            'slug'=>'reports.day',
            'description'=>'Permite ver los reportes de salida de inventario por día.',
        ]);
        Permission::create([
            'name'=>'Reporte por fechas',
            'slug'=>'reports.date',
            'description'=>'Permite ver los reportes por un rango de fechas de la salida de inventario.',
        ]);
        Permission::create([
            'name'=>'Reporte por fechas',
            'slug'=>'index.date',
            'description'=>'Permite ver los reportes por un rango de fechas de la salida de inventario.',
        ]);
        Permission::create([
            'name'=>'Reporte por día',
            'slug'=>'index.day',
            'description'=>'Permite ver los reportes de salida de inventario por día.',
        ]);

    }
}
