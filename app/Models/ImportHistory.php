<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ImportHistory extends Model
{
    use HasFactory;
    protected $table = "import_history";
    public static function getColumnForSorting($value){

        $list = [
            0=>'id',
            1=>'import_id',
            2=>'record_count',
            3=>'status',
            4=>'created_at'
        ];

        return isset($list[$value])?$list[$value]:"";
    }

    public function getStatus(){

        $list = [
            1=>'Pending',
            2=>'Complete',
            3=>'Failed',
        ];

        return isset($list[$this->status])?$list[$this->status]:"";
    }

    public function getAllImports($request = null,$flag = false)
    {
        if(isset($request['order'])){
            $columnNumber = $request['order'][0]['column'];
            $order = $request['order'][0]['dir'];
        }
        else {
            $columnNumber = 4;
            $order = "desc";
        }

        $column = self::getColumnForSorting($columnNumber);
        if($columnNumber == 0){
            $order = "desc";
        }

        if(empty($column)){
            $column = 'id';
        }
        $query = self::orderBy($column, $order);


        if(!empty($request)){

            $search = $request['search']['value'];

            if(!empty($search)){
                //  $query->where(function ($query) use($request,$search){
                //         $query->orWhere( 'full_name', 'LIKE', '%'. $search .'%')
                //             ->orWhere( 'email', 'LIKE', '%'. $search .'%')
                //             ->orWhere('created_at', 'LIKE', '%' . $search . '%');
                //     });

                 if($flag)
                    return $query->count();
            }

            $start =  $request['start'];
            $length = $request['length'];
            $query->offset($start)->limit($length);


        }

        $query = $query->get();
        return $query;
    }

}
