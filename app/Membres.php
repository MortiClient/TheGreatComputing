<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Auth\Authenticatable as BasicAuthenticatable;

class Membres extends Model implements Authenticatable
{

	use BasicAuthenticatable;

	/*Mass Assignement*/
    protected $fillable = ['pseudo', 'email', 'password', 'is_redactor', 'avatar'];

      /**
     * Get the column name for the "remember me" token.
     *
     * @return string
     */
    public function getRememberTokenName()
    {
        return null;
    }
}
