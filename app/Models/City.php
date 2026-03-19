namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    // Enumar coloanele pe care le-ai pus în migrare
    protected $fillable = ['name', 'county', 'lat', 'lon'];
}
