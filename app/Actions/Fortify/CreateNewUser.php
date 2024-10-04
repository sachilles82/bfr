<?php

namespace App\Actions\Fortify;

use App\Enums\User\UserType;
use App\Models\BaseApp\Company;
use App\Models\Team;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Laravel\Fortify\Contracts\CreatesNewUsers;
use Laravel\Jetstream\Jetstream;

//class CreateNewUser implements CreatesNewUsers
//{
//    use PasswordValidationRules;
//
//    /**
//     * Create a newly registered user.
//     *
//     * @param  array<string, string>  $input
//     */
//    public function create(array $input): User
//    {
//        Validator::make($input, [
//            'name' => ['required', 'string', 'max:255'],
//            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
//            'password' => $this->passwordRules(),
//            'terms' => Jetstream::hasTermsAndPrivacyPolicyFeature() ? ['accepted', 'required'] : '',
//        ])->validate();
//
//        return DB::transaction(function () use ($input) {
//            return tap(User::create([
//                'name' => $input['name'],
//                'email' => $input['email'],
//                'password' => Hash::make($input['password']),
//            ]), function (User $user) {
//                $this->createTeam($user);
//            });
//        });
//    }
//
//    /**
//     * Create a personal team for the user.
//     */
//    protected function createTeam(User $user): void
//    {
//        $user->ownedTeams()->save(Team::forceCreate([
//            'user_id' => $user->id,
//            'name' => explode(' ', $user->name, 2)[0]."'s Team",
//            'personal_team' => true,
//        ]));
//    }
//}


class CreateNewUser implements CreatesNewUsers
{
    use PasswordValidationRules;

    /**
     * Create a newly registered user.
     *
     * @param array $input
     * @return User
     */
    public function create(array $input): User
    {
        Validator::make($input, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => $this->passwordRules(),
            'terms' => Jetstream::hasTermsAndPrivacyPolicyFeature() ? ['accepted', 'required'] : '',
        ])->validate();

        return DB::transaction(function () use ($input) {
            $user = User::create([
                'name' => $input['name'],
                'email' => $input['email'],
                'password' => Hash::make($input['password']),
            ]);

            // Erstelle eine neue Firma und weise dem Benutzer die company_id zu
            $company = Company::create([
                'name' => $input['name'] . "'s Company",
                'owner_id' => $user->id, // Weist der Company den Besitzer zu
                'created_by' => $user->id,
            ]);

            // Aktualisiere den Benutzer mit der company_id und dem user_type
            $user->update([
                'company_id' => $company->id,
                'user_type' => UserType::Owner,
                'created_by' => $user->id,// Bevorzugt, die Benutzer-Typen als Enum zu implementieren
            ]);

            // Erstelle ein Team für den Benutzer
            $this->createTeam($user, $company->id);

            return $user;
        });
    }

    /**
     * Create a personal team for the user.
     *
     * @param User $user
     * @param int $companyId
     * @return void
     */
    protected function createTeam(User $user, int $companyId): void
    {
        $user->ownedTeams()->save(Team::forceCreate([
            'user_id' => $user->id,
            'name' => explode(' ', $user->name, 2)[0] . "'s Team",
            'personal_team' => true,
            'company_id' => $companyId, // Weist dem Team die company_id zu
        ]));
    }
}
