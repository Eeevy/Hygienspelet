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
    protected $fillable = array('unit_1_id', 'unit_2_id', 'questionPackage_id', 'updated_at', 'created_at', 'score_unit_1', 'score_unit_2');
    public $timestamps = false;


    /**
     * A Challenge contains one questionpackage
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function package(){
        return $this->hasOne(QuestionPackage::class);//hittar id för aktuell instans
    }

    public function units(){
        return $this->hasMany(Unit::class);
    }


}