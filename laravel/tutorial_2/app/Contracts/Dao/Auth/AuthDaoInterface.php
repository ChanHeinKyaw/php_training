<?php

namespace App\Contracts\Dao\Auth;



interface AuthDaoInterface
{
    /**
     * Create User With Input Value
     * @param $request
     */
    public function saveUser($request);
}
