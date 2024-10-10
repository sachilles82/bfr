<?php

namespace App\Livewire\BaseApp\Department\Helper;

use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;

trait ValidateDepartment
{
    /** Definiert die Validierungsregeln.*/
    public function rules(): array
    {
        $teamId = Auth::user()->currentTeam->id;

        return [
            'name' => [
                'required',
                'string',
                'regex:/^[a-zA-Z0-9 ]+$/',
                'max:25',
                'min:2',
                Rule::unique('departments', 'name')
                    ->where('team_id', $teamId) // Sicherstellen, dass es nur innerhalb des gleichen Teams einzigartig ist
                    ->ignore($this->departmentId),
            ],
        ];
    }

    /** Definiert benutzerdefinierte Fehlermeldungen für die Validierungsregeln.*/
    public function messages(): array
    {
        return [
            'name.required' => __('Bitte füge einen Eintrag hinzu!'),
            'name.string' => __('Dieser Eintrag muss eine Zeichenkette sein.'),
            'name.min' => __('Der Eintrag muss mindestens 2 Zeichen lang sein.'),
            'name.unique' => __('Dieser Eintrag existiert bereits!'),
            'name.regex' => __('Dieser Eintrag darf keine Sonderzeichen erhalten!'),



        ];
    }

}
