<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\File;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class InstallController extends Controller
{
    public function step1()
    {
        return view('install.step1');
    }

    public function submitStep1(Request $request)
    {
        $request->validate([
            'db_host' => 'required',
            'db_port' => 'required',
            'db_database' => 'required',
            'db_username' => 'required',
            'db_password' => 'nullable',
        ]);

        // Guardar en .env
        $this->actualizarEnv('DB_HOST', $request->db_host);
        $this->actualizarEnv('DB_PORT', $request->db_port);
        $this->actualizarEnv('DB_DATABASE', $request->db_database);
        $this->actualizarEnv('DB_USERNAME', $request->db_username);
        $this->actualizarEnv('DB_PASSWORD', $request->db_password);
        $this->actualizarEnv('SESSION_DRIVER', 'file');
        $this->actualizarEnv('APP_INSTALLED', 'false');

        Artisan::call('config:clear');

        return redirect()->route('install.step2');
    }

    protected function actualizarEnv($clave, $valor)
    {
        $path = base_path('.env');

        if (!File::exists($path)) {
            return;
        }

        $contenido = File::get($path);
        $claveExistente = preg_match("/^{$clave}=.*/m", $contenido);

        if ($claveExistente) {
            $contenido = preg_replace("/^{$clave}=.*/m", "{$clave}={$valor}", $contenido);
        } else {
            $contenido .= "\n{$clave}={$valor}";
        }

        File::put($path, $contenido);
    }

    public function step2()
    {
        return view('install.step2'); // Puede mostrar una confirmación
    }

    public function submitStep2()
    {
        try {
            Artisan::call('session:table');
            Artisan::call('migrate', ['--force' => true]);

            $this->actualizarEnv('SESSION_DRIVER', 'database');

            Artisan::call('config:clear');

            return redirect()->route('install.step3');
        } catch (\Exception $e) {
            return back()->withErrors(['error' => 'Error en migración: ' . $e->getMessage()]);
        }
    }
    
    public function step3()
    {
        return view('install.step3');
    }

    public function submitStep3(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|min:6|confirmed',
        ]);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        $this->actualizarEnv('APP_INSTALLED', 'true');

        return redirect('/')->with('success', 'Instalación completada y usuario creado.');
    }
}
