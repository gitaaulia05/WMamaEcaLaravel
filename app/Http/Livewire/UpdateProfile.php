<?php

namespace App\Http\Livewire;

use App\Models\users;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class UpdateProfile extends Component
{
    public $nama;
    public $no_hp;
    public $img;
    public $alamat;

   

    public function render()
    {
        return view('livewire.update-profile' , [
            'data' => users::where('id_user' , Auth::id())->first(),
        ]);
    }

    public function updateDataUser()
    {
       $this->validate([
        'img' => 'image|max:1024', // maksimal 1MB
            'nama' => 'required|string|max:255',
            'no_hp' => 'required|numeric',
            'alamat' => 'required|string|max:500',
       ]);

       if ($this->img) {
        $fileName = $this->img->store('gambarPengguna', 'public'); // Menyimpan ke storage/app/public/gambarPengguna
    }

            $user = users::where('id_user' , Auth::id())->first();
            $userUp = $user->update([
                'nama' => $this->nama,
                'no_hp' => $this->no_hp,
                'alamat' => $this->alamat,
                'img' => $this->img,
            ]);
           
        

        return redirect('/profile')->with('message' , 'Data Profile Berhasil Diubah');
    }
}
