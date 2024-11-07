use App\Models\Kasbon;
use App\Models\User;
use App\Notifications\KasbonJatuhTempo;
use Carbon\Carbon;
use Illuminate\Support\Facades\Notification;

protected function schedule(Schedule $schedule)
{
    $schedule->call(function () {
        $kasbons = Kasbon::where('tanggal_jatuh_tempo', Carbon::now()->addMonth())->get();

        foreach ($kasbons as $kasbon) {
            $user = $kasbon->user; // Asumsikan kasbon memiliki relasi ke pengguna
            Notification::send($user, new KasbonJatuhTempo($kasbon));
        }
    })->daily();
}
