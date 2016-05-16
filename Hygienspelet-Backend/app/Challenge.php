<?php
/**
 * Created by PhpStorm.
 * User: emmashakespeare
 * Date: 2016-05-16
 * Time: 08:49
 */

namespace App;

use Illuminate\Database\Eloquent\Model;



class Challenge extends Model
{
    protected $table = 'Challenges';
    public $timestamps = false;


    /**
     * A Challenge contains one questionpackage
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function package(){
        return $this->hasOne(QuestionPackage::class);//hittar id för aktuell instans
    }


}