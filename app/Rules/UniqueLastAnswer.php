<?php

namespace App\Rules;

use Illuminate\Support\Facades\DB;
use Illuminate\Contracts\Validation\Rule;

class UniqueLastAnswer implements Rule
{
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
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
        $answer_rec = DB::table('answer_records')->latest('created_at')->get()[0]->id;
        $answers = DB::table('answers')->where('answer_rec_id',$answer_rec)->select('number')->get();
        foreach ($answers as $key => $value1[0]) {
            if ($value == $value1[0]->number) {
                return false;
            }
        }
        return true;
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'عذرا لقد سجلت اليوم برجاء المحاوله غدا';
    }
}
