<?php

namespace App\Models;

use CodeIgniter\Model;

class Customer extends Model
{
    protected $table = 'user';
    protected $primaryKey = 'id';
    protected $useAutoIncrement = true;
    protected $allowedFields = [
        'id',
        'first_name',
        'last_name',
        'email',
        'path',
        'isSent'
    ];
    // User data insertion if path doesn't exist
    public function insertUserData(string $first_name, string $last_name, string $email): bool
    {
        $data = [
            'first_name' => $first_name,
            'last_name' => $last_name,
            'email' => $email,
            'isSent' => 0
        ];
        if($this->insert($data)) return true;
        return false;
    }

    // Path insertion if user Data doesn't exist
    public function insertPathAndMail(string $path, string $mail): bool
    {
        $data = [
            'path' => $path,
            'mail' => $mail,
            'isSent' => 0
        ];
        if($this->insert($data)) return true;
        return false;
    }

    // if path exist return path + the row id
    public function isPathInserted($email)
    {
        $query = $this->select('path')
            ->where('email', $email)
            ->get()
            ->getResult();
        foreach ($query as $row) {
            return $row->path;
        }
    }

    // insert User data if path exists
    public function updateUserDataWithPath(string $first_name, string $last_name, string $email, string $path): bool
    {
        return $this->set('first_name', $first_name)
            ->set('last_name', $last_name)
            ->set('email', $email)
            ->set('isSent', 0)
            ->where('id', $path)
            ->update();
    }

    // insert path and email if user data doesn't exist
    public function insertPathIfDataExists(string $path, string $email): bool
    {
        return $this->set('path', $path)
            ->where('email', $email)
            ->update();
    }

    public function getAllData(string $email)
    {
        $query = $this->select('*')
                        ->where('email', $email)
                        ->get()
                        ->getResult();
        foreach ($query as $row) {
            return [$row->email, $row->path, $row->first_name, $row->last_name];
        }
    }

    public function doesUserDataExist(string $email)
    {
        $query = $this->select('email')
                    ->where('email', $email)
                    ->get()
                    ->getResult();
        foreach ($query as $row) {
            return $row->email;
        }
    }

    public function updateStatus(string $email)
    {
        return $this->set('isSent', 1)
            ->where('email', $email)
            ->update();
    }

    public function isSentStatus(string $email)
    {
        $query =  $this->select('isSent')
            ->where('email', $email)
            ->get()
            ->getResult();
        foreach ($query as $row) {
            return $row->isSent;
        }
    }

}