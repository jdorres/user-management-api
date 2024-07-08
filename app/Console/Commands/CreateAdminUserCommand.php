<?php

namespace App\Console\Commands;

use App\Interfaces\UserServiceInterface;
use Exception;
use Illuminate\Console\Command;

class CreateAdminUserCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:create-admin-user  {name} {cpf} {email} {phone} {password}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Cria um usuário admin do sistema';

    /**
     * Execute the console command.
     */
    public function handle(UserServiceInterface $userService)
    {
        try{
            $data = $this->arguments();
            $user = $userService->createUser($data);
            $userService->setUserPermission($user, 'admin');
            $this->info('Usuário Admin criado com sucesso.');
            $this->info($user);
        }catch(Exception $e){
            $this->info('Falha ao criar usuário Admin');
            $this->info($e->getMessage());
        }
    }
}
