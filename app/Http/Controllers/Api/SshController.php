<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use phpseclib\Net\SSH2;

class SshController extends Controller
{
    public function screenOn()
    {
        $sshClient = $this->setConnection();

        if ($sshClient === null) {
            return $this->authenticationFailed();
        }

        // Authenticate with su before we run the command
        $this->runWithSudo($sshClient);

        $sshClient->write("xset -d :0 dpms force on \n");
        $sshClient->read('[prompt]');

        return [
            'successMessage' => 'The screen should be on now!'
        ];
    }

    public function screenOff()
    {
        $sshClient = $this->setConnection();

        if ($sshClient === null) {
            return $this->authenticationFailed();
        }

        $sshClient->write("xset -d :0 dpms force off \n");
        $sshClient->read('[prompt]');

        return [
            'successMessage' => 'The screen should be off now!'
        ];
    }

    public function reboot()
    {
        // todo: implement
    }

    private function setConnection()
    {
        $sshClient = new SSH2(config('ssh.ip'));

        if (!$sshClient->login(config('ssh.username'), config('ssh.password'))) {
            return null;
        }

        return $sshClient;
    }

    private function runWithSudo($sshClient)
    {
        $sshClient->read('username@username:~$');
        $sshClient->write("su\n");
        $sshClient->read('Password:');
        $sshClient->write(config('ssh.password')."\n");
        $sshClient->read('username@username:~#');
    }

    private function authenticationFailed()
    {
        return response([
            'errorMessage' => 'Authentication failed',
        ], 400);
    }
}
