<?php

namespace App\Livewire\BaseApp\Department\Helper;

trait ValidateDepartment
{
    /** Definiert die Validierungsregeln.*/
    public function rules(): array
    {
        return [
            'name' => 'required|string|regex:/^[a-zA-Z]+:[a-zA-Z]+$/|min:2|unique:departments,name,'  . $this->permissionId,
        ];
    }

    /** Definiert benutzerdefinierte Fehlermeldungen für die Validierungsregeln.*/
    public function messages(): array
    {
        return [
            'name.required' => 'Bitte füge einen Eintrag hinzu!',
            'name.string' => 'Dieser Eintrag muss eine Zeichenkette sein.',
            'name.min' => 'Der Eintrag muss mindestens 2 Zeichen lang sein.',
            'name.unique' => 'Dieser Eintrag existiert bereits!',
        ];
    }

}
