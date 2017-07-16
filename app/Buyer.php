<?php

namespace App;

use App\Transaction;

class Buyer extends User
{
    public function transacions() {
    	return $this->hasMany(Transaction::class);
    }
}
