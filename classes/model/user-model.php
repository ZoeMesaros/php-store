<?php

require_once 'db.php';

class UserModel extends DB
{

    protected $table = "users";

    public function getAllUsers()
    {
        return $this->getAll($this->table);
    }


    public function getUser(int $id)
    {
        $sql = "SELECT * FROM {$this->table} WHERE id= ?";
        $statement = $this->pdo->prepare($sql);
        $statement->execute([$id]);
        return $statement->fetchAll();
    }

    public function addUser(string $username, string $firstname, string $lastname, string $email)
    {
        $sql = "INSERT INTO {$this->table} (username,first_name, last_name, email) VALUES (?,?,?,?)";
        $statement = $this->pdo->prepare($sql);
        $statement->execute([$username, $firstname, $lastname, $email]);
    }

    public function editUser(string $username, string $firstname, string $lastname, string $email, int $id)
    {
        $sql = "UPDATE {$this->table} SET username = ?, first_name = ?, last_name = ?, email = ? WHERE id = ?";
        $statement = $this->pdo->prepare($sql);
        $statement->execute([$username, $firstname, $lastname, $email, $id]);
    }

    /*                 public function removeUser(int $id)
                    {
                        $sql = "DELETE FROM {$this->table} WHERE id = ?";
                        $statement = $this->pdo->prepare($sql);
                        $statement->execute([$id]);
                    } */
}