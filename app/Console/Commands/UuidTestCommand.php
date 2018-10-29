<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Ramsey\Uuid\Uuid;

class UuidTestCommand extends Command
{
    /**
     * Tipo de UUID que se va a calcular
     *
     * @var int
     */
    protected $tipoUuid;

    /**
     * Número de UUID que se van a calcular
     *
     * @var int
     */
    protected $numeroEjecuciones;

    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'uuid:test {tipoUuid=1} {numeroEjecuciones=10}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Calcula varias veces (10 por defecto) un UUID del tipo 1, 3, 4 y 5 (1 por defecto)';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $this->tipoUuid = $this->argument('tipoUuid');
        $this->numeroEjecuciones = $this->argument('numeroEjecuciones');
        switch ($this->tipoUuid) {
            case 1:
                for ($i = 1; $i <= $this->numeroEjecuciones; $i++) {
                    $uuid = Uuid::uuid1();
                    echo $uuid->toString() . "\n";
                }
                break;
            case 3:
                for ($i = 1; $i <= $this->numeroEjecuciones; $i++) {
                    $uuid = Uuid::uuid3(Uuid::NAMESPACE_DNS, 'test.test');
                    echo $uuid->toString() . "\n";
                }
                break;
            case 4:
                for ($i = 1; $i <= $this->numeroEjecuciones; $i++) {
                    $uuid = Uuid::uuid4();
                    echo $uuid->toString() . "\n";
                }
                break;
            case 5:
                for ($i = 1; $i <= $this->numeroEjecuciones; $i++) {
                    $uuid = Uuid::uuid5(Uuid::NAMESPACE_DNS, 'test.test');
                    echo $uuid->toString() . "\n";
                }
                break;
            default:
                $this->alert('Tipo de UUID incorrecto');
        }
    }
}
