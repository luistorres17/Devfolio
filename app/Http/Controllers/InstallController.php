<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\File;

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

        $path = base_path('.env');

        // Modificar variables del .env
        $this->actualizarEnv('DB_HOST', $request->db_host);
        $this->actualizarEnv('DB_PORT', $request->db_port);
        $this->actualizarEnv('DB_DATABASE', $request->db_database);
        $this->actualizarEnv('DB_USERNAME', $request->db_username);
        $this->actualizarEnv('DB_PASSWORD', $request->db_password);

        // Cambiar SESSION_DRIVER a database
        $this->actualizarEnv('SESSION_DRIVER', 'database');

        // Marcar como instalado
        $this->actualizarEnv('APP_INSTALLED', 'true');

        // Limpiar cache de configuración
        Artisan::call('config:clear');
        Artisan::call('cache:clear');

        // Crear tabla de sesiones y migrar
        try {
            Artisan::call('session:table');
            Artisan::call('migrate', ['--force' => true]);
        } catch (\Exception $e) {
            return back()->withErrors(['error' => 'Error al migrar: ' . $e->getMessage()]);
        }

        return redirect('/')->with('success', 'Instalación completada correctamente.');
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
}
