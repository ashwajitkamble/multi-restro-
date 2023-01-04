<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Config;
use Auth;

class table extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'store_id', 'capacity', 'availability'];

    public function stores(){
        return $this->belongsTo('App\Models\store', 'store_id');
    }

    public function getAllTables(){
        return Table::orderBy('id', 'ASC')->where('status', 1)->with('stores')->paginate(Config::get('constant.datalength'));
    }

    public function getAllTableList(){
        return Table::where('status',1)->pluck('name', 'id');
    }

    public function saveTable(Table $table, $data){
        $saveResult = false;
        $saveResult = Table::updateOrCreate(['id' => isset($table->id) ? $table->id : 0], $data);
        return $saveResult;
    }

    public function getTableDetail(Table $table){
        $tableDetail = false;
        $tableDetail = Table::where('id', isset($table->id) ? $table->id : 0)->first();
        return $tableDetail;
    }
}
