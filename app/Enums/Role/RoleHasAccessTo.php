<?php

namespace App\Enums\Role;

enum RoleHasAccessTo: string
{
    /**
     * Diese Enums werden in der Migrationstabelle von roles verwendet im Feld access (Zugang)
     *
     * * Anstatt das ich die Werte in der Datenbank direkt speichere, mache ich es mit Enums.
     * Das ist eine sicherere und bessere Methode.
     *
     * Die Role die AdminPanel hat, hat Zugriff auf das Admin Panel
     * Die Role die OwnerPanel hat, hat Zugriff auf das Owner Panel
     * Die Role die EmployeePanel hat, hat Zugriff auf das Employee Panel
     */

    case AdminPanel = 'admin_panel';
    case OwnerPanel = 'owner_panel';
    case EmployeePanel = 'employee_panel';
    case PartnerPanel = 'partner_panel';
}
