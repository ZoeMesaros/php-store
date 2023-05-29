<?php

require_once 'classes/db.php';

class UserModel extends DB
{

    protected $table = "users";

    public function getAllUsers()
    {
        return $this->getAll($this->table);
    }

    /*     public function addUser(string $username, string $email, string $img)
        {
            $sql = "INSERT INTO {$this->table} (username,email,img) VALUES (?,?,?)";
            $statement = $this->pdo->prepare($sql);
            $statement->execute([$username, $email, $img]);
        }

        public function editUser(string $username, string $email, string $img, int $id)
        {
            $sql = "UPDATE {$this->table} SET username = ?, email = ?, img = ? WHERE id = ?";
            $statement = $this->pdo->prepare($sql);
            $statement->execute([$username, $email, $img, $id]);
        }

        public function removeUser(int $id)
        {
            $sql = "DELETE FROM {$this->table} WHERE id = ?";
            $statement = $this->pdo->prepare($sql);
            $statement->execute([$id]);
        } */
}