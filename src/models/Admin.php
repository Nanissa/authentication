<?php


namespace Nanissa\Authentication;


use App\User;
use Parental\HasParent;

class Admin extends User
{
    use HasParent;
}
