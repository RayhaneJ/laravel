<?php

namespace App\Actions\Fortify;

use App\Models\Etudiant;
use App\Models\User;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Laravel\Fortify\Contracts\UpdatesUserProfileInformation;


class UpdateUserProfileInformation implements UpdatesUserProfileInformation
{
    /**
     * Validate and update the given user's profile information.
     *
     * @param  mixed  $user
     * @param  array  $input
     * @return void
     */
    public function update($user, array $input)
    {
        Validator::make($input, [
            'email' => ['required', 'email', 'max:255', Rule::unique('users')->ignore($user->id)],
            'photo' => ['nullable', 'image', 'max:5000'],
            'cv' => ['nullable', 'mimes:jpeg,bmp,png,gif,svg,pdf', 'max:5000'],
            'lm' => ['nullable', 'mimes:jpeg,bmp,png,gif,svg,pdf', 'max:5000'],
        ])->validateWithBag('updateProfileInformation');

        if (isset($input['photo'])) {
            $user->updateProfilePhoto($input['photo']);
        }

        if (isset($input['cv'])) {
            $etudiant = Etudiant::find($user->id);
            $etudiant->updateCV($input['cv']);
        }

        if (isset($input['lm'])) {
            $etudiant = Etudiant::find($user->id);
            $etudiant->updateLM($input['lm']);
        }

        if ($input['email'] !== $user->email &&
            $user instanceof MustVerifyEmail) {
            $this->updateVerifiedUser($user, $input);
        } else {
                $user->forceFill([
                    'email' => $input['email'],
                ])->save();
        }
    }

    /**
     * Update the given verified user's profile information.
     *
     * @param  mixed  $user
     * @param  array  $input
     * @return void
     */
    protected function updateVerifiedUser($user, array $input)
    {
        $user->forceFill([
            'email' => $input['email'],
            'email_verified_at' => null,
        ])->save();

        $user->sendEmailVerificationNotification();
    }
}
