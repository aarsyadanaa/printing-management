<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
class Job extends Model
{
protected $table = 'table_job';
protected $fillable = ['id', 'id_users','alamat_job', 'jenis_job','deksripsi','status','crated_at','stok_job', 'amount'];
}
