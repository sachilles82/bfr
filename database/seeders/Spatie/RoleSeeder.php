<?php

namespace Database\Seeders\Spatie;

use App\Enums\Role\RoleHasAccessTo;
use App\Enums\Role\UserRole;
use App\Enums\Role\RoleVisibility;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RoleSeeder extends Seeder
{
    /**
     * Jeder User hat 2 Rolen. Eine zbsp. Employee, damit er überhaupt im Employee Panel landet und das nötigste sieht,
     * die Zweite Role hat dann ausgewählte Permissions
     */

    /** Erstelle eine Super Admin Role und füge ihr alle verfügbaren Permission hinzu */
    public function run(): void
    {
        $superAdmin = Role::create([
            'name' => UserRole::SuperAdmin,
            'created_by' => 1,
            'visible' => RoleVisibility::HiddenInNova,
            'access' => RoleHasAccessTo::AdminPanel,
            'description' => __('Super Admin mit allen Berechtigungen')
        ]);

        /** Der Super Admin erhält alle Permissions */

        $permissions = Permission::pluck('id', 'id')->all();
        $superAdmin->syncPermissions($permissions);


//        /** Erstelle eine Admin Role */
//        Role::create([
//            'access' => RoleHasAccessTo::AdminPanel,
//            'name' => UserRole::Admin,
//            'created_by' => 1,
//            'visible' => RoleVisibility::HiddenInNova,
//            'description' => __('Admin Role als Standart für Admins damit sie sich in Nova anmelden können')
//        ]);

        Role::create([
            'access' => RoleHasAccessTo::AdminPanel,
            'name' => UserRole::Support,
            'created_by' => 1,
            'visible' => RoleVisibility::VisibleInNova,
            'description' => __('Support Team Role für Nova Admin User')
        ]);

        Role::create([
            'access' => RoleHasAccessTo::AdminPanel,
            'name' => UserRole::Marketing,
            'created_by' => 1,
            'visible' => RoleVisibility::VisibleInNova,
            'description' => __('Support Team Role für Nova Admin User')
        ]);

        Role::create([
            'access' => RoleHasAccessTo::AdminPanel,
            'name' => UserRole::Sales,
            'created_by' => 1,
            'visible' => RoleVisibility::VisibleInNova,
            'description' => __('Support Team Role für Nova Admin User')
        ]);


        /**
         * Owner Rolen  Start
         */
        /** Erstelle diese Owner Rolen */
        Role::create([
            'access' => RoleHasAccessTo::OwnerPanel,
            'name' => UserRole::Owner,
            'created_by' => 1,
            'visible' => RoleVisibility::Hidden,
            'description' => __('Default Owner Role with full Permissions for Owner Panel')
        ]);

        Role::create([
            'access' => RoleHasAccessTo::OwnerPanel,
            'name' => UserRole::Owner1,
            'created_by' => 1,
            'visible' => RoleVisibility::Hidden,
            'description' => __('Owner Role1 with limited Access to Owner Panel')
        ]);

        Role::create([
            'access' => RoleHasAccessTo::OwnerPanel,
            'name' => UserRole::Owner2,
            'created_by' => 1,
            'visible' => RoleVisibility::Hidden,
            'description' => __('Owner Role2 with limited Access to Owner Panel')
        ]);

        Role::create([
            'access' => RoleHasAccessTo::OwnerPanel,
            'name' => UserRole::Owner3,
            'created_by' => 1,
            'visible' => RoleVisibility::Hidden,
            'description' => __('Owner Role3 with limited Access to Owner Panel')
        ]);



        /**
         * Employee Rolen  Start
         */
        /** Erstelle diese Employee Rolen */
        Role::create([
            'name' => UserRole::Employee,
            'access' => RoleHasAccessTo::EmployeePanel,
            'visible' => RoleVisibility::Hidden,
            'description' => __('Default Employee Role for Employee Panel Access only'),
            'created_by' => 1
        ]);

        Role::create([
            'name' => UserRole::Worker,
            'access' => RoleHasAccessTo::EmployeePanel,
            'visible' => RoleVisibility::Visible,
            'description' => __('Worker_desc'),
            'created_by' => 1
        ]);

        Role::create([
            'name' => UserRole::Manager,
            'access' => RoleHasAccessTo::EmployeePanel,
            'visible' => RoleVisibility::Visible,
            'description' => __('Manager_desc'),
            'created_by' => 1
        ]);

        Role::create([
            'name' => UserRole::Editor,
            'access' => RoleHasAccessTo::EmployeePanel,
            'visible' => RoleVisibility::Visible,
            'description' => __('Editor_desc'),
            'created_by' => 1
        ]);

        Role::create([
            'name' => UserRole::Temporary,
            'access' => RoleHasAccessTo::EmployeePanel,
            'visible' => RoleVisibility::Visible,
            'description' => __('Temporary_desc'),
            'created_by' => 1
        ]);

        /** Employee Rolen  End*/


        /**
         *
         * Erstelle diese Partner Role
         */
        Role::create([
            'access' => RoleHasAccessTo::PartnerPanel,
            'name' => UserRole::Partner,
            'created_by' => 1,
            'visible' => RoleVisibility::Hidden,
            'description' => __('Partner_desc')
        ]);

        Role::create([
            'access' => RoleHasAccessTo::PartnerPanel,
            'name' => UserRole::Partner1, // Akkordant
            'created_by' => 1,
            'visible' => RoleVisibility::Visible,
            'description' => __('Pieceworker Role for Partner Panel Access')
        ]);

        Role::create([
            'access' => RoleHasAccessTo::PartnerPanel,
            'name' => UserRole::Partner2, // Subunternehmer
            'created_by' => 1,
            'visible' => RoleVisibility::Visible,
            'description' => __('Subcontractor Role for Partner Panel Access')
        ]);

        Role::create([
            'access' => RoleHasAccessTo::PartnerPanel,
            'name' => UserRole::Partner3,   // Lieferant
            'created_by' => 1,
            'visible' => RoleVisibility::Visible,
            'description' => __('Supplier Role for Partner Panel Access')
        ]);

        Role::create([
            'access' => RoleHasAccessTo::PartnerPanel,
            'name' => UserRole::Partner4,   // Auftraggeber
            'created_by' => 1,
            'visible' => RoleVisibility::Visible,
            'description' => __('Client Role for Partner Panel Access')
        ]);

        Role::create([
            'access' => RoleHasAccessTo::PartnerPanel,
            'name' => UserRole::Partner5,   // Bauherr
            'created_by' => 1,
            'visible' => RoleVisibility::Visible,
            'description' => __('Builder Role for Partner Panel Access')
        ]);

    }
}
