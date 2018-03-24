<?php

namespace App\Rules;

use App\User;
use Illuminate\Contracts\Validation\Rule;
use Illuminate\Http\Request;

class UniqueEmail implements Rule
{
    /**
     * Create a new rule instance.
     *
     * @return void
     */

    protected $request;
    public function __construct(Request $request)
    {
        $this->request = $request;
    }

    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        $user = $this->request->user();

        $editId = $this->request->segment(2);

        if(
            $editId == $user->id
            &&
            $user->email == $value
        ) {
            return true;
        }

        if(User::find($editId)->email == $value) {
            return true;
        }

        if(User::where('email', $value)->first()) {
            return false;
        } else {
            return true;
        }
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'Email already taken';
    }
}