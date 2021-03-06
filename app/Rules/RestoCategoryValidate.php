<?php

namespace App\Rules;

use App\Models\Category;
use Illuminate\Contracts\Validation\Rule;

class RestoCategoryValidate implements Rule
{
    private $resto_id='';
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct($resto_id)
    {
        $this->resto_id = $resto_id;
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
        if(Category::where('name', $value)->where('resto_id', $this->resto_id)->first())
        {
            return true;
        }

        return false;
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'The category for this resto does not exist';
    }
}
